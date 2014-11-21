CREATE TABLE applicant_comments(id INT NOT NULL AUTO_INCREMENT,
commenter_user_id INT NOT NULL,
applicant_user_id INT NOT NULL,
date VARCHAR(255) NOT NULL,
comment TEXT NOT NULL,
PRIMARY KEY (id))