# exploring data

wdbc = read.table(file.choose(),sep = ',')
View(wdbc)

#dropping the column first because 
#it is not providing any useful info
wdbc=wdbc[-1]


# checking the target feature that we will be predicting
table(wdbc$v2) 
str(wdbc)


#converting the target feature into factor as required by the machine learning 
wdbc$v2 = factor(wdbc$v2,levels = c('B','M'))
str(wdbc)
summary(wdbc)
# after looking at the data we can see that it is not normalized
# To work with the data we need to normalize the data first

#preparing the data

#min - max normalization
normalize = function(x) # function for rescaling
{
  return((x-min(x))/(max(x)-min(x))) # Formula for data normalization
}

normalize(c(1,2,3,4,5)) # checking the function

# Rescaling the data so that each column lies in the same range
wdbc_n= as.data.frame(lapply(wdbc[2:31],normalize))
View(wdbc_n)


# code by mam
normalize=function(x)
{
  return((x-min(x))/(max(x)-min(x)))
}
normalize(c(10,20,30,40,50))
#rescaling the data so that each column lies in the same range

wdbc_n=as.data.frame(lapply(wdbc[2:31], normalize))
View(wdbc_n)


##################################################################

# creating training and testing datasets
wdbc_train=wdbc_n[1:469,]#training dataset
wdbc_test=wdbc_n[470:569,]#testing dataset

View(wdbc_train)
View(wdbc_test)

# while normaliztion label have been removed
# so label are added in the label vector to determine 
# the type of data
wdbc_train_label = wdbc[1:469,1] 
wdbc_test_label = wdbc[470:569,1]

View(wdbc_train_label) 
View(wdbc_test_label)


# training a model and prediction

# installing required libraries
installed.packages('class')
library(class)

# training the model by providing training dataset and the training label
#and this will e compaired with test data and test label 

wdbc_pred=knn(train=wdbc_train,test = wdbc_test,wdbc_train_label,k=21)
# k is sqrt total number of values or rows in training dataset
# knn() returns a factor of predicted values for each of the row in the 
# wdbc_test dataset

View(wdbc_pred)

table(wdbc_pred,wdbc_test_label) 
# matching with actual data to check how accurate results where predicted
# model producing 98 % accuracy 

#6.Improving the model performance

#a)Use Z-Score standardisation for rescaling

wdbc = read.table(file.choose(),sep = ',')
View(wdbc_na)
wdbc=wdbc[-1]
wdbc_na=as.data.frame(scale(wdbc[-1]))
View(wdbc_na)

#use
wdbc_na=as.data.frame(scale(wdbc[-1]))

#b)Testing alternative values of k











