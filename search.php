<?php

include('../veza.php');
include('results.html');

$con = mysqli_connect('host', 'username', 'password', 'database');

if(isset($_GET['search'])) {

  $srch = $_GET['search'];

		$koliko = mysqli_query($con, "SELECT COUNT(*) FROM posts WHERE content = '$srch'");

	while($krug = mysqli_fetch_array($koliko)) {
		
		if($krug[0] == 0) {
			echo '0 results';
			echo '<title>' . $krug[0] . ' results</title>';
		}
		if($krug[0] >> 0) {

			$pullquery = mysqli_query($con, "SELECT * FROM posts WHERE content = '$srch'");
			echo '<div id="results">';
		while($row = mysqli_fetch_array($pullquery)) {

			echo '<a class="results" href="../notes/post.php?id=' . $row['id'] . '">' . $row['content'] . '</a><br />';

		}
			echo '</div>';
			
			echo '<title>' . $krug[0] . ' result';
			if($krug[0] >> 1) {
				echo 's</title>';
			} if($krug[0] == 1) {
				echo '</title>';
			}

		$pullquery->close();

} }
	} else {
	
		echo 'hi';

	}


?>
