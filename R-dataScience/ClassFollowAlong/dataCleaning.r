# data cleaning 

# 1. Using normalization 
# 2. Using Z scale re scalling
# 3. outliers
# -> -40 ,3,1,5,6,50,8 => -40 and 50 are know as outliers which are 
# totally out of the range from the rest of the data

###################################################
# cleaning data using outliers

data = c(sample(x=1:20,size = 40,replace = TRUE),-65,-30,80,90)
data
length(data)
boxplot(data)
summary(data)

# IQR Inter quantile range - differnce between 1 and 3 quantile

rule1 = 5.00 - 1.5*IQR(data)
# 5.00 is the value from the 1 quantile

rule2 = 16.25 + 1.5*IQR(data)
# 16.25 is the value from the 3 quantile

# trimming

data1 = data
data1[data1>rule2] # values which are greater then
data1[data1<rule1]

data1 = data1[data1<rule2]
data1 = data1[data1>rule1]

boxplot(data1)
length(data1)

# winsorizing

data2 = data

data2[data2>rule2] = rule2
data2
data2[data2<rule1] = rule1
data2

boxplot(data2)

# data cleaning - Missing data
# air quality dataset

# using imputation method

View(airquality)

# check which columns have na values
summary(airquality)


hist(airquality$Ozone) # we will use median imputation
hist(airquality$Solar.R) # we will use mean imputation

summary(airquality$Ozone)
summary(airquality$Solar.R)

d = airquality

d$Ozone[which(is.na(d$Ozone))] = median(d$Ozone,na.rm = TRUE)
# which(is.na(d$Ozone)) tell the location where na values are present
# median(d$Ozone,na.rm = TRUE) change na values into median value of the column

d$Ozone[which(is.na(d$Ozone))] = mean(d$Ozone,na.rm = TRUE)


