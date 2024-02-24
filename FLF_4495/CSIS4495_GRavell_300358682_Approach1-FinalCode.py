#!/usr/bin/env python
# coding: utf-8

# ## Applied Research Project 
# ## CSIS 4495 - Section 050
# 
# 
# ### Web App for Product Recommendation at Fresh Life Floral
# 
# #### Group Members
# * Gustavo Ravell 300358682
# * Washington Valencia 300366206
# 
# #### Data introduction:
# 
# For this project, the primary data source is the company database provided in .csv format. The dataset contains 56,999 records from 81 clients with data spanning from May 2020 to May 2021. The data collection process involves importing and parsing this dataset to extract relevant information for analysis. The company database includes transactional data, customer preferences, and product information.
# 
# #### Question
# 
# •	Hypothesis: Personalized product recommendations will significantly contribute to the amplification of buyer satisfaction and engagement.
# 
# #### Code Immplementation:
# - Data wrangling and transformation
# - Feature engineering that includes transformation, selection, scaling.
# - Report, error (and plot of) metrics, and results analysis
# 

# ## Approach 1: Personalized Recommendations for Each Customer
# ### In this step our system receive a specific 'customer' as a parameter and generates a list of recommendation products based on the analysis of its transactions.

# ### 1. Importing neccesary Libraries

# In[151]:


#import libraries that will be used in this project

import pandas as pd
import numpy as np
import sys
from mlxtend.frequent_patterns import apriori
from mlxtend.frequent_patterns import association_rules
from mlxtend.preprocessing import TransactionEncoder


# ### 2. Loading our dataset 

# In[152]:


# Loading our dataset
df = pd.read_csv('FreshLifeFloralDB.csv',sep=';')


# ### 3. Dataset preview

# In[153]:


#df.head()


# #### 3.1 Shape of my dataframe

# In[154]:


#df.shape


# #### 3.2 Checking columns of my dataframe

# In[155]:


#df.columns


# #### 3.3 Missing values

# In[156]:


#Cheking for missing values
missing_values = df.isnull().sum()
#print("Missing values:\n", missing_values)


# #### 3.4 Handling Missing values

# In[157]:


# dropping rows with missing values:
df.dropna(inplace=True)
missing_values = df.isnull().sum()
#print("Missing values:\n", missing_values)


# #### 3.5 Removing spaces in column names

# In[158]:


# Replacing '' with '_' in all my columns name
df.columns = df.columns.str.replace(' ', '_')
#print(df.info())


# #### 3.6 Transformming Float columns to Integer values

# In[159]:


# Converting float64 columns to integers
df[df.select_dtypes(include='float64').columns] = df.select_dtypes(include='float64').apply(pd.to_numeric, errors='coerce').astype('Int64')


# In[160]:


#df.info()


# ### 4. Filtering the df according to an specific client

# In[161]:


# In this step, we are grouping all transaction for one specific customer.
#Replace 'desired_client_id' with the actual client ID you want to analyze
client_id = int(sys.argv[1])
#client_id = 87
df_personalized = df[df['id_client'] == client_id][['id_order', 'product','Category_name']]


# In[162]:


# Calculating statistical summary of transactions
total_transactions = df_personalized['id_order'].nunique()
total_items = df_personalized.shape[0]
# Calculate total quantity by category
total_quantity_by_category = df_personalized.groupby('Category_name').size()


# In[163]:


# Sorting total_quantity_by_category in descending order
total_quantity_by_category = total_quantity_by_category.sort_values(ascending=False)


# In[164]:


#printing a summary of the client
print("part1")
print("Statistical Summary for Customer", client_id)
print("Total Transactions:", total_transactions)
print("Total Items Purchased:", total_items)
print("Total Quantity by Category:")
print(total_quantity_by_category)


# In[165]:


#df_personalized. head()


# In[166]:


df_personalized = df[df['id_client'] == client_id][['id_order', 'product']]


# ### 5. Transaction Encoding
# #### We are going to convert the transaction data into a binary format. 

# #### 5.1 Grouping Transactions

# In[167]:


#In this step, we are grouping our DataFrame df_personalized by the 'id_order' column. 
#For each group (each unique 'id_order'), we are extracting the 'product' values and converting them into a list. 
#The result is a list of lists, where each inner list represents the products associated with a specific order.
transactions_personalized = df_personalized.groupby('id_order')['product'].apply(list).tolist()


# In[168]:


transactions_personalized


# #### 5.2 Creating TransactionEncoder

# In[169]:


#We are creating an instance of the TransactionEncoder class from the mlxtend.preprocessing module. 
#This class is used to convert the list of lists into a binary transaction format suitable for association rule mining.
te_personalized = TransactionEncoder()


# #### 5.3 Fitting and Transforming

# In[170]:


#Fit: The fit method is used to learn unique items in the transaction data.
#It identifies all unique products across all transactions.
#Transform: The transform method then converts the original list of lists into a binary matrix, 
#where each row corresponds to a transaction (in this case, an order), and each column corresponds to a unique product. 
#The entries in the matrix are binary indicators of whether a product is present in a transaction.
te_ary_personalized = te_personalized.fit(transactions_personalized).transform(transactions_personalized)


# #### 5.4 Creating DataFrame

# In[171]:


#In this step we convert the binary matrix into a Dataframe.
#The column names of the DataFrame correspond to the unique products identified during the fitting step.
#Each row in the DataFrame represents a transaction (order), and the values are either 0 or 1, 
#indicating the absence or presence of a specific product in that transaction.
df_encoded_personalized = pd.DataFrame(te_ary_personalized, columns=te_personalized.columns_)


# ### 6. Run Apriori Algorithm

# #### 6.1 Setting Minimun Support

# In[172]:


#The min_support parameter is a threshold that determines the minimum support required for an itemset to be 
#considered "frequent." Support is the proportion of transactions that contain a particular itemset. 
#In this case, we set a minimum support of 0.01, meaning that itemsets occurring in at least 1% of 
#the transactions will be considered frequent.
min_support = 0.1


# #### 6.2 Running Apriori

# In[173]:


#The apriori function from the mlxtend.frequent_patterns module is used to discover frequent itemsets. 
#It takes the encoded DataFrame (df_encoded_personalized) and the minimum support as input parameters.
#-df_encoded_personalized: This is the binary-encoded DataFrame obtained from the TransactionEncoder step. 
#Each row represents a transaction, and columns represent unique products
#-min_support: This parameter specifies the minimum support threshold.
#-use_colnames=True: This parameter is set to True to use the original column names from the DataFrame as item names 
#in the resulting output.
frequent_itemsets_personalized = apriori(df_encoded_personalized, min_support=min_support, use_colnames=True)


# ##### Checking the shape of my dataframe

# In[174]:


#print(frequent_itemsets_personalized.shape)


# ##### Checking a peek of the data

# In[175]:


#print(frequent_itemsets_personalized.head())


# ### 7. Generate Association Rules:

# In[176]:


#The association_rules function from the mlxtend.frequent_patterns module is used to generate association rules 
#from frequent itemsets. It takes the frequent itemsets (frequent_itemsets_personalized) as input and specifies 
#parameters for the metric and minimum threshold.
#-frequent_itemsets_personalized: This is the DataFrame containing frequent itemsets and their support 
#values obtained from the Apriori algorithm.
#-metric='confidence': The metric used to evaluate the association rules. In this case, it's set to 'confidence,
#which measures the likelihood of the consequent (right-hand side of the rule) occurring given the antecedent 
#(left-hand side of the rule).
#-min_threshold=0.5: This parameter sets the minimum threshold for the specified metric. Rules with confidence 
#below this threshold will be excluded from the result.
rules_personalized = association_rules(frequent_itemsets_personalized, metric='confidence', min_threshold=0.5)


# #### 7.1 Sort and Select Top 10 Rules

# In[177]:


#In this step we are sorting our association rules based on a chosen metric ('lift') in descending order.
#Sorting: sort_values(by='lift', ascending=False) sorts the rules by the 'lift' metric in descending order. 
#You can choose a different metric based on your goals.
#Selecting Top 10: head(10) retrieves the first 10 rows (top 10 rules) from the sorted DataFrame.
top_10_rules = rules_personalized.sort_values(by='lift', ascending=False).head(10)


# #### 7.2 Exporting my rules to a csv files

# In[179]:


# Specify the file path
file_path = "customer_top_10_rules.csv"

#Concatenating 'antecedents' and 'consequents' columns and flatten the sets
combined_values = top_10_rules.apply(lambda row: ', '.join(map(str, row['antecedents'].union(row['consequents']))), axis=1)

# Extracting support and confidence values from the top 10 rules DataFrame
support_values = top_10_rules['support']
confidence_values = top_10_rules['confidence']

# Creating a new DataFrame with the combined values
export_data = pd.DataFrame({'Combined_Values': combined_values})

# Adding support and confidence columns to the export_data DataFrame
export_data['support'] = support_values
export_data['confidence'] = confidence_values

# Dropping duplicate rows
export_data.drop_duplicates(inplace=True)

# Writing the values to a CSV file
#export_data.to_csv(file_path, index=False, sep=',')

#print(f"Combined values from top 10 rules exported to {file_path}")


# ### 8. Print the top 10 Rules

# In[180]:


#Finally, the top 10 association rules are printed to the console.
print("part2")
print(export_data)

