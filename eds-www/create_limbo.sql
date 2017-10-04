# This file creates the Limbo database.
# Author: Jonathan Smith

drop database if exists limbo_db;
create database limbo_db ; 
use limbo_db ;

create table if not exists stuff
(
 id	INT,
 descr 	TEXT
);

alter table stuff
add primary key (id),
change descr description TEXT,
add column color TEXT,
add column timefound DATE,
add column locationf TEXT;

explain stuff;