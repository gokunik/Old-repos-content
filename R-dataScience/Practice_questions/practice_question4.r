

# Dataset => User Knowledge Modeling Data Set
# Link => https://archive.ics.uci.edu/ml/datasets/User+Knowledge+Modeling


# Unwanted Column -> No
# Missing Data -> NO
# Outliers -> Yes One column have outliers
# Rescaling  -> Yes
# Classification -> knn
# Method Accuracy Can we perform regression on the same dataset. -> yes can be performed 
# If Yes ? which all column(s) can be independent and which column will dependent. -> Column UNS will be dependent on the rest of the column
# If No ? Why ? NA



library("readxl")

# dataset in the excel file is already divided into train and test in 2 different sheets
train = read_excel(file.choose(), sheet = 1)
test = read_excel(file.choose(), sheet = 2)

# Combining it to make the data cleaning work easier
combined = rbind(train, test)
data = combined
combined = data

View(combined)
str(combined)
summary(combined)

table(is.na(combined)) # No Na values found
table(ifelse(combined == "", "yes", "no")) # No blank or missing values found

boxplot(combined[-6]) 
# Only column one have o

outliers = function(data) {
  rule1 = quantile(data, 0.25) - 1.5 * IQR(data)
  rule2 = quantile(data, 0.75) + 1.5 * IQR(data)

  data[data > rule2] = rule2
  data[data < rule1] = rule1
  return(data)
}

combined[, 1:5] = as.data.frame(lapply(combined[ - 6 ] ,  outliers))

boxplot(combined[-6])# outliers removed

# Column UNS supposed to be have 4 level but it seems very low is miss-typed in some places
# using this function correcting the wrong values

myFunc = function(x) {
  if (x == 'very_low') {
    return('Very Low')
  }
  else {
    x = x
  }
  
}
combined$UNS = sapply(combined$UNS, myFunc)
View(combnied) # every thing seems fine now


# Now i can convert the labels into factor 
combined$UNS = factor(combined$UNS)


# creating the test and train dataset
set.seed(5)
randomValues = sample(403, 258)

training = combined[randomValues, -6] 
testing = combined[-randomValues, -6] 

train_label = dataset[randomValues, 6]
test_label = dataset[-randomValues, 6]


library(class)
trainedModal = knn(training, testing, train_label$UNS, k = 21)
# K value selected using squrt method

table(trainedModal, test_label$UNS)

accuracy = function(x) {
  
  return(100 * (sum(diag(x)) / sum(x)))
}

accuracy(table(trainedModal, test_label$UNS))
# [1] 70.34483

# trying to improve the model

trainedModal = knn(training, testing, train_label$UNS, k = 17)
# not going for too low and too high k value to avoid underfit and overfit
accuracy(table(trainedModal, test_label$UNS))
# [1] 75.86207


# trying rescaling
combined[,-6] = as.data.frame(scale(combined[-6]))
View(combined)


trainedModal = knn(training, testing, train_label$UNS, k = 17)
accuracy(table(trainedModal, test_label$UNS))
#[1] 76.55172
