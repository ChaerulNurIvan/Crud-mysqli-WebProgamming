<?php
include 'connect.php';
$id = $_GET['id'];
$table = 'data';
$query = "DELETE FROM $table WHERE Id_Nama=$id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
header('location: index.php');
/*Fungsi delete*/