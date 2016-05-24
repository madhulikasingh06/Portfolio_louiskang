-- Tables for louis_kang Admin

CREATE TABLE admin (
	ID INT AUTO_INCREMENT,
	username VARCHAR(20) UNIQUE ,
	password VARCHAR(20) NOT NULL,
	PRIMARY KEY ( ID )
);


CREATE TABLE projects (
	ID INT AUTO_INCREMENT,
	project_title VARCHAR(200),
	project_description VARCHAR(1000),
	project_img VARCHAR(200),
	PRIMARY KEY ( ID )
);



-- Inserts

INSERT INTO `admin`(`username`, `password`) VALUES ('louis','louis123');