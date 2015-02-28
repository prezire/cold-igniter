CREATE TABLE pages(id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
date_time_created DATETIME NOT NULL,
enabled TINYINT(1) NOT NULL,
PRIMARY KEY (id))