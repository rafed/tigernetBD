drop table feedback;
drop table expense;
drop table revenue;
drop table courseRating;
drop table courseSchedule;
drop table coursePayment;
drop table student;
drop table course;
drop table employee;
drop table users;

create TABLE users
(
	email varchar(100) not null,
	name varchar(100) not null,
	password varchar(50) not null,
	role varchar(20) not null,
	CONSTRAINT userPK PRIMARY KEY(email)
);

INSERT INTO users values('bsse0707@iit.du.ac.bd','Nafis Faisal','f31f33f8620a0581766cea54f89c98d9','Teacher');
INSERT INTO users values('bsse0709@iit.du.ac.bd','Md. Reshad Mollick','361228d0a65bd2355b029b2fe0aad7c6','Marketing Manager');
INSERT INTO users values('bsse0727@iit.du.ac.bd','Afrina Sharmin','99941a8015cd830b498cd9f0ddf4a500','Accountant');
INSERT INTO users values('bsse0731@iit.du.ac.bd','Moumita Asad','361228d0a65bd2355b029b2fe0aad7c6','Course Manager');
INSERT INTO users values('bsse0733@iit.du.ac.bd','Rafed Muhammad Yasir','d98776477ebff87bbad3a0d9254d7bc8','Teacher');

INSERT INTO users values('moumita.asad@yahoo.com','Moumita','361228d0a65bd2355b029b2fe0aad7c6','Student');
INSERT INTO users values('suzona.asad@yahoo.com','Suzona','9947181da16bb3a83ae151221ac480c7','Student');
INSERT INTO users values('sumaiya.asad@yahoo.com','Sumaiya','a223f3fec3c0d51f40869e68af87c6df','Student');


create TABLE employee
(
	email varchar(100) not null,
	salary DOUBLE not null,
	CONSTRAINT employeePK PRIMARY KEY(email),
	CONSTRAINT employeeFK foreign key(email) references users(email)
);
 
INSERT INTO employee(email,salary) values('bsse0727@iit.du.ac.bd','15000');

create TABLE course
(
	name varchar(50) not null,
	fee FLOAT not null,
	CONSTRAINT coursePK PRIMARY KEY(name)
);

INSERT INTO course values('HTML & CSS', '1000');
INSERT INTO course values('Javascript','1000');
INSERT INTO course values('PHP','1200');
INSERT INTO course values('MySQL','500');
INSERT INTO course values('Wordpress','2000');
INSERT INTO course values('Server administration','1000');

create TABLE student
(
	roll varchar(50) not null,
	email varchar(100) not null,
	courseName varchar(50) not null,
	currentStatus varchar(10) not null default 'inactive',
	CONSTRAINT studentPK PRIMARY KEY(roll),
	CONSTRAINT studentFK foreign key(email) references users(email),
	CONSTRAINT studentFK2 foreign key(courseName) references course(name)
);

create TABLE coursePayment
(
	id bigint not null AUTO_INCREMENT,
	roll varchar(50) not null,
	paymentAmount FLOAT not null,
	paymentDate DATETIME not null,
	CONSTRAINT coursePaymentPK PRIMARY KEY(id),
	CONSTRAINT coursePaymentFK foreign key(roll) references student(roll)
);


create TABLE courseSchedule
(
	courseName varchar(50) not null,
	day varchar(10) not null,
	teacherEmail varchar(100) not null,
	duration varchar(30) not null,
	CONSTRAINT courseSchedulePK PRIMARY KEY(day,duration),
	CONSTRAINT courseScheduleFK foreign key(teacherEmail) references users(email),
	CONSTRAINT courseScheduleFK2 foreign key(courseName) references course(name)
);


create TABLE courseRating
(
	roll varchar(50) not null,
	rating int,
	CONSTRAINT courseRatingPK PRIMARY KEY(roll),
	CONSTRAINT courseRatingFK foreign key(roll) references student(roll)
);

create TABLE revenue
(
	id bigint not null AUTO_INCREMENT,
	category varchar(30) not null,
	amount double not null,
	dateOfEntry DATETIME not null,
	CONSTRAINT revenuePK PRIMARY KEY(id)
);

create TABLE expense
(
	id bigint not null AUTO_INCREMENT,
	category varchar(30) not null,
	amount double not null,
	paidTo varchar(100) not null,
	dateOfEntry DATETIME not null,
	CONSTRAINT expensePK PRIMARY KEY(id)
);

create TABLE feedback
(
	id bigint not null AUTO_INCREMENT,
	message varchar(5000) not null,
	email varchar(50) ,
	name varchar(100) not null,
	phone varchar(11) ,
	CONSTRAINT feedbackPK PRIMARY KEY(id)
);


