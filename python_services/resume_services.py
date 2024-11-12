import sys
import pandas as pd
import nltk
import pickle
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.neighbors import KNeighborsClassifier
from nltk.corpus import stopwords

# Download the necessary NLTK resources
nltk.download('punkt')
nltk.download('stopwords')

# Load the CSV dataset
# Adjust the file path as needed
df = pd.read_csv('Resume.csv')

# %%
print(df.columns)

# %%
# Normalize text in the 'Resume_str' column (convert to lowercase and strip extra spaces)
df['Resume_str'] = df['Resume_str'].apply(lambda x: x.lower().strip() if isinstance(x, str) else x)

# Check the cleaned text
df['Resume_str'].head()


# %%
from sklearn.feature_extraction.text import CountVectorizer

# Initialize the vectorizer
vectorizer = CountVectorizer()

# Transform the 'Resume_str' into numerical features
X = vectorizer.fit_transform(df['Resume_str'])

# Check the shape of the feature matrix
X.shape


# %%
# Extract the target variable (the 'Category' column)
y = df['Category']


# %%
from sklearn.model_selection import train_test_split

# Split the data into training and testing sets (70% training, 30% testing)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Check the shape of the training and testing sets
X_train.shape, X_test.shape


# %%
from sklearn.neighbors import KNeighborsClassifier

# Initialize the KNN classifier
knn = KNeighborsClassifier(n_neighbors=5)

# Train the model
knn.fit(X_train, y_train)


# %%
# Make predictions on the test set
y_pred = knn.predict(X_test)

# Check the predicted labels
y_pred[:10]  # Display first 10 predictions


# %%
from sklearn.metrics import accuracy_score, confusion_matrix, classification_report

# Calculate accuracy
accuracy = accuracy_score(y_test, y_pred)
print(f'Accuracy: {accuracy:.4f}')

# Confusion matrix
conf_matrix = confusion_matrix(y_test, y_pred)
print("Confusion Matrix:")
print(conf_matrix)

# Classification report
class_report = classification_report(y_test, y_pred)
print("Classification Report:")
print(class_report)


# %%
import seaborn as sns
import matplotlib.pyplot as plt

# Visualize the confusion matrix as a heatmap
sns.heatmap(conf_matrix, annot=True, fmt='d', cmap='Blues', xticklabels=df['Category'].unique(), yticklabels=df['Category'].unique())
plt.title("Confusion Matrix")
plt.xlabel("Predicted")
plt.ylabel("True")
plt.show()

with open('resume_classifier.pkl', 'wb') as model_file:
    pickle.dump(knn, model_file)
with open('vectorizer.pkl', 'wb') as vec_file:
    pickle.dump(vectorizer, vec_file)

print("Model and vectorizer saved successfully!")
