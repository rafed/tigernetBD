create TABLE users
(email varchar(100) not null,
 password varchar(50) not null,
 role varchar(20) not null,
 CONSTRAINT userPK PRIMARY KEY(email));
 
INSERT INTO users values('bsse0727@iit.du.ac.bd','mahi','accountant');
