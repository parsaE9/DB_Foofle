<?php session_start(); ?>

<?php

if (isset($_GET['source'])) {
    $source = $_GET['source'];
}
if ($source == "delete_account") {

}

$_SESSION['username'] = null;
header("location: ../home_page.php");
?>
