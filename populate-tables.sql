load data local infile '/var/www/Synthony/student.csv' 
into table student
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/instructor.csv'
into table instructor
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/class.csv'
into table class
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/teaches.csv'
into table teaches
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/takes.csv'
into table takes
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/question.csv'
into table question
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/class_question.csv'
into table class_question
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/evaluation.csv'
into table evaluation
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/answer.csv'
into table answer
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;

load data local infile '/var/www/Synthony/eval_answer.csv'
into table eval_answer
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r'
ignore 1 rows;
