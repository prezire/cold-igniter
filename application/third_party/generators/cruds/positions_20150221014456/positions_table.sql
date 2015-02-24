CREATE TABLE positions(id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
date_from DATETIME NOT NULL,
date_to DATETIME NOT NULL,
industry VARCHAR(255) NOT NULL,
working_hours VARCHAR(255) NOT NULL,
shift_pattern VARCHAR(255) NOT NULL,
salary VARCHAR(255) NOT NULL,
vacancy_count INT NOT NULL,
employer_id INT NOT NULL,
PRIMARY KEY (id))