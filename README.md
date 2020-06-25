To find prominent topic in a collection of documents. We here propose a system to
detect topic from a collection of document. We use an efficient method to discover
topic in a collection of documents known as topic model. A topic model is a type
of statistical model for discoveringtopics from collection of documents. One would
expect particular words to appear in thedocument more or less frequently: “dog”
and “bone” will appear more often in documentsabout dogs, “cat” and “meow”
will appear in documents about cats, and “the” and “is” willappear equally in both.
A document typically concerns multiple topics in differentproportions; thus, in a
document that is 10% about cats and 90% about dogs, there wouldprobably be
about 9 times more dog words than cat words. Our proposed system capturesthis
intuition in a mathematical framework and will examine topic of particular set
ofdocuments. Here the system will extract keywords and will use clustering
algorithm in orderto discover topic from particular set of documents. System will
extract keywords which occuroften and will cluster this keywords using clustering
algorithm and will detect topic from acollection of documents. This system takes
co occurrence of terms into account which givesbest result. This system can be
useful for web crawlers and for web users. This system willhelp the web users to
easily search information for particular topic. When the user will searchfor
particular topic, system will extract various keywords from the set of documents
whichwill match topic name mentioned by the web user and will cluster the
keywords and willprovide topic related information to the user. Web users will get
information quickly forrespective topic they are searching for.
Advantages
1. This system takes co occurrence of terms into account which gives best
result.
2. This system will help the web users to easily search information for
particular topic.
3. Web users will get information quickly for respective topic they are
searching for.

1. Feasibility Study
This system will extract keywords which occur often from collection of documents
and will cluster the words using clustering algorithm and system will detect topic
from a collection of documents.

2 Economic Feasibility
This system will help the web users to easily search information for
particular topic. This system will be useful for web crawlers. This
system will provide economic benefits for many websites. It includes
quantification and identification of all the benefits expected.

3 Operational Feasibility
This system is more reliable, maintainable, affordable and producible.
These are the parameters which are considered during design and
development of this project. During design and development phase of
this project there was appropriate and timely application of
engineering and management efforts to meet the previously mentioned
parameters.

4 Technical Feasibility
The back end of this project is PHP Wamp server which stores
parameters related to this project. There are basic requirement of
hardware to run this application. This application will be online so this
application can be accessed by using any device like (Personal
Computers, Laptop and with some hand held devices).





Module Description :
This project is “Topic Detection Using Keyword Clustring” .The Website is named
as “ GO DETECTCTION : SEARCH ON THE BRINK” . This project is basically
a web tool which will help the users to detect the Topic of the paragraph or the
lines which will be entered by the user .
Our Website starts with a basic introduction about what it will do and how it is
going to work. It gives the information to the users about some basic things that are
used to make the topic detection tool like data mining, Knowledge Management
and Business Intelligence.
All the pages are designed with the help of HTML , CSS and Bootstrap. The
validations are done in the website using Java Script. The data connectivity is
mainly used for Sign Up and Sign In which is done by PHP using Wamp Server.
With the help of tools such was web crawlers and Java Script ,when the user will
enter the paragraph in the text box , the tool will detect the possible topics of the
paragraph and will display all the results to he user . The user may choose any of
the topic among them.
## Installation using docker(recommended)

1. Clone the repo `$ git clone https://github.com/laur1s/PHP-Registration-Form.git`
2. Run `docker-compose up -d` This will fetch PHP and MySQL Docker images, launch apache on http://localhost:8080 and MySQL on port 3306
3. If you want to stop the service just run `docker-compose down`

## Installation

1.Clone the Repository to your www directory
   ```
   $ git clone https://github.com/laur1s/PHP-Registration-Form.git
   ```
2. Setup your MySQL database
3. Create an users table according by running the following SQL commands:
   1. `CREATE DATABASE db;`
   2. `USE db;`
   3. Run the following SQL statement:
   
   ```SQL
   
   CREATE TABLE IF NOT EXISTS 'users' (
   'id' int(11) NOT NULL AUTO_INCREMENT,
   'username' varchar(100) NOT NULL,
   'email' varchar(100) NOT NULL,
   'password' varchar(255) NOT NULL,
   PRIMARY KEY ('id')
   ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


## Use
Feel free to modify the template according your needs and push the code if you make any improvements!
