
#  Algo used knn -> because dataset consist of numerical data columns
# thus can easily be handled by the knn classifier

x = read.table(file.choose(),sep = ',',header = TRUE)
View(x)
str(x)


reScale = as.data.frame(scale(x[-1]))
View(reScale)

set.seed(11)

y = sample(329,231)

train = reScale[y,]
test  = reScale[-y,]

train_label = x[y,1]
test_label  = x[-y,1]

library('class')
effi = function(mat) {
  
  return(sum(diag(mat))/sum(mat))
}


pred = knn(train,test,train_label, k=9)

table(pred,test_label)
effi(table(pred,test_label))
