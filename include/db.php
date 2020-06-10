<?php
$connection = mysqli_connect("localhost", "root", "", "foofle");
$host = 'localhost';
$dbname = 'foofle';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//

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
$query3 = "CREATE PROCEDURE profile_search(IN username_p VARCHAR(255))
BEGIN
CALL get_last_username(@p);
IF EXISTS(SELECT * FROM allowed_unallowed WHERE username = username_p and target_username = @p and 
            type = 'allowed') THEN
            SELECT * FROM personal_info WHERE username = username_p;
            INSERT INTO news(username, date, content) VALUES(username_p, CURRENT_TIMESTAMP, 'case 1');
ELSEIF EXISTS(SELECT * FROM allowed_unallowed WHERE username = username_p and target_username = @p and 
            type = 'unallowed') THEN
            SELECT * FROM personal_info WHERE username = '*';
            INSERT INTO news(username, date, content) VALUES(username_p, CURRENT_TIMESTAMP, 'case 2');
ELSEIF EXISTS(SELECT * FROM personal_info WHERE username = username_p and access = 'public') THEN
            SELECT * FROM personal_info WHERE username = username_p;
            INSERT INTO news(username, date, content) VALUES(username_p, CURRENT_TIMESTAMP, 'case 3');
ELSEIF EXISTS(SELECT * FROM personal_info WHERE username = username_p and access = 'private') THEN
            SELECT * FROM personal_info WHERE username = '*';
            INSERT INTO news(username, date, content) VALUES(username_p, CURRENT_TIMESTAMP, 'case 4');
END IF;
END;";

$query2 = "CREATE TRIGGER edit_profile_trigger AFTER UPDATE ON system_info FOR EACH ROW
            INSERT INTO news(username, date, content) VALUES(NEW.username, CURRENT_TIMESTAMP, 'You Successfully Edited Your Profile!');";
mysqli_query($connection, $query2);

//mysqli_query($connection, 'CALL get_last_username(@msg)');
//$res = mysqli_query($connection, "SELECT @msg as _p_out");
//$row = mysqli_fetch_assoc($res);
//$a = $row['_p_out'];
//echo $a;