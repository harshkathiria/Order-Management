<?php
ini_set('date.timezone', 'Asia/Kolkata');
ini_set('memory_limit', '5120M');
ini_set('post_max_size', '5000M');
ini_set('upload_max_filesize', '5000M');
ini_set('max_input_time', '-1');
ini_set('max_execution_time', '-1');
define('DATE_N_TIME', date('Y-m-d H:m:s'));
define('DB_HOST', 'localhost');
define('DB_NAME', 'harshvid_vdo');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if( mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>