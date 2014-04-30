DROP DATABASE IF EXISTS qiuzudui;
CREATE DATABASE qiuzudui;
USE qiuzudui;

CREATE TABLE think_user (
	id INT AUTO_INCREMENT,
	email VARCHAR(30),
	name VARCHAR(30),
	user_type INT(11),
	password VARCHAR(30),
	gender CHAR(1),
	grade INT(11),
	weibo VARCHAR(60),
	wechat VARCHAR(40),
	introduction VARCHAR(200),
	major VARCHAR(20),
	photo VARCHAR(40),
	PRIMARY KEY(id)
);
CREATE TABLE think_activity (
	id INT AUTO_INCREMENT,
	name VARCHAR(30),
	create_date VARCHAR(40),
	edit_date VARCHAR(40),
	start_date VARCHAR(40),
	end_date VARCHAR(40),
	deadline VARCHAR(40),
	size_lowbound int(50),
	size_uppbound int(50),
	introduction VARCHAR(300),
	applyForm VARCHAR(30),
	poster VARCHAR(30),
	host_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(host_id) REFERENCES think_user(id)
);

CREATE TABLE think_ability (
	id INT AUTO_INCREMENT,
	name VARCHAR(20),
	PRIMARY KEY(id)
);

CREATE TABLE think_userability (
	id INT AUTO_INCREMENT,
	ability_id INT NOT NULL,
	user_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(ability_id) REFERENCES think_ability(id),
	FOREIGN KEY(user_id) REFERENCES think_user(id)
);
CREATE TABLE think_invitation (
	id INT AUTO_INCREMENT,
	invitor_id INT,
	invitee_id INT,
	activity_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(invitor_id) REFERENCES think_user(id),
	FOREIGN KEY(invitee_id) REFERENCES think_user(id),
	FOREIGN KEY(activity_id) REFERENCES think_activity(id)
);



drop user qiuzudui@'%';

drop user qiuzudui@localhost; 

grant all on qiuzudui.* to qiuzudui@localhost identified by 'trf153.';