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

# ### 1. Importing neccesary Libraries

# In[40]:


#import libraries that will be used in this project

import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel


# ### 2. Loading our dataset 

# In[41]:


# Loading our dataset
df = pd.read_csv('FreshLifeFloralDB.csv',sep=';')


# ### 3. Dataset preview

# In[42]:


df.head()


# #### 3.1 Shape of my dataframe

# In[43]:


df.shape


# #### 3.2 Checking columns of my dataframe

# In[44]:


df.columns


# In[45]:


df.info()


# #### 3.3 Transformming Float columns to Integer values

# In[46]:


# Converting float64 columns to integers
df[df.select_dtypes(include='float64').columns] = df.select_dtypes(include='float64').apply(pd.to_numeric, errors='coerce').astype('Int64')


# In[47]:


df.info()


# ##### Removing all spaces in column names

# In[48]:


# Replacing '' with '_' in all my columns name
df.columns = df.columns.str.replace(' ', '_')


# In[49]:


df.info()


# In[51]:


# Assuming you want to remove the 'Unnamed:_12' column
df = df.drop(columns=['Unnamed:_12'])


# In[52]:


print(df.head())


# ### 4. Features Extraction

# In[53]:


# Feature Extraction
features = df[['Product_name','Category_name','Subcategory_name','Color']].astype(str).apply(lambda x: ' '.join(x), axis=1)
#'Subcategory_name', 'Category_name'


# In[54]:


features


# ### 5. TF-IDF Vectorization

# In[55]:


#We use TfidfVectorizer from scikit-learn to convert text data into numerical vectors.
#stop_words='english' parameter removes common English stop words from the feature tokens.
tfidf_vectorizer = TfidfVectorizer(stop_words='english')
tfidf_matrix = tfidf_vectorizer.fit_transform(features)


# In[56]:


# Output the shape of the TF-IDF matrix
print("TF-IDF Matrix Shape:", tfidf_matrix.shape)


# In[39]:


tfidf_matrix


# ### 6.Similarity Calculation using Cosine Similarity

# In[ ]:


#We calculate cosine similarities between all pairs of products using linear_kernel from scikit-learn.
#Cosine similarity is a measure of similarity between two non-zero vectors.
cosine_similarities = linear_kernel(tfidf_matrix, tfidf_matrix)


# In[ ]:


# Output the shape of the cosine similarity matrix
print("Cosine Similarity Matrix Shape:", cosine_similarities.shape)


# ### 7.Recommend products for a given product

# In[33]:


#We specify the product for which we want to find recommendations (product_of_interest).
product_of_interest = 'Mondial'


# ### 8.Get index of the product

# In[34]:


#We find the index of the specified product in the DataFrame.
product_index = df[df['Product_name'] == product_of_interest].index
if len(product_index) > 0:
    product_index = product_index[0]
else:
    print(f"Product '{product_of_interest}' not found in the dataset.")
    exit()


# In[38]:


product_index


# ### 9. Get similar products based on similarity scores

# In[35]:


#We obtain the indices of similar products based on the similarity scores with the specified product.
#The -2:-1 slicing ensures that we exclude the specified product itself.
if len(similar_products_indices) > 1:
    similar_products = df.iloc[similar_products_indices[1]]['Product_name']
else:
    similar_products = "No similar products found"


# In[37]:


similar_products


# ### 10.Print recommendations

# In[36]:


#Finally, we print the recommendations for the specified product.
if similar_products == product_of_interest:
    similar_products = df.iloc[similar_products_indices[1]]['Product_name']
print(f"Recommendations for '{product_of_interest}': {similar_products}")


# In[ ]:




