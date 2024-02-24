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

# In[225]:


#import libraries that will be used in this project

import pandas as pd


# ### 2. Loading our dataset 

# In[237]:


# Loading our dataset
df = pd.read_csv('FreshLifeFloralDB.csv',sep=';')


# ### 3. Dropping unneeded column

# In[238]:


# removing the 'Unnamed:_12' column
df = df.drop(columns=['Unnamed: 12'])
print(df.info())


# ### 4. Cheking for missing values

# In[239]:


missing_values = df.isnull().sum()
print("Missing values:\n", missing_values)


# ### 5. Handling missing values

# In[240]:


# dropping rows with missing values:
df.dropna(inplace=True)
missing_values = df.isnull().sum()
print("Missing values:\n", missing_values)


# ### 6. removing spaces in column names

# In[241]:


# Replacing '' with '_' in all my columns name
df.columns = df.columns.str.replace(' ', '_')
print(df.info())


# ### 7. Converting categorical colum to 'category' dtype

# In[242]:


categorical_cols = ["Product_name", "Subcategory_name", "Category_name", "Color"]
for col in categorical_cols:
    df[col] = df[col].astype("category")
print(df.info())


# In[243]:


df.shape


# In[234]:


df['Product_index'] = df.index


# In[245]:


filtered_row = df[df.index == 1]
print(filtered_row)


# ### 8. Extracting original categorical columns

# In[246]:


# Extract original categorical columns
original_categorical = df[categorical_cols]


# In[247]:


print(original_categorical.shape)


# ### 9. Performing one-hot encoding on the extracted categorical columns

# In[248]:


one_hot_encoded = pd.get_dummies(original_categorical)
print(one_hot_encoded.head())


# ### 10. Concatenating the one-hot encoded DataFrame with the original DataFrame

# In[249]:


data_encoded = pd.concat([df, one_hot_encoded], axis=1)


# ### Feature Engineering
# 
# In this step, we'll create a feature vector for each product by combining relevant attributes like product name, subcategory name, category name, and color.

# ### 11. Combining relevant textual attributes into a single feature vector

# In[250]:


data_encoded["feature_vector"] = data_encoded[categorical_cols].apply(lambda x: ' '.join(x), axis=1)
# Displaying the first few rows of the encoded dataframe
print("Encoded dataframe with feature vector:\n", data_encoded.head())


# ### 12. Creating column index

# In[251]:


data_encoded['Product_index'] = data_encoded.index


# In[252]:


print(data_encoded.head())


# In[261]:


from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity

# Preprocess the feature vectors using CountVectorizer
vectorizer = CountVectorizer()
feature_vectors = vectorizer.fit_transform(data_encoded["feature_vector"])

# Select a specific product index
specific_product_index = 0  # Change this index to select a different product

# Get the feature vector for the specific product
specific_product_vector = feature_vectors[specific_product_index]

# Calculate cosine similarity between the specific product and all other products
cosine_similarities = cosine_similarity(feature_vectors)

# Create a DataFrame to store similarity results
similarities_df = pd.DataFrame({
    "Product_index": data_encoded.index,  # Use DataFrame index as product index
    "Cosine_similarity": cosine_similarities[specific_product_index]  # Cosine similarities for the specific product
})

# Sort the DataFrame by cosine similarity in descending order
similarities_df = similarities_df.sort_values(by="Cosine_similarity", ascending=False)

# Merge with data_encoded to include product names
similarities_df = similarities_df.merge(data_encoded[["Product_name"]], left_on="Product_index", right_index=True)

# Display the most similar products
top_similar_products = similarities_df.head(10)
print("Top 10 similar products to the specified product:")
print(top_similar_products)



# In[260]:


filtered_row = data_encoded[data_encoded.index == 4546]
print(filtered_row)


# In[ ]:





# In[ ]:




