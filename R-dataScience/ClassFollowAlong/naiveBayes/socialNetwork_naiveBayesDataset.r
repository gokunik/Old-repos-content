
social=read.table(file=file.choose(),sep=",",header = TRUE)
View(social)

# removing the id column as it is not required in any analysis
social = social[,-1]
View(social)

# convert the label column into factor
social$Purchased=factor(social$Purchased)
str(social)

#function for dummy coding 
# it will change the text field male and female to 1 and 2 respectively 

dgender = function(x)
{
  if(x == 'female')
  {
    return(1)
  }
  else
  {
    return(2)
  }
}

social$Gender = as.data.frame(sapply(social$Gender,dgender))
View(social)

social_scale=scale(social[-4])
View(social_scale)

#Creating training and testing dataset
social_train=social_scale[1:350,]
social_test=social_scale[351:400,]

social_train_label=social[1:350,4]
social_test_label=social[351:400,4]

#Train the model
social_model=naiveBayes(social_train,social_train_label)

#Evaluate the model performance
social_pred=predict(social_model,social_test)
table(social_pred,social_test_label)


