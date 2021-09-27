churn = read.csv(file.choose(), sep = ",", header = TRUE,na.strings = c("",NA))

View(churn)
summary(churn)
str(churn)
table(is.na(churn)) # checking na values
# no na vlaues found

churn$CreditScore[which(is.na(churn$CreditScore))]=mean(churn$CreditScore,na.rm = T)
churn$Age[which(is.na(churn$Age))]=median(churn$Age,na.rm = T)
churn$Tenure[which(is.na(churn$Tenure))]=median(churn$Tenure,na.rm = T)
churn$Balance[which(is.na(churn$Balance))]=median(churn$Balance,na.rm = T)
churn$NumOfProducts[which(is.na(churn$NumOfProducts))]=median(churn$NumOfProducts,na.rm = T)
churn$HasCrCard[which(is.na(churn$HasCrCard))]=median(churn$HasCrCard,na.rm = T)
churn$IsActiveMember[which(is.na(churn$IsActiveMember))]=median(churn$IsActiveMember,na.rm = T)
churn$EstimatedSalary[which(is.na(churn$EstimatedSalary))]=median(churn$EstimatedSalary,na.rm = T)

churn = churn[,-c(1:3)] # removing the unwanted columns

# converting categorical data to factors
churn$Exited = as.factor(churn$Exited)

# if the value is missing and it is blank then we can first change it to NA and then 
# we can handle it using different ways of missing data handling

# we can use either
# read.csv(file.choose(), sep = ",", header = TRUE, na.strings = c("",NA))
# or 
# churn = as.data.frame(lapply(churn,function(x){x[x==""] = NA}))


# dummy coding
library(fastDummies)

churnDummy = dummy_cols(churn,select_columns = c("Geography", "Gender"))
View(churnDummy)

# removing the extra columns after dummy coding
churnDummy = churnDummy[-c(2,3)]
View(churnDummy)
summary(churnDummy)
str(churnDummy)

# normalization

churnScaled = as.data.frame(scale(churnDummy))
View(churnScaled)

# training and testing data

train = churnScaled[1:9000,]
test = churnScaled[9001:1000,]

train

# Training the model

library(neuralnet)

model = neuralnet(Exited~., data = train, hidden = 6)
 


















