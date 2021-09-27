library(class)
library(fastDummies)

telecom = read.csv(file = file.choose(), sep = ",", stringsAsFactors = TRUE)
data = telecom

View(telecom)
summary(telecom)
str(telecom)

boxplot(telecom$MonthlyCharges)
boxplot(telecom$TotalCharges)

table(is.na(telecom)) # na values present
table(is.na(telecom$TotalCharges))

hist(telecom$TotalCharges)
telecom$TotalCharges[which(is.na(telecom$TotalCharges))] = mean(telecom$TotalCharges, na.rm = TRUE)

telecom = telecom[-c(1, 2)] # removing unwanted column

names = colnames(telecom[-c(2, 5, 18, 19, 20)])
names
dummy = dummy_cols(telecom, select_columns = names)
View(dummy)

dummy = dummy[-c(1:20)]
str(dummy)

# creating testing and training dataset

train = dummy[1:5000,]
test = dummy[5000:5956,]
str(test)
str(train)

train_label = telecom[1:5000, 20]
test_label = telecom[5000:5956, 20]

pred = knn(train = train, test = test, train_label, k = 77)

View(pred)

table(pred, test_label)

efficiency = function(x) {

  return(100 * (sum(diag(x)) / sum(x)))
}

efficiency(table(pred, test_label))