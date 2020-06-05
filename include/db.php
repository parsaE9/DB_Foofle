<?php
$connection = mysqli_connect("localhost", "root", "", "foofle");
$host = 'localhost';
$dbname = 'foofle';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//

//$test = mysqli_query($connection,"CREATE PROCEDURE p(IN id_val VARCHAR(255))
    // BEGIN INSERT INTO system_info(username) VALUES(id_val); END;");
//mysqli_query($connection,"CREATE PROCEDURE mail_inbox(IN username_p VARCHAR(255)) BEGIN SELECT * FROM mail WHERE (receiver1 = username_p OR receiver2 = username_p OR receiver3 = username_p
             // OR CCreceiver1 = username_p OR CCreceiver2 = username_p OR CCreceiver3 = username_p); END;");

//$query = "CREATE PROCEDURE profile_delete(IN username_p VARCHAR(255)) BEGIN DELETE FROM system_info WHERE username = username_p; END;";
//mysqli_query($connection, $query);

$query5 = "CREATE PROCEDURE profile_edit(IN username_p VARCHAR(255), IN password_p VARCHAR(255), IN security_phone_number_p VARCHAR(255),
           IN first VARCHAR(255), IN last VARCHAR(255), IN canonical VARCHAR(255), IN phone VARCHAR(255), IN address_p VARCHAR(255),
           IN NID_p VARCHAR(255), IN access_p VARCHAR(255), IN birth DATE)
           BEGIN 
           UPDATE system_info SET security_phone_number = security_phone_number_p, password = password_p WHERE username = username_p;
           UPDATE personal_info SET first_name = first, last_name = last,
           canonical_name = canonical, address = address_p, phone_number = phone,
           NID = NID_p, access = access_p, birth_date = birth WHERE username= username_p;
           END;";
//mysqli_query($connection, $query);
//mysqli_query($connection, 'CALL p(@msg)');
//$res = mysqli_query($connection, "SELECT @msg as _p_out");
//$row = mysqli_fetch_assoc($res);
//$a = $row['_p_out'];
