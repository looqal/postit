<?php
include('veza.php');

# input

if(!empty($_POST['content'])) {

$input = "INSERT INTO posts (content) VALUES ('$_POST[content]')";

if (!mysqli_query($con, $input)) {
	die('Error');
	header('Location: index.php');
}
echo 'dodano';

} else {
	header('Location: http://google.com/ncr');
}
# prikaz
/*
$result = mysqli_query($con,"SELECT * FROM posts");

while($row = mysqli_fetch_array($result)) {

	echo '<table style="border: 1px dashed #222;"><tr>';
	echo '<td>' . $row['content'] . '</td>' . '<td>' . $row['id'] . '</td>';
	echo '</tr></table> <br />';

}
*/
	mysqli_close($con); 

	header('Location: index.php');
?>