<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM system_info WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_query)){
        $db_username = $row['username'];
        $db_password = $row['password'];
    }

    if($username == $db_username && password_verify($password , $db_password)){
        $query = "INSERT INTO login_time (time_, username) VALUES (CURRENT_TIMESTAMP, '{$username}')";
        mysqli_query($connection, $query);
        $_SESSION['username'] = $db_username;
        header("location: ../inside/index.php");
    }else{
        header("location: ../home_page.php");
    }

}
?>