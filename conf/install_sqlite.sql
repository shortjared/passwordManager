create table passwords (
	id integer primary key,
	password_text char(200) not null
);

create table groups (
	id integer primary key,
	group_name char(48) not null
);

create table group_users (
	id integer primary key,
	user_id integer not null,
	group_id integer not null
);

create table password_groups (
	id integer primary key,
	group_id integer not null,
	password_id integer not null
);
