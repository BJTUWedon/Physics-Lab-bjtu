<?php
if($_COOKIE["user"]!="admin")
	header("login.php");
else{
	require("./global/dev.php");
	$source=new source;
	$parts=new parts;
	$source->connectsql();
	//$source->admin_alist();
	if(isset($_POST["title"])&&isset($_POST["class"])&&isset($_POST["content"]))
	{
	   $source->add_article($_POST["title"],$_POST["class"],$_POST["content"]);
		header("location:home.php");
	}
}
	
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>物理实验室管理系统</title>
		<link href="admin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div class="loginbg">
		<div class="loginform" style="float:left;margin-left:40px;margin-top:40px;">
			<?php
			$parts->login_banner();
			$parts->form_title();
			$parts->admin_form();
			//form 是一个跨div的表单，所以后半部分存在半个form
			?>
			
		</div>
		<div class="admin_article">
		<textarea name="content" placeholder="在这里编辑文章内容"></textarea>
		</div></form>
		<div class="admin_backhome">
			<a href="home.php"><img src="image/backicon.png" style="width:50px;height:86px"></a>
			返回主页
		</div>
		</div>
		<!-- <footer>&copy;北京交通大学物理实验室</footer> -->
	</body>
</html>