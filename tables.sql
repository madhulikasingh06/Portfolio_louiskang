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
	updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY ( ID )
);


CREATE TABLE projects_images (
	ID INT AUTO_INCREMENT,
	project_id INT,
	image_src VARCHAR(100),
	updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY ( ID ),
	FOREIGN KEY (project_id) REFERENCES projects_desc(ID)

);


CREATE TABLE awards (
		ID INT AUTO_INCREMENT,
		year INT ,
		aw_title VARCHAR(100),
		aw_desc VARCHAR(500),
		updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY ( ID )

)

-- Inserts

INSERT INTO `admin`(`username`, `password`) VALUES ('louis','louis123');
INSERT INTO `admin`(`username`, `password`) VALUES ('1','1');

INSERT INTO projects_desc(project_title,project_description,project_img,active) VALUES
	('Test Project' , 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae expedita, ipsa unde','img.jpg',1),
	('Test Project 2' , 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae expedita, ipsa unde','img.jpg',1);


INSERT INTO projects_images(project_id, image_src) VALUES
	(2,'CoupleDancing.jpg'),
	(2,'img.jpg'),
	(1,'img.jpg'),
	(1,'img.jpg'),
	(1,'img.jpg');

-- ALTERS 

ALTER TABLE projects_desc ADD updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE projects_images ADD updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

