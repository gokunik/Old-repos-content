# install.packages("fastDummies") 
library(fastDummies)
effi = function(mat) {
  
  return (100 * (sum(diag(mat))/sum(mat)))
}

internet = read.table(file.choose(), sep = ' ', stringsAsFactors = TRUE)
View(internet)

names = colnames(internet[-5])
names

dummy = dummy_cols(internet, select_columns = names)
View(dummy)

dummy = dummy[-c(1:4)]
dummy

set.seed(1)
ran = sample(322,232)

train = dummy[ran,-1]
test = dummy[-ran,-1]

train_label = dummy[ran,1]
test_label = dummy[-ran,1]

library('class')

pred = knn(train = train, test = test, train_label, k=17)

table(pred,test_label)
effi(table(pred,test_label))

# improving the model accuracy

# using k value as 15
pred = knn(train = train, test = test, train_label, k=15)
table(pred,test_label)
effi(table(pred,test_label))

