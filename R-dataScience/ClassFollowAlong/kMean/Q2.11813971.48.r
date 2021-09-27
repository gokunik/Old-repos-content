# Question 1
# Dataset - 3D Road Network (North Jutland, Denmark)
# https://archive.ics.uci.edu/ml/datasets/3D+Road+Network+%28North+Jutland%2C+Denmark%29

# My understanding of the data
# Dataset contain information about 3d map , basically elevation information added to 2d map which
# resulted in this data. According to the dataset description this data can be very usefull in 
# performing more accurate routing for eco-routing, cyclist routes etc

# 1. OSM_ID    : OpenStreetMap ID for each road segment or edge in the graph.
# 2. LONGITUDE : Web Mercaptor(Google format) longitude
# 3. LATITUDE  : Web Mercaptor(Google format) latitude
# 4. ALTITUDE  : Height in meters.

library(stats)
library(factoextra)

roadN = read.table(file = file.choose(), sep = ",", header = TRUE)
data = roadN
# roadN = data

# Dataset is so big that i was not able to perfom the task so im am trimming the dataset
random = sample(434873, 10000)  
roadN = roadN[random,]

View(roadN)
str(roadN)
table(is.na(roadN)) # No missing values found

# OSM_ID columns can be removed as it is just storing the id's of the road 
# our main data to perform analysis is rest 3 columns
# Maybe in any other machine learning analysis this columns can be used but
# i think in case of clustering it will not providing any helpfull info
roadN = roadN[-1]
colnames(roadN) = c("LONGITUDE", "LATITUDE", "ALTITUDE")
View(roadN)



boxplot(roadN)
boxplot(roadN$LONGITUDE) # No outliers
boxplot(roadN$LATITUDE) # No outliers
boxplot(roadN$ALTITUDE) # Large Number of outliers found

# Removing the outliers
clean = function(data) {
  rule1 = quantile(data, 0.25) - 1.5 * IQR(data)
  rule2 = quantile(data, 0.75) + 1.5 * IQR(data)
  data[data > rule2] = rule2
  data[data < rule1] = rule1
  return(data)
}

roadN = as.data.frame(lapply(roadN, clean))
boxplot(roadN$ALTITUDE)

# Rescaling the dataset
data_rescaled = as.data.frame(scale(roadN))

# Visualizing the value of k using elbow method
# Im not using the whole dataset but data is randomize so assuming the with the trimmed data also
# result will not change much

fviz_nbclust(roadN, kmeans, method = "wss") 
# After point 3 no further drop is seen which suggest 3 will be a good suited value for cluster making

# creating cluster

set.seed(10)

# My own understanding also suggested cluster size 3 will be a good as
# dataset only have 3 columns and all 3 are distinguish from each other
# and the elbow method also suggest to have 3 

Kmean_model = kmeans(data_rescaled,centers = 3, iter.max = 30, nstart = 1) 
# Providing additional parameters to make cluster perform better

summary(Kmean_model)

Kmean_model
Kmean_model$centers
Kmean_model$cluster
Kmean_model$size

fviz_cluster(Kmean_model, data = data_rescaled,
             palette = c("#e74c3c", "#9b59b6", "#34495e"),
             geom = "point",
             ellipse.type = "convex",
             ggtheme = theme_bw()
)

# graph seems not too much promising. boundaries are collapsing with each other so not the optimial cluster configration

plot(rescaled_data$LONGITUDE, rescaled_data$LATITUDE, xlab = "LONGITUDE", ylab = "LATITUDE", col = Kmean_model$cluster)


# Trying to improve the model
# I gonna try making cluster with even smaller dataset, basically a subset of the main dataset
# and then ill compair their perfomance

subset = data[sample(434873, 1000),]
subset = subset[-1]
# Evertime we run this command new 1000 datacells will be allocated and evertime i produces different result
colnames(subset) = c("LONGITUDE", "LATITUDE", "ALTITUDE")
View(subset)
subset = as.data.frame(scale(subset))

subset_model = kmeans(subset, centers = 3)

fviz_cluster(subset_model, data = subset,
             palette = c("#e74c3c", "#9b59b6", "#34495e"),
             geom = "point",
             ellipse.type = "convex",
             ggtheme = theme_bw()
)
# This has shown little better result then previous. Thing to remember here is that every time the subset is created
# new 1000 values where added so result differ evertime


# Trying a bigger dataset

subset2 = data[sample(434873, 20000),] 
# Don't now the exact reason but chosing above 20000 makes my computer halt for some time
# Maybe because of large datase it is happening so i am chosing till 20000 only
subset2 = subset2[-1]
# Evertime we run this command new 1000 datacells will be allocated and evertime i produces different result

colnames(subset2) = c("LONGITUDE", "LATITUDE", "ALTITUDE")
subset2 = as.data.frame(scale(subset2))
subset_model2 = kmeans(subset2, centers = 3)
fviz_cluster(subset_model2, data = subset2,
             palette = c("#e74c3c", "#9b59b6", "#34495e"),
             geom = "point",
             ellipse.type = "convex",
             ggtheme = theme_bw()
)

# trying cluster size as 2

model2 = kmeans(data_rescaled, centers = 2)
model2
model2$centers
model2$cluster
model2$size

fviz_cluster(model2, data = data_rescaled,
             palette = c("#e74c3c", "#9b59b6", "#34495e"),
             geom = "point",
             ellipse.type = "convex",
             ggtheme = theme_bw()
)


# Cluster size 2 surely have better visualization but overall perform poor



# After doing all the above analysis i reached to point that to analysis this dataset properly with all the datacell present
# in the dataset we need more computational power

# The cluster which i have created is never the best and the optimal clusters as the whole data is not taken into consideration
# so the result is always incompelte and not 100 % accurate but we can still hava a idea about the dataset by working on the subset 
# of the dataset

# Everytime we select new random data from the main dataset the new result is produced, so we can see the variation in the dataset
