# Name - Nitesh Khatri
# Reg - 11813971
# Roll No - 48

# data set => user knowledge modeling data set

# Classification method used and why

# knn
# Because of the numerical nature of the data set i decided to 
# use knn classification method. Data set consist of 6 columns out of which one 
# is labeled data column and other are numeric columns which is exactly what we 
# use for knn.
# Naive bays can also be considered for this data set but i am going for knn over
# nave bays.


# if below or similiar error comes please re choose the dataset and re run the code
# Error in train_label$UNS:$operator is invalid for
#   atomic vectors

# install.packages('readxl')
library("readxl")

# getwd()
# setwd('E:\\Sem 6\\Int')

# using original data set 
# With original data set some editing is required to use the data set 
# because it was distributed in 3 sheets inside the xlsx file
#-------------------------------------------------------------------#

# train_data = read_excel(file.choose(), sheet = 2 )
# test_data = read_excel(file.choose(), sheet = 3 )
# train_data = train_data[-c(7,8,9)] # - removing unnecessary columns
# test_data = test_data[-c(7,8,9)]   # - removing unnecessary columns
# View(train_data)
# str(train_data)
# View(test_data)
# str(test_data)
# dataset = rbind(train_data,test_data)
# View(dataset)

#-------------------------------------------------------------------#

# I prefer using method 2 because it is simple and easy
# using the combined data set
# For this i have copy pasted the train and test data set together in one file

data = read_excel(file.choose())
dataset = data # main dataset 
selective = data # dataset used for selective re scaling

View(dataset)
str(dataset)
summary(dataset)

# By analysing the data set i found out that for UNS column their should be only
# 4 classes as mentioned in the data set but very low is miss typed and written 
# as "very_low" and "very low" because of this one class is treated as 2 and thus 
# causing low efficiency 

str(dataset$UNS)
summary(dataset$UNS)

# function to change very_low to Very Low
veryLow = function(x) {
  if (x == 'very_low') {
    return('Very Low')
  }
  else {
    x = x
  }

}

dataset$UNS = sapply(dataset$UNS, veryLow)
str(dataset$UNS)
summary(dataset$UNS)


# converting label to predicted to factor type
dataset$UNS = factor(dataset$UNS)
str(dataset$UNS)
summary(dataset$UNS)
View(dataset)




# distributing the data set into train and test

# Generating random values and taking training and testing data randomly 
# instead of taking fixed values. it produces more efficient model
set.seed(1)
random = sample(403, 258) # create 258 random numbers in range of 1 and 403

# test and train dataset
train = dataset[random, -6] # 70 %
test = dataset[-random, -6] # 30 %

# labels for test and train
train_label = dataset[random, 6]
test_label = dataset[-random, 6]



library(class)

# function for checking efficiency of the model
efficiency = function(x) {

  return(100 * (sum(diag(x)) / sum(x)))
}

pred = knn(train, test, train_label$UNS, k = 21)

table(pred, test_label$UNS)
# pred       High Low  Middle  Very Low
# High       27   0      2        0
# Low         0  41     12        6
# Middle      8   0     37        0
# Very Low    0   0      0       12
# middle and low are related in related in most number of discrepancy


efficiency(table(pred, test_label$UNS))
# value of k = 21 and without re scaling or normalization
# approx efficiency \ accuracy 80 to 81 %
# [1] 80.68966


# ----------------------------------------------------------
# _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
# ----------------------------------------------------------

# improving the efficiency of the model  

# 1. trying different values of k 

# k= 19 
pred = knn(train, test, train_label$UNS, k = 19)
efficiency(table(pred, test_label$UNS))

# approx 81 to 83 % 
# [1] 82.75862

# k = 17
pred = knn(train, test, train_label$UNS, k = 17)
efficiency(table(pred, test_label$UNS))

# approx 80 to 81 % 
# [1] 81.37931

# k = 15
pred = knn(train, test, train_label$UNS, k = 15)
efficiency(table(pred, test_label$UNS))
# approx 82 to 83 % 
# [1] 82.75862


# -------------------------------------------------

# 2. using min-max normalization and z scale

# a. min-max normalization
normalize = function(x) {
  return((x - min(x)) / (max(x) - min(x)))
}

dataset_mm = as.data.frame(lapply(data[-6], normalize))
View(dataset_mm)

train = dataset_mm[random, -6] # 70 %
test = dataset_mm[-random, -6] # 30 %

pred = knn(train, test, train_label$UNS, k = 19)

table(pred, test_label$UNS)
efficiency(table(pred, test_label$UNS))

# with min-max normalization overall accuracy decreased a bit 
# 78 to 80 % with differnet values of k
# [1] 79.31034

# b. using z scale 

dataset_z = as.data.frame(scale(data[-6]))
View(dataset_z)


train = dataset_z[random, -6] # 70 %
test = dataset_z[-random, -6] # 30 %

pred = knn(train, test, train_label$UNS, k = 17)
table(pred, test_label$UNS)
efficiency(table(pred, test_label$UNS))

# With z scale normalization overall accuracy decreased
# approx 76 to 79 % with different k values
# [1] 78.62069


##################################################################
#----------------------------------------------------------------#
##################################################################

# After further analysis of dataset and studying different model results 
# i noticed that even without any normalization or re scaling the model is above
# 80 % accurate and when the normalization or re scaling is applied the accuracy
# decreased insted of increasing then i futher tried to understand the reason and
# found that the most wrongly predicted values are related middle and low class. 
# one thing is clear that re scaling or normalization is not required for the complete
# dataset as it has decreased the overall accuracy and efficiency which suggested that not
# the complete dataset is need to be re scaled maybe its already stable so to check this i 
# only applied re scaling to two classes which is causing the most number of discrepancy

# Applying re scaling to those rows which are either contain middle or low 
selective = data

# After applying re scaling with a number of combination on middle and low class i found that by apply 
# re scaling on both the class together also decreases the efficiency but if we are applying it on either
# of them then it is increasing the efficiency to aprrox 93 % with different values of k

# Accuray - aprrox 93 when tried with different 'stable' values of k
selective[data$UNS == 'Middle', -6] = as.data.frame(scale(dataset[data$UNS == 'Middle', -6]))

# Accuracy - approx 90 when tried with different 'stable' values of k
# selective[data$UNS == 'Low', -6]      = as.data.frame(scale(dataset[data$UNS == 'Low', -6]))

View(selective)

train = selective[random, -6] # 70 %
test = selective[-random, -6] # 30 %

pred = knn(train, test, train_label$UNS, k = 15)
table(pred, test_label$UNS)
# pred     High  Low Middle Very Low
# High      35    0   2       0
# Low       0     41  3       4
# Middle    0     0   45      0
# Very Low  0     0   1       14

efficiency(table(pred, test_label$UNS))
# [1] 93.10345


# Efficiency increases exponentially when a low k value is used. Not no make the value of k over fitted or under fitted
# i have used a midium value of k which is nither too low or too high and stays around the actuall value of k (sqrt(total no. obs.))

