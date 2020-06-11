<?php session_start(); ?>
<?php include "db.php"; ?>

<?php

if (isset($_GET['source'])) {
    $username = $_SESSION['username'];
    $_SESSION['username'] = null;
    $sql = "CALL profile_delete()";
    $q = $pdo->query($sql);
    header("location: ../home_page.php");
}

$_SESSION['username'] = null;
header("location: ../home_page.php");
?>
