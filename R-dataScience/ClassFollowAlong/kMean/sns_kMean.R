sns = read.csv(file.choose(), sep = ",", header = TRUE)
data = sns

View(sns)
summary(sns)
str(sns)
table(is.na(sns)) # to find all na values
table(sns$gender, useNA = "ifany") # to find na value in particular columns
table(is.na(sns$gender)) # another way to find na values

summary(sns$age)
# summary shoes minimun age is 3 which is not a valid case in this a it is data for 
# High school students. this can cause unstability in data 
# to fix this we will be making assumption of the minimum age

sns$age = ifelse(sns$age >= 13 & sns$age < 20,sns$age,NA)
summary(sns$age)

# Now we can change all the na values with mean or median
# But their is a problem if we change all the values with mean or median of the whole column.
# the dataset contain data of students with different graduating years so changing all the na values
# with the mean or median of the whole column will make the data unstable as for every graduating year
# age cannot be same so we need to change it respective to the graduating year
# To solve this we use the ave function to find the average of all the respective graduating years

average_ave = ave(sns$age,sns$gradyear,FUN = function(x) mean(x,na.rm=TRUE))
# It will calculate the average respective to the graduating year
table(average_ave) 

# Now we can change the na values with the average value of respective graduating year
sns$age=ifelse(is.na(sns$age),average_ave,sns$age)
summary(sns$age)

# Gender column Too have na values and to remove that we can follow few approaches like predicting the value
# of the na column according to the corresponding values in that row. In this case we can go for dummy coding method 
# We will dummy code the na columns so the values in the gender column will be changed to numeric values including na values
# One down side of this is that we still don't know what should come in place of those na value we just dummy coded them
# ex

#   Gender  Female   Nogender/Na's 
#     F       1         0               
#     M       0         0            0 and 0 in both columns means its male
#     F       1         0            This way we don't need to replace Na with any value
#     F       1         0            This is not good idea in case gender is a imp column and each value in it 
#     NA      0         1            can effect the overall analysis 
#     M       0         0
#     F       1         0
#     Na      0         1

sns$female=ifelse(sns$gender=="F" & !is.na(sns$gender),1,0) # dummy coding the female values
sns$na_gender=ifelse(is.na(sns$gender),1,0) # dummy coding the na values

# checking na values
table(sns$female,useNA = "ifany") 
table(sns$na_gender,useNA = "ifany")

#create the clusters
library(stats)
interests=sns[5:40]
View(interests)

interests_rs=as.data.frame(lapply(interests, scale))
View(interests_rs)

set.seed(2345)
teens_cluster=kmeans(interests_rs,5)


#Evaluate the clusters
teens_cluster$size
teens_cluster$cluster
teens_cluster$centers

sns$cluster=teens_cluster$cluster
aggregate(data=sns,age~cluster,mean)
aggregate(data=sns,female~cluster,mean)

