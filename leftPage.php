<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/leftPage.css">
	<link rel="stylesheet" type="text/css" href="css/SemanticUI/semantic.css">
	<script type="text/javascript">
		function linkto(str_url,str_sub)
		{
			top.location.href="./new.php?pid="+str_url+"&subclass="+str_sub;
		}
		function gohome()
		{
			top.location.href="./index.php";
		}
	</script>
</head>
<body>
	<div class="leftBody">
		<div class="ui vertical inverted sticky menu fixmenu">
			<div class="item" style="height:80px">
				<h2>
					<i class="ui bordered inverted teal student link icon" style="float:left" onclick="gohome()"></i>
				</h2>
				<h3 style="margin-left: 20px;line-height: 10px">Physics Lab</h3>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('tiandi')">学生天地</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('jiaoyu')">科普教育</div>
				<div class="menu">
					<a class="item" onclick="linkto('jiaoyu',0)">光学实验室</a>
					<a class="item" onclick="linkto('jiaoyu',1)">力学实验室</a>
					<a class="item" onclick="linkto('jiaoyu',2)">电磁学实验室</a>
					<a class="item" onclick="linkto('jiaoyu',3)">振动与波</a>
					<a class="item" onclick="linkto('jiaoyu',4)">热学与综合</a>
					<a class="item" onclick="linkto('jiaoyu',5)">立体与综合</a>
				</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('peixun')">本科教学</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('ziyuan')">学习资源</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('info')">实验中心概述</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('news')">新闻</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('tongji')">数据统计</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('time')">开放时间</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('rizhi')">表格下载</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('canguan')">参观指南</div>
			</div>
			<div class="item">
				<div class="ui inverted sub header" onclick="linkto('lianxi')">联系我们</div>
			</div>
		</div>
	</div>
</body>
</html>