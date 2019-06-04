create database todo;
use todo;

create table todolist (
  id  int(11) auto_increment primary key,
  todos varchar(30) not null,
  due varchar(30) not null
);