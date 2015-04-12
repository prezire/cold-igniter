CREATE TABLE position_alerts(id INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
frequency ENUM('Daily','Weekly') NOT NULL,
keywords VARCHAR(255) NOT NULL,
date_time_created DATETIME NOT NULL,
PRIMARY KEY (id))