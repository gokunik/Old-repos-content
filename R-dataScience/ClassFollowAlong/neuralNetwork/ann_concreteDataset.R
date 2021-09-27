concrete = read.csv(file.choose(), sep = ",", header = TRUE)

View(concrete)
summary(concrete)
str(concrete)
table(is.na(concrete))

concreteScaled = as.data.frame(scale(concrete))
View(concreteScaled)
summary(concreteScaled)


# testing and training dataset

train = concreteScaled[1:930,]
test = concreteScaled[931:1030,]

# Training the model
# their are number of packages available to train the model


install.packages("neuralnet")
library(neuralnet)

#hidden =c(5,2), 2 hidden layers, first with 5 and second with 2 neurons
concrete_model = neuralnet(ConcreteCompressiveStrength~., data = train, hidden = 10)
help(".")
??.

plot(concrete_model)

# Evaluating the model performance

model_result = compute(concrete_model,test[1:8])
model_result$neurons
concretePredicted = model_result$net.result

cor(concretePredicted,test$ConcreteCompressiveStrength)







