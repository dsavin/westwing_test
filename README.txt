Programming task

Write a small application in Zend Framework (version 1.11). The application has one controller and two 

views. At the first visit of the application, the “index” view shows two inputs: an email address input and 

a file upload input. Use Zend_Form to validate the inputs and display a simple error message if they are 

not valid. If they are valid, the uploaded file should be parsed.

It accepts the following comma separated csv file (header is also part of the file)

Id,Firstname,Lastname

1,John,Doe

2,Adam,Ant

3,Victor,Hugo

4,Britannie,Spears

The program should parse the file and order it by first name. As a result on the screen we should see the 

“result” view with something like this:

Thank you <email address that was entered on the form>. The result of your query is:

2,Adam,Ant

4,Britannie,Spears

1,John,Doe

3,Victor,Hugo

Don’t worry too much about HTML/CSS formatting/styling. Functionality is important.