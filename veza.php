<?php

# konekcija

$con = mysqli_connect('host', 'username', 'password', 'database');

if (mysqli_connect_errno($con))
{
	echo '<pre>'. 'Ne' .'</pre>' . mysqli_connect_error();
}

/*
foreach($_POST as $k=>$v) {
 $_POST[$k] = mysqli_real_escape_string($v);
} */

?>