# Unwanted Column -> False
# Missing Data -> False
# Outliers -> True 
# Rescaling  -> True
# Classification -> knn
# Method Accuracy Can we perform regression on the same dataset. -> i think yes
# If Yes ? which all column(s) can be independent and which column will dependent. -> first 4 columns indipendent and last columns is dependent
# If No ? Why ? -------


data = read.csv(file.choose(),sep = ",",header = TRUE)
View(data)
str(data)
summary(data)

table(is.na(data)) 
boxplot(data)

out_winsor = function(data) {
  rule1=quantile(data,0.25)-1.5*IQR(data) 
  rule1
  rule2=quantile(data,0.75)+1.5*IQR(data)
  rule2

  data2=data
  data2[data2>rule2] = rule2
  data2
  data2[data2<rule1] = rule1
  return(data2)
}

data[,-5] = as.data.frame(lapply(data[-5], out_winsor))

# normalization

data[,-5] = as.data.frame(scale(data[-5]))
View(data)

# training and testing dataset

set.seed(11)
r = sample(748,530)

train = data[r,-5]
test = data[-r,-5]

train_label = data[r,5]
test_label = data[-r,5]

library(class)

efficiency = function(x) {
  
  return((sum(diag(x)) / sum(x)))
}

modal = knn(train = train, test = test, train_label, k = 27)

table(modal,test_label)

efficiency(table(modal,test_label))
# [1] 0.7981651
