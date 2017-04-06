<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/newlab.css">
</head>
<body>
	<div class="main">
		<div class="left_page">
			<iframe src="leftPage.php" width="100%" height="100%" frameborder="no" scrolling="no"></iframe>
		</div>

		<div class="right_page">
			<iframe src="rightPage.php?pid=<?php echo $_GET['pid']; ?>&subclass=<?php echo $_GET['subclass']; ?>" width="100%" height="100%" frameborder="no"></iframe>
		</div>
	</div>
</body>
</html>