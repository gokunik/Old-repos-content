#classification of spam emails

# 1. read the Dataset 

sms = read.table( file= file.choose(),sep=',',header = TRUE)

# viewing the data and checking the structure of the data
View(sms)
str(sms)

# defining categorical data
sms$type = factor(sms$type)
str(sms)
str(sms$type)

# data preparation

install.packages('tm')
library('tm')

# create a corpus
# collection of text document is know as corpus
# in this case collection of all the sms is corpus
# VCorpus - stored in the memory
# pcorpus - stored on the disk

sms_corpus = VCorpus(VectorSource(sms$text)) # this will convert every sms as separate document
# vectoreSource is a reader function

print(sms_corpus)
View(sms_corpus)
# to inspect particular corpus
inspect(sms_corpus[1:2])

# to read the actual message 
as.character(sms_corpus[1])

###############################################
# tm_map()
# content_transformer(.............)
# tolower()
# removenumber
# stopwords() - remove words like and, if , or etc etc
# remove punctuation
# stemming - convert the word to its root form
# stemdocument
# stripwhitespaces


#######################################
install.packages('SnowballC') # for stemming functionality
library('SnowballC')

# clean the corpus and convert the document into words
sms_dtm = DocumentTermMatrix(sms_corpus, control = list(
                                                        tolower = TRUE,
                                                        removeNumbers = TRUE, 
                                                        stopwords = TRUE, 
                                                        removePunctuation = TRUE, 
                                                        stemming = TRUE
                                                        ))

View(sms_dtm)
##############################################################
# creating the training dataset testing dataset

sms_train = sms_dtm[1:4174,]
sms_test = sms_dtm[4175:5574,]

# labels ( spam and ham )
sms_tain_label = sms[1:4174,]$type
sms_test_label = sms[4175:5574,]$type



# training the model 
install.packages('e1071')
library('e1071')

sms_model = naiveBayes(sms_train,sms_tain_label)
# sms_model contains the classifier object


sms_predict=predict(sms_model,sms_test)

table(sms_test_lable,sms_predict)








