<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    mysqli_query($connection, "CALL login('{$username}','{$password}',@yes_no)");
    $res = mysqli_query($connection, "SELECT @yes_no as _p_out");
    $row = mysqli_fetch_assoc($res);
    $a = $row['_p_out'];

    if($a == 1){
        mysqli_query($connection, "CALL insert_into_login_time('{$username}')");
        $sql = "CALL get_username('{$username}')";
        $q = $pdo->query($sql);
        $q -> setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $q -> fetch()){
            $_SESSION['username'] = $row['username'];
        }
        header("location: ../inside/index.php");
    }else{
        header("location: ../home_page.php");
    }
}
?>