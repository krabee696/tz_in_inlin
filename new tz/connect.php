<?php
$connect = mysqli_connect('localhost', 'root', '', 'testdb');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>