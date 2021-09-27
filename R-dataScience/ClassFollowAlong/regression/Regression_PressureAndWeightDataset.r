effi = function(mat) {
  return(sum(diag(mat))/sum(mat))
}

dataset = read.table(file=file.choose(),sep=",",header = TRUE,stringsAsFactors = TRUE)

View(dataset)
summary(dataset)
str(dataset)

install.packages("psych")
library(psych)

pairs.panels(dataset)

set.seed(10)

ran=sample(30,26)
train=dataset[ran,]
test=dataset[-ran,]


model=lm(X~.,data=train)
summary(model)
pred = predict(model,test[-1])

table(pred,test$X)


effi(table(pred,test$X))

