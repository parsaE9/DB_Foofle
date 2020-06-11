<?php
$connection = mysqli_connect("localhost", "root", "", "foofle");
$host = 'localhost';
$dbname = 'foofle';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);