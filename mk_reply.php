<?php
include('veza.php');

# input

if(!empty($_POST['reply']) and !empty($_POST['opn'])) {

$opn = $_POST['opn'];

$input = "INSERT INTO replies (reply_content, reply_rel) VALUES ('$_POST[reply]', $opn)";

if (!mysqli_query($con, $input)) {
	die('Error');
	header('Location: index.php');
} 
echo 'dodano';

} else {
	echo 'hi';
}

	mysqli_close($con);

	header('Location: post.php?id='.$opn);
?>