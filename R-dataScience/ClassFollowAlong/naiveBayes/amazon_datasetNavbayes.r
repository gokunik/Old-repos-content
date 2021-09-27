#Exploring the data
amazon=read.table(file=file.choose(),sep=",",header = TRUE)
View(amazon)
str(amazon)
amazon$Review=factor(amazon$Review)
str(amazon)
table(amazon$Review)

#Data Cleaning(Text Mining)
install.packages("tm")
install.packages("NLP")# skip the step if nor problem in loading tm
library(tm)
#1. Creating a corpus
amazon_corpus=VCorpus(VectorSource(amazon$Text))
print(amazon_corpus)
as.character(amazon_corpus[[1]])
#2. Convert the corpus into lowercase
amazon_clean=tm_map(amazon_corpus,content_transformer(tolower))
#3.remove numbers
amazon_clean=tm_map(amazon_clean,removeNumbers)
#4. remove punctuation
amazon_clean=tm_map(amazon_clean,removePunctuation)
#5. remove stopwords
stopwords()
amazon_clean=tm_map(amazon_clean,removeWords,stopwords())
#6. Stemming
install.packages("SnowballC")
library(SnowballC)
wordStem(c("learned","learning"))
amazon_clean=tm_map(amazon_clean,stemDocument)
#7. Strip additional whitespaces
amazon_clean=tm_map(amazon_clean,stripWhitespace)
as.character(amazon_corpus[[1]])
as.character(amazon_clean[[1]])
#8.Create the document term matrix
amazon_dtm=DocumentTermMatrix(amazon_clean)
dtm_m=as.matrix(amazon_dtm)
dtm_df=as.data.frame(dtm_m)
View(dtm_df)

#Creating training and testing datasets
amazon_train=dtm_df[1:200,]
amazon_test=dtm_df[201:284,]
amazon_train_label=amazon[1:200,]$Review
amazon_test_label=amazon[201:284,]$Review
table(amazon_test_label)

#Training the model
install.packages("e1071")
library(e1071)
amazon_model=naiveBayes(amazon_train,amazon_train_label)

#Evaluating the model
amazon_pred=predict(amazon_model,amazon_test)
table(amazon_pred,amazon_test_label)

#Improving the model performance
#Instead of using
amazon_model=naiveBayes(amazon_train,amazon_train_label)
#include laplace parameter
amazon_model=naiveBayes(amazon_train,amazon_train_label,laplace = 1)