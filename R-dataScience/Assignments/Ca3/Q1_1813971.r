# Name - Nitesh Khatri
# Dataset - Energy efficiency Data Set
# Link - https://archive.ics.uci.edu/ml/datasets/energy+efficiency

# About the dataset 
# Data set contain the information about energy analysis done on 12 different building shapes and produce two outputs
# The dataset contains eight attributes (or features, denoted by X1...X8) and two responses (or outcomes, denoted by y1 
# cand y2). The aim is to use the eight features to predict each of the two responses.

# Library
library("readxl")


engery = read_excel(file.choose())
data = engery
# Analysing the dataset
View(engery)
summary(engery)
str(engery)
table(is.na(engery)) # No Na values found

hist(engery$Y1)
hist(engery$Y2)

# checking cor relation between data columns
cor(engery[9], engery[-c(9, 10)])
cor(engery[10], engery[-c(9, 10)])
cor(engery[-10])
cor(engery[-9])

# Their is very strong co relation between X2 and X4 they are similar in pattern. Ex. ->
#   X3   x4  
#   A    1    
#   A    1
#   B    2     --------> such case may cause singularity which can lead to ignorance 
#   B    2     --------> Of the column which is strongly co related.
#   C    3
#   A    1
#   B    2

# Checking if dataset contain any outliers
boxplot(engery)
boxplot(engery$X1)
boxplot(engery$X2)
boxplot(engery$X3)
boxplot(engery$X4)
boxplot(engery$X5)
boxplot(engery$X6)
boxplot(engery$X7)
boxplot(engery$X8)

# Dataset does not seem to have any outliers and data also seems normalized
# First I'll try without nomalization and after that, with normilzation to see if it acutally make any difference 


# Instead of diving the test and train dataset im using the completet dataset as train dataset
# As the datset have to outocomes column, I am spliting them into two different dataset to predict the outcomes columns separatly

energy_Y1 = engery[-10]
energy_Y2 = engery[-9]
View(energy_Y1)
View(energy_Y2)

# Train the model
# I am using multiple linear regression as dataset have two outcome columns Y1 and Y2 and these two columns are dependent on the 8 atributes 
# present in the dataset. Same thing is also mentioned in the dataset description that Y1 and Y2 outcomes are predicted using the 8 features and 
# 768 samples. We can also check the linear regression also if it is required, to check the effect of each feature separatly on the outcome

trained_model_Y1 = lm(energy_Y1$Y1 ~ ., data = energy_Y1)
summary(trained_model_Y1)
# Multiple R-squared:  0.9162,    Adjusted R-squared:  0.9154

trained_model_Y2 = lm(energy_Y2$Y2 ~ ., data = energy_Y2)
summary(trained_model_Y2)
# Multiple R-squared:  0.8878,    Adjusted R-squared:  0.8868 

# In Both the dataset column X4 is not ignored by the algo becuase of the singularity
#Coefficients:(1 not defined because of singularities)
#              Estimate Std. Error t value Pr( > | t | )
#(Intercept)   84.013418  19.033613   4.414 1.16e-05 ** *
#  X1         -64.773432  10.289448  -6.295 5.19e-10 ** *
#  X2         -0.087289   0.017075   -5.112 4.04e-07 ** *
#  X3          0.060813   0.006648    9.148 < 2e-16 ** *
#  X4          NA         NA          NA    NA
#  X5          4.169954   0.337990   12.338 < 2e-16 ** *
#  X6          -0.023330  0.094705   -0.246 0.80548
#  X7          19.932736  0.813986   24.488 < 2e-16 ** *
#  X8          0.203777   0.069918   2.915 0.00367 **

# simple solution to this is to remove the column but before removing i tried to fix this by changing it with
# non-linear ( Polynomial Regression ), converting it to binary indicator, Interaction and dummy coding the 
# columns and non of the method seem to work so at last i am removing the column so that it will not cause 
# problem in further analysis

energy_Y1 = energy_Y1[-4]
energy_Y2 = energy_Y2[-4]

# Both the dataset have every good acuracy in the first go without model improvement but im gonna try to 
# improve it a bit further if possible


# 1. Using normalization

rescaled_Y1 = energy_Y1
rescaled_Y2 = energy_Y2

rescaled_Y1[1:7] = as.data.frame(scale(energy_Y1[-8]))
summary(rescaled_Y1)

rescaled_Y2[1:7] = as.data.frame(scale(energy_Y2[-8]))
summary(rescaled_Y2)

rescaled_model_Y1 = lm(rescaled_Y1$Y1 ~ ., data = rescaled_Y1)
summary(rescaled_model_Y1)

rescaled_model_Y2 = lm(rescaled_Y2$Y2 ~ ., data = rescaled_Y2)
summary(rescaled_model_Y2)

# Normalization does not seem to have any effect, the result is same as without normalization

# 2. Using interaction

# X1 Relative Compactness
# X2 Surface Area
# X3 Wall Area
# X4 Roof Area
# X5 Overall Height
# X6 Orientation
# X7 Glazing Area
# X8 Glazing Area Distribution
# y1 Heating Load
# y2 Cooling Load

# combining realted columns X2 and X3 , X7 and X8 (this is based on my analysis)

interaction_Y1 = lm(energy_Y1$Y1 ~ X1 + (X2 * X3) + X5 + X6 + (X7 * X8), data = energy_Y1)
summary(interaction_Y1)
# Multiple R - squared:0.9202, Adjusted R - squared:0.9193

interaction_Y2 = lm(energy_Y2$Y2 ~ X1 + (X2 * X3) + X5 + X6 + (X7 * X8), data = energy_Y2)
summary(interaction_Y2)
# Multiple R-squared:  0.9013,    Adjusted R-squared:  0.9002 

# The model has shown very slight improvment

# Further i am not able to analyis what else we can do to improve the performance. I tried different interaction
# combination between features which are relatable. slight improvement is seen but not much.







