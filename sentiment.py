#!/usr/bin/env python
# coding: utf-8

# In[42]:


#warnings :)
import warnings
warnings.filterwarnings('ignore')


import pandas as pd 
# Local directory
Reviewdata = pd.read_csv('train.csv')

# Apply first level cleaning
import re
import string



#This function converts to lower-case, removes square bracket, removes numbers and punctuation
def text_clean_1(text):
    text = text.lower()
    text = re.sub('\[.*?\]', '', text)
    text = re.sub('[%s]' % re.escape(string.punctuation), '', text)
    text = re.sub('\w*\d\w*', '', text)
    return text

cleaned1 = lambda x: text_clean_1(x)


# Apply a second round of cleaning
def text_clean_2(text):
    text = re.sub('[‘’“”…]', '', text)
    text = re.sub('\n', '', text)
    return text

cleaned2 = lambda x: text_clean_2(x)

# Let's take a look at the updated text
Reviewdata['cleaned_description_new'] = pd.DataFrame(Reviewdata.Description.apply(cleaned2))
#Reviewdata.head(10)


# In[43]:


#Model training 

from sklearn.model_selection import train_test_split

Independent_var = Reviewdata.cleaned_description_new
Dependent_var = Reviewdata.Is_Response

IV_train, IV_test, DV_train, DV_test = train_test_split(Independent_var, Dependent_var, test_size = 0.1, random_state = 225)

#print('IV_train :', len(IV_train))
#print('IV_test  :', len(IV_test))
#print('DV_train :', len(DV_train))
#print('DV_test  :', len(DV_test))


from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
tvec = TfidfVectorizer()
clf2 = LogisticRegression(solver = "lbfgs")
from sklearn.pipeline import Pipeline

model = Pipeline([('vectorizer',tvec),('classifier',clf2)])
model.fit(IV_train, DV_train)
from sklearn.metrics import confusion_matrix
predictions = model.predict(IV_test)
confusion_matrix(predictions, DV_test)


# In[34]:


# Model prediciton

from sklearn.metrics import accuracy_score, precision_score, recall_score

#print("Accuracy : ", accuracy_score(predictions, DV_test))
#print("Precision : ", precision_score(predictions, DV_test, average = 'weighted'))
#print("Recall : ", recall_score(predictions, DV_test, average = 'weighted'))


# In[41]:


import sys
string = ''
for word in sys.argv[1:]:
    string += word + ' '


#example = ["This is bad Movie"]
example =[string]
result = model.predict(example)


print(result)


# In[ ]:





# In[ ]:




