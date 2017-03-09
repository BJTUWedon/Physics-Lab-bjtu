<?php
require("./global/dev.php");
$source=new source;
$parts=new parts;
if($_COOKIE["user"]=="admin")
	header("location:home.php");
else
{
	if(isset($_POST["uid"])&&isset($_POST["passwd"]))
	{
		$source->connectsql();
		if($source->check($_POST["uid"],$_POST["passwd"])==1)
		{
			setcookie("user","admin");
			header("location:home.php");
		}
		else
			echo "<script>alert('Check Your Password!');</script>";
		//check
	}
}

?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="admin.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/SemanticUI/semantic.css">
	</head>
	<body>
	<div class="loginbg">
		<div class="loginform">
			<?php
			$parts->login_banner();
			$parts->form_title();
			$parts->login_form();
			?>
		</div>
		</div>
	</body>
</html>