#data exploration
credit = read.table(file = file.choose(), sep = ",", header = TRUE, stringsAsFactors = TRUE)
View(credit)
str(credit)
credit$default = as.factor(credit$default)
summary(credit)
#names=c('colum1','column2',.......,'columnn')
#credit[,names]=lapply(credit[,names],factor)

#creating traing and testing datasets
set.seed(123)
credit_sample = sample(1000, 900)
credit_sample
credit_train = credit[credit_sample,]
credit_test = credit[-credit_sample,]

#train the model
install.packages("C50")
library(C50)
credit_model = C5.0(credit_train[-17], credit_train$default)
credit_model
summary(credit_model)

#Evaluate the model performance
credit_pred = predict(credit_model, credit_test[-17])
table(credit_pred, credit_test$default)

#improving the model performance
#1.Boosting the accuracy
#instead of
credit_model = C5.0(credit_train[-17], credit_train$default)
#use
credit_model = C5.0(credit_train[-17], credit_train$default, trial = 10)
#2.Cost Matrix
matrix_dimensions = list(c("1", "2"), c("1", "2"))
names(matrix_dimensions) = c("predicted", "actual")
matrix_dimensions
# 1-1: 0
# 2-1: 1
# 1-2: 4
# 2-2: 0
error_cost = matrix(c(0, 1, 4, 0), nrow = 2, dimnames = matrix_dimensions)
error_cost
#instead of
credit_model = C5.0(credit_train[-17], credit_train$default)
#use
credit_model = C5.0(credit_train[-17], credit_train$default, costs = error_cost)