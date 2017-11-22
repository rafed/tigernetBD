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

INSERT INTO student	values('1','moumita.asad@yahoo.com','Wordpress','active');
INSERT INTO student values('2','moumita.asad@yahoo.com','HTML & CSS','inactive');
INSERT INTO student values('3','sumaiya.asad@yahoo.com','HTML & CSS','active');
INSERT INTO student values('4','sumaiya.asad@yahoo.com','MySQL','active');
INSERT INTO student values('5','sumaiya.asad@yahoo.com','PHP','active');
INSERT INTO student values('6','suzona.asad@yahoo.com','Wordpress','active');
INSERT INTO student values('7','suzona.asad@yahoo.com','PHP','active');

create TABLE coursePayment
(
	id bigint not null AUTO_INCREMENT,
	roll varchar(50) not null,
	paymentAmount FLOAT not null,
	paymentDate DATETIME not null,
	CONSTRAINT coursePaymentPK PRIMARY KEY(id),
	CONSTRAINT coursePaymentFK foreign key(roll) references student(roll)
);

INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('1','500','2017-10-02');
INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('2','700','2017-10-03');
INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('3','700','2017-09-18');
INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('4','300','2017-09-08');
INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('5','500','2017-09-18');
INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('6','1000','2017-10-13');
INSERT INTO coursePayment(roll,paymentAmount,paymentDate) values('7','500','2017-10-13');


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

INSERT INTO courseSchedule values('HTML & CSS','Monday','bsse0731@iit.du.ac.bd', '05:00:00 - 07:00:00 pm');
INSERT INTO courseSchedule values('Server administration','Monday','bsse0733@iit.du.ac.bd', '09:00:00 - 11:00:00 am');
INSERT INTO courseSchedule values('Javascript','Wednesday','bsse0727@iit.du.ac.bd', '03:00:00 - 05:00:00 pm');
INSERT INTO courseSchedule values('HTML & CSS','Wednesday','bsse0731@iit.du.ac.bd', '05:00:00 - 07:00:00 pm');

create TABLE courseRating
(
	roll varchar(50) not null,
	rating int,
	CONSTRAINT courseRatingPK PRIMARY KEY(roll),
	CONSTRAINT courseRatingFK foreign key(roll) references student(roll)
);

INSERT INTO courseRating values('1',3);
INSERT INTO courseRating values('2',4);
INSERT INTO courseRating values('3',5);
INSERT INTO courseRating values('6',5);
INSERT INTO courseRating values('7',4);

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
	-- CONSTRAINT expenseFK foreign key(paidTo) references employee(email)
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


INSERT INTO `revenue` (`id`, `category`, `amount`, `dateOfEntry`) VALUES
(2, 'Domain business', 10000, '2017-10-18 00:00:00'),
(3, 'Cyber cafe', 1000, '2017-10-18 00:00:00'),
(4, 'Cyber cafe', 500, '2017-10-19 00:00:00'),
(5, 'Short course', 200, '2017-10-18 00:00:00'),
(6, 'Short course', 5000, '2017-10-18 00:00:00'),
(7, 'Short course', 2000, '2017-10-18 00:00:00'),
(8, 'Short course', 2000, '2017-10-18 00:00:00'),
(9, 'Cyber cafe', 20, '2017-10-18 00:00:00'),
(10, 'Short course', 20, '2017-10-18 00:00:00'),
(11, 'Cyber cafe', 342, '2017-10-17 00:00:00'),
(12, 'Short course', 564, '2017-10-18 00:00:00'),
(13, 'Cyber cafe', 54, '2017-10-18 00:00:00'),
(14, 'Short course', 64, '2017-10-10 00:00:00'),
(16, 'Short course', 4560, '2017-01-01 00:00:00'),
(17, 'Domain business', 10000, '2017-12-31 00:00:00'),
(18, 'Domain business', 1000, '2017-01-01 00:00:00');
