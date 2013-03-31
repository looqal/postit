<?php

session_start();

include('../veza.php');

if(isset($_SESSION['log'])) {

?>

<title>Moderator panel</title>

<style>
body {
	background: #222;
	color: #AAA;
	font-family: Calibri;
}
a {
	text-decoration: none;
	color: #FFF;
	border-bottom: 2px solid #FFF;
}
a:hover {
	color: #FFFF00;
}
.rel {
	background: red;
	color: #FFF;
}
.rel a:hover {
	background: #999;
}
.lista {
	border: 3px solid #111; padding: 5px;
	margin: 2px;
}
.postlist a {
	text-decoration: none;
	font-weight: bold;
	}
</style>

<table width="100%" style="background: rgba(255, 100, 255, .3);"><tr>
	<td align="left"><h1>Posts</h1></td>
	<td align="right"><a href="../">board</a> <a href="logout.php">logout</a>
</tr></table><br />

<small>Click on the underlined post ID to delete post:</small><br /><br />

<?php

$show_posts = mysqli_query($con, "SELECT * FROM posts");

while($row = mysqli_fetch_array($show_posts)) {
	echo '
	<table class="lista">
	 <tr> <td>'; echo '<a class="postlist" href="../post.php?id=' . $row['id'] .  '">';
	echo htmlentities($row['content']);
	echo '</a></td>
	  <td class="rel"><a href="index.php?del_post='.$row['id'].'">'.$row['id'].'</a></td>
	 </tr>
	</table>

	';
} 

	if(isset($_GET['del_post'])) {
		
		$del_post = $_GET['del_post'];

		mysqli_query($con, "DELETE FROM posts WHERE id = $del_post"); 

		header('Location: index.php');
	
	}

?>

<br /> <h1>Replies:</h1>
<small>Click on the underlined reply ID to delete reply:</small><br /><br />

<?php

$show_replies = mysqli_query($con, "SELECT * FROM replies");

	while($row = mysqli_fetch_array($show_replies)) {
		echo '
		<table class="lista">
		 <tr style="display: inline;">
		  <td><a href="index.php?del_reply='.$row['reply_id'].'">'.$row['reply_id'].'</a></td>';
		  echo '<td>';
		  echo htmlentities($row['reply_content']);
		  echo '</td>';
		  echo '<td class="rel">'. $row['reply_rel'] . '</td>
		 </tr>
		</table>

		';
	}

	if(isset($_GET['del_reply'])) {
		
		$del_reply = $_GET['del_reply'];

		mysqli_query($con, "DELETE FROM replies WHERE reply_id = $del_reply"); 

header('Location: index.php');
	
	}

?>

<?php 
} else {
	
	if(isset($_POST['password'])) {


	$pw = $_POST['password'];

                if($pw == 'git') {

			$_SESSION ['log'] = true;

			header('Location: index.php');

			exit();

	} else {

		$error = '<small style="color: red;">Netacno</small>';
	}

} ?>
<style>
body {
	background: #222;
	font-family: Calibri;
}
input {
	background: #333;
	border: 3px solid #444;
	color: red;
}
a {
	text-decoration: none;
	color: #FFF;
}
</style> <title>Moderator panel</title>

<a href="../">return</a>

	<center>
<form method="post">
	<input type="password" name="password"/>
</form>
<?php echo $error; ?>
	</center>

<?php

}

?>
