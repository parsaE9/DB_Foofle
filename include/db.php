<?php
$connection = mysqli_connect("localhost", "root", "", "foofle");
if(!$connection)
    echo "wer are not connected!";

$query = " CREATE TABLE IF NOT EXISTS foofle.system_info ( 
          username VARCHAR(255) NOT NULL ,
          password VARCHAR(255) NOT NULL  ,
          phone_number VARCHAR(255) NOT NULL ,
          register_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
          PRIMARY KEY (username)
) ENGINE = InnoDB ";

$query2 = " CREATE TABLE IF NOT EXISTS foofle.personal_info ( 
            username VARCHAR(255) NOT NULL,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            phone_number VARCHAR(255) NOT NULL,
            address     VARCHAR(255) NOT NULL,
            canonical_name  VARCHAR(255) NOT NULL,
            NID         VARCHAR(255) NOT NULL,
            access ENUM('public','private') NOT NULL DEFAULT 'public',
            birth_date DATE NOT NULL,
            PRIMARY KEY (username)
 ) ENGINE = InnoDB ";

$query3 = "CREATE TABLE IF NOT EXISTS foofle.login_time ( 
            time_ DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
            username VARCHAR(255) NOT NULL , 
            PRIMARY KEY (time_)
            ) ENGINE = InnoDB";

$query4 = "CREATE TABLE IF NOT EXISTS foofle.mail ( 
          mail_ID INT(3) NOT NULL AUTO_INCREMENT ,
          sender VARCHAR(255) NOT NULL , title VARCHAR(255) NOT NULL , 
          date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , content TEXT NOT NULL ,
          receiver1 VARCHAR(255) NOT NULL, receiver2 VARCHAR(255) NOT NULL,
          receiver3 VARCHAR(255) NOT NULL, CCreceiver1 VARCHAR(255) NOT NULL,
          CCreceiver2 VARCHAR(255) NOT NULL, CCreceiver3 VARCHAR(255) NOT NULL,
          PRIMARY KEY (mail_ID)) ENGINE = InnoDB";

$query5 = "ALTER TABLE mail ADD CONSTRAINT 
           mail_system_foreign_key_constraint FOREIGN KEY (sender) 
           REFERENCES system_info(username) ON DELETE CASCADE ON UPDATE CASCADE";

$query6 = "ALTER TABLE personal_info ADD CONSTRAINT 
           system_personal_foreign_key_constraint FOREIGN KEY (username) 
           REFERENCES system_info(username) ON DELETE CASCADE ON UPDATE CASCADE";

$query7 = "CREATE TABLE foofle.news ( 
            news_ID INT(3) NOT NULL AUTO_INCREMENT , username VARCHAR(255) NOT NULL , 
            date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , content TEXT NOT NULL , 
            PRIMARY KEY (news_ID)) ENGINE = InnoDB";

$query8 = "ALTER TABLE news ADD CONSTRAINT 
           news_system_foreign_key_constraint FOREIGN  KEY (username)
           REFERENCES system_info(username) ON DELETE CASCADE ON UPDATE CASCADE ";


//$insert_query = mysqli_query($connection, $query7);

//$query2 = "INSERT INTO user_test (username) VALUES ('abc')";