wine = read.table(file=file.choose(), sep = ",", header = TRUE)
data = wine
View(wine)
summary(wine)
str(wine)

wine_c = wine[,c(-1)]
View(wine_c)

wine_rs = as.data.frame(lapply(wine_c,scale))
View(wine_rs)

set.seed(6273)
wine_cluster = kmeans(wine_rs, 3)

#Evaluate Clusters
wine_cluster$size
wine_cluster$cluster
wine_cluster$centers

install.packages("factoextra")
library(factoextra)

fviz_nbclust(wine,kmeans,method="wss")
