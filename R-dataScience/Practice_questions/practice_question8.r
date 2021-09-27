
dataCleaning = function(data) {
  
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


library("readxl")

data = read_excel(file.choose() )

View(data)
summary(data)
str(data)
table(is.na(data))


data = data[-1] # removing unwanted column

cor(data)
cor(data,data[7])

boxplot(data) # dataset contain outliers

# removing outliers
data = as.data.frame(lapply(data, dataCleaning))

boxplot(data)



View(data)
# Training the model
model = lm(data$Y.house.price.of.unit.area ~ ., data = data)
summary(model)
# accuracy -> Multiple R-squared:  0.652,	Adjusted R-squared:  0.6468 


# Model Improvement

# Re scaling

data[1:6] = as.data.frame(scale(data[-7]))

# Adding interaction

model1 = lm(data$Y.house.price.of.unit.area ~ X1.transaction.date + data$X2.house.age + data$X3.distance.to.the.nearest.MRT.station + data$X4.number.of.convenience.stores + data$X5.latitude * data$X6.longitude, data = data)
summary(model1)
# no significant improvement

model2 = lm(data$Y.house.price.of.unit.area ~ X1.transaction.date * data$X2.house.age * data$X3.distance.to.the.nearest.MRT.station * data$X4.number.of.convenience.stores * data$X5.latitude * data$X6.longitude, data = data)
summary(model2)
# Accuracy increased by few percentage
# Accuracy Multiple R-squared:  0.7906,	Adjusted R-squared:  0.7529 







