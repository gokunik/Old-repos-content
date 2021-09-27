#student data set

library("ggplot2")

student = read.csv(file.choose(),sep = ",",header = TRUE, stringsAsFactors = TRUE)


View(student)
summary(student)
str(student)

table(is.na(student)) # no
table(ifelse(student=="","Contain Empty values","No emtpy values")) # no

boxplot(student)
# columns to be predicted ( the subject scores columns ) contain outliers but i think
# we dont need to remove them as they are helpful in our analysis. if we need to check
# average marks or something similar then this could cause issues as we have changes the 
# actuall values which are supposed to be outliers with mean or median so it may give us


hist(student$math.score)
hist(student$reading.score)
hist(student$writing.score)

# different results

#visualizing co relation

genderAndReading = ggplot(data = student, aes(x = reading.score, y =gender))
genderAndReading + geom_point()


data = student[,1:5]
maths = student[,1:6]
reading = student[,-c(6,8)]
writing = student[,-c(6,7)]

set.seed(22)

MathsModel = lm(maths$math.score ~ ., data = maths)
ReadingModel = lm(reading$reading.score ~ ., data = reading)
WrititngModel = lm(writing$writing.score ~ ., data = writing)

summary(MathsModel)
summary(ReadingModel)
summary(WrititngModel)

performance = as.data.frame(((student$math.score + student$reading.score + student$writing.score) / 300) * 100)
View(performance)  

passFail = ifelse(performance < 40, "Fail", "pass")
table(passFail)
# Fail pass 
# 30  970 


