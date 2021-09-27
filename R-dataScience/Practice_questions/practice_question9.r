abalone = read.table(file.choose(), sep = ',', stringsAsFactors = TRUE) 
View(abalone)
str(abalone)


dataScaled = as.data.frame(scale(abalone[-1]))
View(dataScaled)

set.seed(1)

x = sample(4177,2924)

train = dataScaled[x,]
test = dataScaled[-x,]

train_label = abalone[x,1]
test_label = abalone[-x,1]

library('class')
effi = function(mat) {

  return(sum(diag(mat)) / sum(mat))
}
pred = knn(train,test,train_label,k=21)

table(pred,test_label)
effi(table(pred, test_label))




