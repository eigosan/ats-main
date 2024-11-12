import sys
import pandas as pd
import nltk
import pickle
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.neighbors import KNeighborsClassifier
from nltk.corpus import stopwords
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score, cohen_kappa_score, precision_score, recall_score, f1_score, confusion_matrix, classification_report
import seaborn as sns
import matplotlib.pyplot as plt

# Download the necessary NLTK resources
nltk.download('punkt')
nltk.download('stopwords')

# Load the CSV dataset
df = pd.read_csv('Resume.csv')

# Normalize text in the 'Resume_str' column (convert to lowercase and strip extra spaces)
df['Resume_str'] = df['Resume_str'].apply(lambda x: x.lower().strip() if isinstance(x, str) else x)

# Initialize the vectorizer
vectorizer = CountVectorizer()

# Transform the 'Resume_str' into numerical features
X = vectorizer.fit_transform(df['Resume_str'])

# Extract the target variable (the 'Category' column)
y = df['Category']

# Split the data into training and testing sets (70% training, 30% testing)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Initialize the KNN classifier
knn = KNeighborsClassifier(n_neighbors=5)

# Train the model
knn.fit(X_train, y_train)

# Make predictions on the test set
y_pred = knn.predict(X_test)

# Calculate evaluation metrics
accuracy = accuracy_score(y_test, y_pred)
kappa = cohen_kappa_score(y_test, y_pred)
precision = precision_score(y_test, y_pred, average='weighted')
recall = recall_score(y_test, y_pred, average='weighted')
f1 = f1_score(y_test, y_pred, average='weighted')

# Generate the classification report
class_report = classification_report(y_test, y_pred, output_dict=True)

# Convert the classification report to a DataFrame
class_report_df = pd.DataFrame(class_report).transpose()

# Add a column for 'Number of Samples'
class_report_df['Number of Samples'] = class_report_df['support']

# Display the table with relevant columns
class_report_df = class_report_df[['precision', 'recall', 'f1-score', 'Number of Samples']]
class_report_df = class_report_df.rename(columns={'precision': 'Precision', 'recall': 'Recall', 'f1-score': 'F1-Score'})

# Show the classification report as a table
print("Classification Report (as table):")
print(class_report_df)

# Create a figure for multiple plots
fig, axes = plt.subplots(2, 3, figsize=(18, 12))

# Plot accuracy
axes[0, 0].bar(['Accuracy'], [accuracy], color='blue')
axes[0, 0].set_ylim([0, 1])
axes[0, 0].set_title('Accuracy')
axes[0, 0].set_ylabel('Score')

# Plot Kappa
axes[0, 1].bar(['Kappa'], [kappa], color='green')
axes[0, 1].set_ylim([0, 1])
axes[0, 1].set_title('Kappa Statistics')
axes[0, 1].set_ylabel('Score')

# Plot Precision
axes[0, 2].bar(['Precision'], [precision], color='orange')
axes[0, 2].set_ylim([0, 1])
axes[0, 2].set_title('Precision')
axes[0, 2].set_ylabel('Score')

# Plot Recall
axes[1, 0].bar(['Recall'], [recall], color='red')
axes[1, 0].set_ylim([0, 1])
axes[1, 0].set_title('Recall')
axes[1, 0].set_ylabel('Score')

# Plot F1-Score
axes[1, 1].bar(['F1-Score'], [f1], color='purple')
axes[1, 1].set_ylim([0, 1])
axes[1, 1].set_title('F1-Score')
axes[1, 1].set_ylabel('Score')

# Visualize the confusion matrix as a heatmap
conf_matrix = confusion_matrix(y_test, y_pred)
sns.heatmap(conf_matrix, annot=True, fmt='d', cmap='Blues', xticklabels=df['Category'].unique(), yticklabels=df['Category'].unique(), ax=axes[1, 2])
axes[1, 2].set_title('Confusion Matrix')
axes[1, 2].set_xlabel('Predicted')
axes[1, 2].set_ylabel('True')

# Adjust layout and display the plots
plt.tight_layout()
plt.savefig('evaluation_metrics.png')  # Save the entire figure as an image
plt.show()

# Save the model and vectorizer to files
with open('resume_classifier.pkl', 'wb') as model_file:
    pickle.dump(knn, model_file)
with open('vectorizer.pkl', 'wb') as vec_file:
    pickle.dump(vectorizer, vec_file)

print("Model and vectorizer saved successfully!")
