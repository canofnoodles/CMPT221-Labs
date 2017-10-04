#Presidents of the United States
#Authors: Jonathan Smith, David Cyganowski, Paul Ippolito

CREATE DATABASE IF NOT EXISTS site_db;
USE site_db;

DROP TABLE IF EXISTS presidents;

CREATE TABLE presidents
(
	id	INT	AUTO_INCREMENT	PRIMARY KEY,
	fname	TEXT	NOT NULL,
	lname	TEXT	NOT NULL,
	num	INT	NOT NULL,
	dob	DATETIME	NOT NULL
);

INSERT INTO presidents (fname, lname, num, dob)
VALUES 	( "JAMES", "GARFIELD", 20, '1831-11-16 00:00:00' ),
	( "GROVER", "CLEVELAND", 22, '1837-03-18 00:00:00' ),
	( "CHESTER", "ARTHUR", 21, '1829-10-05 00:00:00' ),
	( "MARTIN", "VAN BUREN", 8, '1782-12-05 00:00:00' ),
	( "JOHN", "TYLER", 10, '1790-03-29 00:00:00');

SELECT * FROM presidents;

SELECT lname, num, dob FROM presidents
ORDER BY num ASC;

SELECT lname, num, dob FROM presidents
ORDER BY lname ASC;

SELECT lname, num, dob FROM presidents
ORDER BY dob DESC;

