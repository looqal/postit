<?php

include('template_reply.html');

ob_start();
include_once('index.php');
include_once('veza.php');
ob_end_clean();


if(isset($_GET['id'])) {
	$postid = $_GET['id'];

$daj_OP = mysqli_query($con, "SELECT content FROM posts WHERE id=$postid");



while($row = mysqli_fetch_array($daj_OP)) {
	echo nl2br('<OP><small>OP says: </small>' . $row['content'] . '</OP>');
	echo '<title>' . $row['content'] . '</title>';
}

} else {
	echo 'no';
}

$opn = $_GET['id'];

#echo '<marquee>' . $opn . '</marquee>';

$result = mysqli_query($con,"SELECT * FROM replies WHERE reply_rel=$opn");

while($row = mysqli_fetch_array($result)) {

	echo /*$row['reply_id'] .*/ '<div id="notes">';
	echo '<table class="note"><tr>';
	echo /*'<td style="padding-left: 20px;">' . $row['id'] . '</td>' . */ '<td><pre style="cursor: default; font-family: Calibri;">';
	echo htmlentities($row['reply_content']);
	echo '</pre></td>';
	echo '</tr></table> <br />';

	echo '

	</div><br />
	';

}
?>

</body>
</html>