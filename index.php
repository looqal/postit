<?php
include_once('veza.php');
include('template_OP.html');

# prikaz

$title = 'Post-it';

echo '<title>' . $title . '</title>';

$result = mysqli_query($con,"SELECT * FROM posts");

while($row = mysqli_fetch_array($result)) {

	echo '<a href="post.php?id=' . $row['id'] .'">'. '<div id="notes">';
	echo '<table class="note"><tr>';
	echo /*'<td style="padding-left: 20px;">' . $row['id'] . '</td>' . */ '<td><pre style="font-family: Calibri;">';
	echo htmlentities($row['content']);
	echo '</pre></td>';
	echo '</tr></table> <br />';

	echo '

	</div><br />
	';

}
	#mysqli_close($con);

?>

</body>
</html>