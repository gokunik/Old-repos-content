haberman = read.csv(file.choose(), sep = ",", header = TRUE)
View(haberman)
data = haberman
table(is.na(haberman))

summary(haberman)
str(haberman)

haberman$X1.1 = as.factor(haberman$X1.1)

haberman[c(1,2,3)] = as.data.frame(scale(haberman[-4]))
View(haberman)


#test and train dataset

train = haberman[1:250,]
test = haberman[251:305,]

library(neuralnet)


modal = neuralnet(X1.1~.,data = train, hidden = 5)
prob=modal$net.result

