create database courseeval;
use courseeval;

create table instructor (
instructorid varchar(20) not null,
fname varchar(50),
lname varchar(50),
constraint instructorPK primary key(instructorid)
);

create table class (
class_num int not null,
course_name varchar(250),
section_num int,
semester varchar(20),
year varchar(20),
constraint classPK primary key(class_num)
);

create table teaches (
instructorid varchar(20) not null,
class_num int not null,
constraint teachesFK1 foreign key(instructorid) references instructor(instructorid),
constraint teachesFK2 foreign key(class_num) references class(class_num)
);


create table student (
studentid varchar(50) not null,
constraint studentPK primary key(studentid)
);

create table takes (
studentid varchar(50) not null,
class_num int not null,
constraint takesFK1 foreign key(studentid) references student(studentid),
constraint takesFK2 foreign key(class_num) references class(class_num)
);

create table evaluation(
evalid int not null,
studentid varchar(50) not null,
class_num int not null,
constraint evalPK primary key (evalid),
constraint evalFK1 foreign key(studentid) references student(studentid),
constraint evalFK2 foreign key(class_num) references class(class_num),
unique(evalid)
);

create table question(
questionid int not null,
type varchar(20),
text varchar(255),
options varchar (500),
constraint questionFK primary key(questionid)
);

create table class_question(
class_num int not null,
questionid int not null,
constraint class_questionFK1 foreign key(class_num) references class(class_num),
constraint class_questionFK2 foreign key(questionid) references question(questionid)
);

create table answer (
answerid int not null,
response varchar(500),
questionid int not null,
constraint answerPK primary key(answerid),
constraint answerFK foreign key(questionid) references question(questionid)
);

create table eval_answer (
evalid int not null,
answerid int not null,
constraint eval_answerFK1 foreign key(evalid) references evaluation(evalid),
constraint eval_answerFK2 foreign key(answerid) references answer(answerid)
);