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

# In[23]:


#import libraries that will be used in this project
import pandas as pd
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np


# ### 2. Loading our dataset 

# In[24]:


# Loading our dataset
df = pd.read_csv('FreshLifeFloralDB.csv',sep=';')


# ### 3. Dropping unneeded column

# In[25]:


# removing the 'Unnamed:_12' column
df = df.drop(columns=['Unnamed: 12'])
print(df.info())


# ### 4. Cheking for missing values

# In[26]:


#Cheking for missing values
missing_values = df.isnull().sum()
print("Missing values:\n", missing_values)


# ### 5. Handling missing values

# In[27]:


# dropping rows with missing values:
df.dropna(inplace=True)
missing_values = df.isnull().sum()
print("Missing values:\n", missing_values)


# ### 6. removing spaces in column names

# In[28]:


# Replacing '' with '_' in all my columns name
df.columns = df.columns.str.replace(' ', '_')
print(df.info())


# ### 7. Converting categorical colum to 'category' dtype

# In[29]:


#Converting categorical colum to 'category' dtype
categorical_cols = ["Product_name", "Subcategory_name", "Category_name", "Color"]
for col in categorical_cols:
    df[col] = df[col].astype("category")
print(df.info())


# In[30]:


df.shape


# In[31]:


df['Product_index'] = df.index


# In[32]:


filtered_row = df[df.index == 1]
print(df.index == 1)


# ### Replacing spaces in all values of my categorical colums

# In[33]:


# Replacing ' ' with '_' in all values of categorical columns
for col in categorical_cols:
    df[col] = df[col].apply(lambda x: x.replace(' ', '_'))


# In[34]:


print(df[df.index == 1])


# ### 8. Extracting original categorical columns

# In[35]:


# Extract original categorical columns
original_categorical = df[categorical_cols]


# In[36]:


print(original_categorical.shape)


# ### 9. Performing one-hot encoding on the extracted categorical columns

# In[37]:


#Performing one-hot encoding on the extracted categorical columns
one_hot_encoded = pd.get_dummies(original_categorical)
print(one_hot_encoded.head())


# ### 10. Concatenating the one-hot encoded DataFrame with the original DataFrame

# In[38]:


#Concatenating the one-hot encoded DataFrame with the original DataFrame
data_encoded = pd.concat([df, one_hot_encoded], axis=1)


# ### Feature Engineering
# 
# In this step, we'll create a feature vector for each product by combining relevant attributes like product name, subcategory name, category name, and color.

# ### 11. Combining relevant textual attributes into a single feature vector

# In[39]:


#Combining relevant textual attributes into a single feature vector
data_encoded["feature_vector"] = data_encoded[categorical_cols].apply(lambda x: ' '.join(x), axis=1)
# Displaying the first few rows of the encoded dataframe
print("Encoded dataframe with feature vector:\n", data_encoded.head())


# ### 12. Creating column index in data_encoded 

# In[40]:


# Creating column index
data_encoded['Product_index'] = data_encoded.index


# In[41]:


# Preprocess the feature vectors using CountVectorizer
#vectorizer = CountVectorizer()
vectorizer = CountVectorizer()
feature_vectors = vectorizer.fit_transform(data_encoded["feature_vector"])


# In[42]:


def calculate_cosine_similarity_batch(feature_vectors, specific_product_index, batch_size=1000):
    num_samples = feature_vectors.shape[0]
    num_batches = num_samples // batch_size + 1 if num_samples % batch_size != 0 else num_samples // batch_size
    
    cosine_similarities = []
    for i in range(num_batches):
        start_idx = i * batch_size
        end_idx = min((i + 1) * batch_size, num_samples)
        
        if start_idx <= specific_product_index < end_idx:
            print("Excluding specific product index from batch")
            print("Start index:", start_idx)
            print("End index:", end_idx)
            
            # Split feature vectors into two parts: before and after the specific product index
            before_product = feature_vectors[:specific_product_index]
            after_product = feature_vectors[specific_product_index + 1:end_idx]
            
            # Calculate cosine similarity separately for each part
            before_similarity = cosine_similarity(before_product, feature_vectors)
            after_similarity = cosine_similarity(after_product, feature_vectors)
            
            # Concatenate cosine similarities
            batch_similarity = np.concatenate((before_similarity, after_similarity), axis=0)
            
            print("Before product shape:", before_product.shape)
            print("After product shape:", after_product.shape)
        else:
            print("Including all samples in batch")
            print("Start index:", start_idx)
            print("End index:", end_idx)
            
            # Calculate cosine similarity for the entire batch
            batch_feature_vectors = feature_vectors[start_idx:end_idx]
            batch_similarity = cosine_similarity(batch_feature_vectors, feature_vectors)
        
        cosine_similarities.append(batch_similarity)
    
    return np.vstack(cosine_similarities)


# In[43]:


# Select a specific product index
specific_product_index = 5  # Change this index to select a different product
specific_product = data_encoded.iloc[specific_product_index]
print(specific_product)


# In[44]:


# Calculate cosine similarity between the specific product and all other products
cosine_similarities = calculate_cosine_similarity_batch(feature_vectors, specific_product_index)


# In[ ]:


# Create a DataFrame to store similarity results
similarities_df = pd.DataFrame({
    "Product_index": data_encoded.index, # Use DataFrame index as product index
    "Cosine_similarity": cosine_similarities.flatten()
})


# In[ ]:


# Display the most similar products
similar_products = similarities_df.nlargest(11, "Cosine_similarity").iloc[1:]  # Exclude the specific product itself
print("Top 10 similar products to the specified product:")
print(similar_products)

