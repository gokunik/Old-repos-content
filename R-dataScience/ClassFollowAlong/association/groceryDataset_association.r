groceries = read.csv(file = file.choose(), header = FALSE)
View(groceries)

library(arules)

groceries = read.transactions(file.choose(), sep = ",")
summary(groceries)
inspect(groceries[1:5])
itemFrequency(groceries[, 1:5])
itemFrequency(groceries[,])
itemFrequencyPlot(groceries, support = 0.1)
itemFrequencyPlot(groceries, topN = 10)

image(groceries[1:5])
image(sample(groceries, 100))


apriori(groceries) #support=0.1 and confidence=0.8

#twice a day
#60 times
#60/9835=0.006
#0.25
#minlen=2

rules = apriori(groceries, parameter = list(support = 0.006, confidence = 0.25, minlen = 2))
rules

summary(rules)
#lift(y->x)=lift(x->y)=confidence(x->y)/support(y)
inspect(rules[1:5])
#Actionable,Trivial and Inexplicable

inspect(sort(rules, by = "support"))
#confidence,lift,coverage, count
inspect(sort(rules, by = "confidence"))

berryrules = subset(rules, items %in% "berries")
inspect(berryrules)

subrules = subset(rules, items %in% c("berries", "chocolate"))
inspect(subrules)

write(rules, file = "rules.csv", sep = ",", row.names = FALSE)