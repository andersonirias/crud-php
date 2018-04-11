CREATE DATABASE examples;
\c examples;
CREATE TABLE people (id SERIAL, name varchar(50) DEFAULT NULL, email varchar(50) DEFAULT NULL, phone varchar(20) DEFAULT NULL, PRIMARY KEY (id));

