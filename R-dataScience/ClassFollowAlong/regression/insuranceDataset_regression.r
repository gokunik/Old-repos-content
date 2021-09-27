# exploring and preparing the data
insuranceDAta = read.table(file.choose(),',',header = TRUE,stringsAsFactors = TRUE)
View(insuranceDAta)
str(insuranceDAta)
summary(insuranceDAta)
hist(insuranceDAta$charges)

#exploring the relationship and features: correlation martix

cor(insuranceDAta[c("age","bmi","children","charges")])
