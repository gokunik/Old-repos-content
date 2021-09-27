# exploring data

social = read.table(file.choose(),sep = ',')
View(social)

#dropping the column first because 
#it is not providing any useful info
social=social[-1]
View(social)

str(social$V5[-1])
c

