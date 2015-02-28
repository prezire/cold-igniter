CREATE TABLE comments(id INT NOT NULL AUTO_INCREMENT,
page_id INT NOT NULL,
message VARCHAR(255) NOT NULL,
from_user_id INT NOT NULL,
date_time_posted DATETIME NOT NULL,
approved TINYINT(1) NOT NULL,
approved_by_user_id INT NOT NULL,
enabled TINYINT(1) NOT NULL,
PRIMARY KEY (id))