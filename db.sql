create database unriddle;
use unriddle;

create table USERS(
  ID integer primary key auto_increment,
  username varchar(255) not null unique,
  email varchar(255) not null unique,
  password varchar(255) not null,
  avatar varchar(255)
)

create table FILES(
  ID integer primary key auto_increment,
  file_name varchar(255) not null,
  file_size integer not null,
  content LONGBLOB not null,
  user integer not null
)