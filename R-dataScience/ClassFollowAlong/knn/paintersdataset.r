library(MASS)
View(painters)
 ?painters  # to get the 
str(painters)
summary(painters)
getwd()

# no need to remove any columns
# required column is already a factor

#normalize = function(x) # function for rescaling
#{
#  return((x-min(x))/(max(x)-min(x))) # Formula for data normalization
#}
#painters_data= as.data.frame(lapply(painters_data[1:4],normalize))


painters_data = scale(painters[-5])
View(painters_data)

# creating training and testing data
set.seed(1)
sample = sample(54,40)

train_data = painters_data[sample1,]
test_data = painters_data[-sample1,]

# creating testing labels

train_labels = painters[sample1,5]
test_labels = painters[-sample1,5]

installed.packages('class')
library(class)


painters_pred = knn(train = train_data, test = test_data, train_labels, k=8)

View(painters_pred)

CrossTable(painters_pred,test_labels)
table(painters_pred,test_labels)

effi = function(mat) {
  return(sum(diag(mat))/sum(mat))
}

effi(table(painters_pred,test_labels))


install.packages('gmodels')
library(gmodels)

