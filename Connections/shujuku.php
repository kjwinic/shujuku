<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_shujuku = "localhost";
$database_shujuku = "shujuku";
$username_shujuku = "root";
$password_shujuku = "123456";
$shujuku = mysqli_connect($hostname_shujuku, $username_shujuku, $password_shujuku,$database_shujuku);
//$shujuku = mysql_pconnect($hostname_shujuku, $username_shujuku, $password_shujuku) or trigger_error(mysql_error(),E_USER_ERROR); 
?>