<?php
$connection = mysqli_connect("localhost", "root", "", "foofle");
$host = 'localhost';
$dbname = 'foofle';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//

//mysqli_query($connection,"CREATE PROCEDURE mail_inbox(IN username_p VARCHAR(255)) BEGIN SELECT * FROM mail WHERE (receiver1 = username_p OR receiver2 = username_p OR receiver3 = username_p
             // OR CCreceiver1 = username_p OR CCreceiver2 = username_p OR CCreceiver3 = username_p); END;");

$query = "CREATE PROCEDURE add_unallowed_user(IN username_p VARCHAR(255), IN username_q VARCHAR(255), OUT yes_no INT) 
           BEGIN
            IF EXISTS(SELECT * FROM system_info WHERE username = username_q) THEN
                INSERT INTO allowed_unallowed(type, username, target_username) VALUES('unallowed', username_p, 
                    username_q);
                SET yes_no = 1;
            ELSE 
                SET yes_no = 0;
            END IF;
            END;";
//mysqli_query($connection, $query);



//mysqli_query($connection, 'CALL p(@msg)');
//$res = mysqli_query($connection, "SELECT @msg as _p_out");
//$row = mysqli_fetch_assoc($res);
//$a = $row['_p_out'];
