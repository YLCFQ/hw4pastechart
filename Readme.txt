Group Member:
1. Yulong Chen
2. Nanthana Thanonklin

To run the program, please put hw4 folder in the /htdocs.

cd into hw4 folder (for example: cd /Applications/XAMPP/xamppfiles/htdocs/HW4)

in the terminal, type "curl -sS https://getcomposer.org/installer | php"
(to install the composer)

then in the terminal, type "php composer.phar install"

To see the index.php, type in browser "http://localhost/hw4/index.php"

To use the unit test, type in browser "http://localhost/hw4/tests/UnitTest.php"

github link: https://github.com/YLCFQ/hw4pastechart

To test the drawing method, in the index.php

paste the following data in the textarea

a,4, 5 ,6, 7
b,9,5,3,5
c,3,1,,
d,4,3,,1

To test invalid input

,4, 5 ,6, 7
b,9,5,3,5
c,3,1,,
d,4,3,,1

a,one, 4, 5 ,6, 7
b,9,5,3,5
c,3,1,,
d,4,3,,1

a, 3, 4, 5 ,6, 7,5
b,9,5,3,5
c,3,1,,
d,4,3,,1