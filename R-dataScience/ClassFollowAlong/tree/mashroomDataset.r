#Explore the data
mushroom=read.table(file=file.choose(),sep=",",stringsAsFactors = TRUE)
View(mushroom)
str(mushroom)
summary(mushroom)
mushroom$V17=NULL
View(mushroom)
str(mushroom)
summary(mushroom)
table(mushroom$V1)
#1. use C5.0
#Create training and testing data sets
#Train the model
#Evaluate the model
#Improve the model performance

#2. Classification rules
#Create training and testing data sets
#train the model
install.packages("RWeka")
library(RWeka)


mushroom_rules=OneR(V1~.,data=mushroom)
mushroom_rules
#Evaluate the model
summary(mushroom_rules)
mushroom_pred=predict(mushroom_rules,)
table(mushroom_pred,)
#Improve the model performance
#instead of
mushroom_rules=OneR(V1~.,data=mushroom)
#use
mushroom_rules=JRip(V1~.,data=mushroom)