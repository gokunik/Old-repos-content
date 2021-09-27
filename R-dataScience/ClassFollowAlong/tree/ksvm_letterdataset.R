letter = read.table(file = file.choose(),sep = ',')
View(letter)
str(letter)
summary(letter)
letter$V1 = as.factor(letter$V1)
str(letter)
summary(letter)

# creating train and test dataset
letterTrain = letter[1:16000,]
letterTest  = letter[16001:20000,]

# install.packages('kernlab')
library('kernlab')
letterModel = ksvm(V1~.,data=letterTrain, kernel='vanilladot')

#evaluating the model performance 
letter_predict = predict(letterModel, letterTest)
result = letter_predict == letterTest$V1

table(result)
prop.table(table(result))
