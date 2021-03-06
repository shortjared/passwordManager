create sequence passwords_id_seq;

create table passwords (
	id integer not null default nextval('passwords_id_seq') primary key,
	password_service char(200) not null,
	password_text char(200) not null
);

create sequence groups_id_seq;

create table groups (
	id integer not null default nextval('groups_id_seq') primary key,
	group_name char(48) not null
);

create sequence group_users_id_seq;

create table group_users (
	id integer not null default nextval('group_users_id_seq') primary key,
	user_id integer not null,
	group_id integer not null
);

create sequence password_groups_id_seq;

create table password_groups (
	id integer not null default nextval('password_groups_id_seq') primary key,
	group_id integer not null,
	password_id integer not null
);
