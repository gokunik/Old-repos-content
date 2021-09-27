# Question 1
# Dataset - Combined Cycle Power Plant
# https://archive.ics.uci.edu/ml/datasets/Combined+Cycle+Power+Plant

# My understanding of the data
# Data set contain data collected from a power plant which measures net hourly electrical energy output in Mega watt
# from multiple ambient variables taken into consideration when the plant was set to work with full load.
# Dataset is having 5 fields in total out of which 4 are independent and one is dependent which
# is Net hourly electrical energy output column. 

# Objective
# Using regression, Multiple regression in this case we can create a model which can be used by companies
# to have an idea of the energy output a of cycle power plant

#  Features consist of hourly average ambient variables
#   - Temperature(T) in the range 1.81 °C and 37.11 °C,
#   - Ambient Pressure(AP) in the range 992.89 - 1033.30 milibar,
#   - Relative Humidity(RH) in the range 25.56 % to 100.16 %
#   - Exhaust Vacuum(V) in teh range 25.36 - 81.56 cm Hg
#   - Net hourly electrical energy output(EP) 420.26 - 495.76 MW

library("readxl")
library("ggplot2")

data = read_excel(file.choose())
temp = data

# Understanding the dataset 
View(data)
summary(data)
str(data) # All numeric Comlumns

table(is.na(data))
# No Missing values found

cor(data[5], data[-5])
# ( AT ) temperature is having strong inverse relation with the engergy output
cor(data)


plot(data)
boxplot(data)
# Two columns in particular( AP and RH ) have a large number of outliers which need to be removed

# Function to remove values which are out of the range ( outliers )
clean = function(data) {
  rule1 = quantile(data, 0.25) - 1.5 * IQR(data)
  rule2 = quantile(data, 0.75) + 1.5 * IQR(data)

  data[data > rule2] = rule2
  data[data < rule1] = rule1
  return(data)
}

data[1:4] = as.data.frame(lapply(data[, -5], clean))
boxplot(data) # Outliers removed
View(data)

set.seed(10)

data_model = lm(PE ~ ., data = data)
summary(data_model)
# Model Result
# Residual standard error:4.558 on 9563 degrees of freedom
# Multiple R - squared:0.9287, Adjusted R - squared:0.9287
# F - statistic:3.114e+04 on 4 and 9563 DF, p - value: < 2.2e-16

# With re scaled data
data_rescaled = as.data.frame(scale(data))
View(data_rescaled)

rescale_model = lm(PE ~ ., data = data_rescaled)
summary(rescale_model)
# Model Result
# Residual standard error:0.2671 on 9563 degrees of freedom
# Multiple R - squared:0.9287, Adjusted R - squared:0.9287
# F - statistic:3.114e+04 on 4 and 9563 DF, p - value: < 2.2e-16

# Output of both the data with and without scaling the result is exactly same
# But the difference is still their in the Residual standard error values.
# re scaled data have same R- squared vaue but having less Residual standard error
# It tell us that in the Re scaled data, distance of the predicted line is 
# more close to the actual line as compared to the data without re scaling


# improving the model
# TO improve the model i will try finding some better evidence to apply improvement methods
# like Adding non-liner regression, adding binary indicator or adding interaction

# using ggplot2
ATvPE = ggplot(data = data, aes(x = AT, y = PE))
ATvsPE + geom_point(colour = 'lightblue') + geom_smooth(colour = "red")
# seems like with increase in Temperature the energy power output decreases.
# same can be proved by cor() which shows a strong inverse relation between them
# Not much spread in scatter points

VvsPE = ggplot(data = data, aes(x = V, y = PE))
VvsPE + geom_point(colour = 'lightblue') + geom_smooth(colour = "red")
# Similar to ATvsPE but slightly weaker realtion and in this case also increase in
# Vacuum the energy power output decreases
# slight vertical spread in scatter points also

APvsPE = ggplot(data = data, aes(x = AP, y = PE))
APvsPE + geom_point(colour = 'lightblue') + geom_smooth(colour = "red")
# shows increase in Ap leads to increase in Engergy output also
# largely spreaded in scatter points is found

RHvsPE = ggplot(data = data, aes(x = RH, y = PE))
RPvsPE + geom_point(colour = 'lightblue') + geom_smooth(colour = "red")
# shows similar resutls as the APvsPE but this time the scatter points are
# more spread across the graph

# From the above analysis i think we can try using non linear method
# Also increase in AT and V result in the decrease in output and increase in AP and RH
# result in increase in energy output which suggest me that i can try adding interaction
# with AT and V and AP and RH


# Trying non-linear relation 
NL = data_rescaled

NL$AP2 = NL$AP ^ 2
NL$RH2 = NL$RH ^ 2
NL$AT2 = NL$AT ^ 2
NL$V2 = NL$V ^ 2

NL_model = lm(PE ~ AT + V + AP2 + RH2 + AP + RH, data = NL) 
# Multiple R - squared:0.929, Adjusted R - squared:0.929

NL_model = lm(PE ~ AT + AT2 + V + V2 + AP + RH, data = NL)
# Multiple R - squared:0.9358, Adjusted R - squared:0.9357

NL_model = lm(PE ~ ., data = NL)
# Multiple R - squared:0.9369, Adjusted R - squared:0.9368

summary(NL_model)
# Above result shows very slight change in result but still the result where improved

# Using interaction

int_data = data_rescaled

int_model = lm(PE ~ AT + V  + AP * RH, data = int_data)
# Multiple R - squared:0.9289, Adjusted R - squared:0.9288

int_model = lm(PE ~ AT * V + AP + RH, data = int_data)
# Multiple R - squared:0.9348, Adjusted R - squared:0.9348

int_model = lm(PE ~ (AT * V) + (AP * RH), data = int_data)
# Multiple R - squared:0.9349, Adjusted R - squared:0.9348

summary(int_model)

# Interaction has also shown very slight change in the result but no great improvement is seen


