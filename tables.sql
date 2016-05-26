-- Tables for louis_kang Admin

CREATE TABLE admin (
	ID INT AUTO_INCREMENT,
	username VARCHAR(20) UNIQUE ,
	password VARCHAR(20) NOT NULL,
	PRIMARY KEY ( ID )
);


CREATE TABLE projects_desc (
	ID INT AUTO_INCREMENT,
	project_title VARCHAR(200),
	project_description VARCHAR(1000),
	project_img VARCHAR(200),
	active boolean,
	PRIMARY KEY ( ID )
);


CREATE TABLE projects_images (
	ID INT AUTO_INCREMENT,
	project_id INT,
	image_src VARCHAR(100),
	PRIMARY KEY ( ID ),
	FOREIGN KEY (project_id) REFERENCES projects_desc(ID)

);

-- Inserts

INSERT INTO `admin`(`username`, `password`) VALUES ('louis','louis123');
INSERT INTO `admin`(`username`, `password`) VALUES ('1','1');

INSERT INTO projects_desc(project_title,project_description,project_img,active) VALUES
	('test peoject' , 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae expedita, ipsa unde','img.jpg',1);


INSERT INTO projects_images(project_id, image_src) VALUES
	(1,'img.jpg'),
	(1,'img.jpg'),
	(1,'img.jpg'),
	(1,'img.jpg'),
	(1,'img.jpg');