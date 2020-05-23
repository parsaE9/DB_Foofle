<?php

$connection = mysqli_connect("localhost","root","","cms");
if(!$connection)
    echo "we are not connected";

//$query = "INSERT INTO categories(cat_title) VALUES ('Python')";
//$result = mysqli_query($connection, $query);
