CREATE TABLE position_alerts(id INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
frequency ENUM('Weekly','Monthly') NOT NULL,
keywords VARCHAR(255) NOT NULL,
country VARCHAR(255) NOT NULL,
date_time_created DATETIME NOT NULL,
PRIMARY KEY (id))