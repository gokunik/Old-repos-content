# Name - Nitesh Khatri
# Dataset - seeds Data Set
# Link - https://archive.ics.uci.edu/ml/datasets/seeds

# The examined group comprised kernels belonging to three different varieties of wheat: Kama, Rosa and Canadian, 
# 70 elements each, randomly selected for the experiment.

# Attribute Information:

#  To construct the data, seven geometric parameters of wheat kernels were measured:
#  1. area A,
#  2. perimeter P,
#  3. compactness C = 4 * pi * A / P ^ 2,
#  4. length of kernel,
#  5. width of kernel,
#  6. asymmetry coefficient
#  7. length of kernel groove.
#  All of these parameters were real - valued continuous.


library(stats)
library(factoextra)

# Funtion to remove outliers
outliers = function(data) {
  rule1 = quantile(data, 0.25) - 1.5 * IQR(data) 
  rule2 = quantile(data, 0.75) + 1.5 * IQR(data)

  data[data > rule2] = rule2
  data[data < rule1] = rule1
  return(data)
}


seeds = read.delim(file = file.choose(), sep = "\t", header = TRUE)

# Adding Headers
names(seeds) = c('area', 'perimeter', 'compactness', 'length', 'width', 'coefficient', 'groove', 'type')
data = seeds
seeds = data
# Analysing data

View(seeds)
summary(seeds)
str(seeds)

table(is.na(seeds)) # No NA values found

pairs.panels(seeds)

boxplot(seeds)
boxplot(seeds$compactness) 
boxplot(seeds$coefficient)
summary(seeds$compactness)
summary(seeds$coefficient)

# column 3 and 6 is having 2 outliers each.
# although their are not much outliers but as we need to make the cluster 
# even one outliers may effect the whole cluster so i am removing the outliers

seeds[1:7] = as.data.frame(lapply(seeds[1:7], outliers))
boxplot(seeds)

# Re scaling dataset
# I tried without re scaling also but with rescaling results are better
seeds_rs = scale(seeds[,-8])
View(seeds_rs)

# Creating the clustering
set.seed(50)

# Finding the right  value of clusters
fviz_nbclust(seeds, kmeans, method = "wss")
# The graph drop shows that 3 will be a good value for creating clusters
# From my own analysis also i think creating 3 clusters is suitable for the 
# the present dataset

seeds_cluster = kmeans(seeds_rs, 3)

# Analysing clusters
seeds_cluster
seeds_cluster$centers
seeds_cluster$cluster
seeds_cluster$size

# Visualization the clusters
fviz_cluster(seeds_cluster, data = seeds_rs,
             geom = "point",
             ellipse.type = "convex",
             ggtheme = theme_bw()
)
# clusters are not crossing boundaries with each other
# Result seems fine to me

seeds$type # actuall type
seeds_cluster$cluster # cluster vector

# comparing both
table(seeds$type,seeds_cluster$cluster)
#     1  2  3
# 1  63  2  5
# 2  5  65  0
# 3  4  0   66

# On the first go it does not give me this result i tried running the kmeans function 2-3 times
# One Time the result is same and if i run it again the result changes and if i run it and the 
# result comes same again


# Wrongly predicted values
# 1 = 7, 2 = 5 , 6 = 4, total = 16
# total observations 210

# percentage of miss-class from the data
(16 / 210) * 100
#7.6 % observations fall into the different class than it should be

