create table passwords (
	id int not null auto_increment primary key,
	password_service char(200) not null,
	password_text char(200) not null
);

create table groups (
	id int not null auto_increment primary key,
	group_name char(200) not null
);

create table group_users (
	id int not null auto_increment primary key,
	user_id INT not null,
	group_id INT not null
);

create table password_groups (
	id int not null auto_increment primary key,
	group_id INT not null,
	password_id INT not null
);
