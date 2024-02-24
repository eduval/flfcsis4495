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
# •	Hypothesis: The integration of the Apriori algorithm into our system will streamline the identification of flower varieties, enhancing the overall recommendation system for the marketing team to create targeted promotions.
# 
# #### Code Immplementation:
# - Data wrangling and transformation
# - Feature engineering that includes transformation, selection, scaling.
# - Report, error (and plot of) metrics, and results analysis
# 

# ## Approach 2: 

# ### Data Preprocessing

# ### 1. Importing neccesary Libraries

# In[1]:


#import libraries that will be used in this project
import pandas as pd
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np
import re


# ### 2. Loading our dataset 

# In[2]:


# Loading our dataset
df = pd.read_csv('FreshLifeFloralDB.csv',sep=';')


# ### 3. Dropping unneeded column

# In[3]:


# removing the 'Unnamed:_12' column
df = df.drop(columns=['Unnamed: 12'])
print(df.info())


# ### 4. Cheking for missing values

# In[4]:


#Cheking for missing values
missing_values = df.isnull().sum()
print("Missing values:\n", missing_values)


# ### 5. Handling missing values

# In[5]:


# dropping rows with missing values:
df.dropna(inplace=True)
missing_values = df.isnull().sum()
print("Missing values:\n", missing_values)


# ### 6. removing spaces in column names

# In[6]:


# Replacing '' with '_' in all my columns name
df.columns = df.columns.str.replace(' ', '_')
print(df.info())


# ### 7. Converting categorical colum to 'category' dtype

# In[7]:


#Converting categorical colum to 'category' dtype
categorical_cols = ["Product_name", "Subcategory_name", "Category_name", "Color"]
for col in categorical_cols:
    df[col] = df[col].astype("category")
print(df.info())


# In[8]:


df.shape


# In[9]:


df['Product_index'] = df.index


# In[10]:


filtered_row = df[df.index == 1]
print(df.index == 1)


# ### Replacing spaces in all values of my categorical colums

# In[11]:


# Replacing spaces in all values of textual columns
textual_cols = ["Product_name", "Subcategory_name", "Category_name", "Color"]
for col in textual_cols:
    df[col] = df[col].apply(lambda x: x.lower())  # Convert text to lowercase
    df[col] = df[col].apply(lambda x: re.sub(r'[^\w\s]', '', x))  # Remove punctuation
    df[col] = df[col].apply(lambda x: re.sub(r'\s+', '_', x))  # Replace multiple consecutive spaces with underscore


# In[12]:


print(df[df.index == 1])


# In[13]:


# Convert categorical columns to strings
df['Product_name'] = df['Product_name'].astype(str)
df['Subcategory_name'] = df['Subcategory_name'].astype(str)
df['Category_name'] = df['Category_name'].astype(str)
df['Color'] = df['Color'].astype(str)


# In[15]:


# Combining product attributes into a single column for CountVectorizer
df['combined_attributes'] = df['Product_name'] + ' ' + df['Subcategory_name'] + ' ' + df['Category_name'] + ' ' + df['Color']
print(df.head())


# In[18]:


# Get the index of the product that matches the product name
product_name = 'quicksand' 
idx = df[df['Product_name'] == product_name].index[0]
print(idx)


# In[29]:


# Initialize CountVectorizer
count_vectorizer = CountVectorizer()

# Fit and transform the combined attributes
count_matrix = count_vectorizer.fit_transform(df['combined_attributes'])


# In[ ]:


# Compute cosine similarity matrix
cosine_sim = cosine_similarity(count_matrix, count_matrix)


# ### Function to get recommendations based on cosine similarity

# In[ ]:


def get_recommendations(product_name, cosine_sim=cosine_sim):
    """
    Get top recommendations based on cosine similarity, including similarity scores, 
    excluding all occurrences of the current product and avoiding duplicate tuples.
    
    Parameters:
    product_name (str): The name of the product to get recommendations for.
    cosine_sim (numpy.ndarray): Cosine similarity matrix.
    
    Returns:
    list: Top ten recommendations with similarity scores, sorted by similarity score in descending order.
    """
    # Get the indices of all occurrences of the product name
    product_indices = df[df['Product_name'] == product_name].index

    recommendations = []
    included_indices = set()  # Set to keep track of included indices

    for idx in product_indices:
        # Exclude all occurrences of the current product
        exclude_indices = set(product_indices)
        exclude_indices.add(idx)  # Add the current index

        # Get the pairwise similarity scores of all products excluding the current one
        sim_scores = list(enumerate(cosine_sim[idx]))
        sim_scores = [(i, score) for i, score in sim_scores if i not in exclude_indices]
        sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)

        # Get the indices of the top similar products
        top_indices = [i for i, _ in sim_scores if i not in included_indices][:10]
        included_indices.update(top_indices)  # Update included indices

        # Append unique recommendations for the current product with similarity scores
        for i, score in sim_scores:
            if i in top_indices and (df['Product_name'].iloc[i], score) not in recommendations:
                recommendations.append((df['Product_name'].iloc[i], score))

    # Sort recommendations by similarity score in descending order
    recommendations.sort(key=lambda x: x[1], reverse=True)

    # Return only the top ten recommendations
    return recommendations[:10]


# ### Recommendation

# In[ ]:


# Example usage:
product_name = 'quicksand'  # Replace 'ProductA' with the product you want recommendations for
recommendations = get_recommendations(product_name)
print(recommendations)

