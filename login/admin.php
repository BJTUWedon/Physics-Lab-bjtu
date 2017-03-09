<?php
if($_COOKIE["user"]!="admin")
	header("index.php");
else{
	require("../global/dev.php");
	$source=new source;
	$parts=new parts;
	$source->connectsql();
	//$source->admin_alist();
	if(isset($_POST["title"])&&isset($_POST["class"])&&isset($_POST["content"]))
	{
	   $source->add_article($_POST["title"],$_POST["class"],$_POST["content"],$_POST["subclass"]);
		header("location:../index.php");
	}
}
	session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>物理实验室管理系统</title>
        <link rel="stylesheet" href="../css/SemanticUI/semantic.css" media="screen" title="no title" charset="utf-8">
  <!--       <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet"> -->
  		<link rel="stylesheet" type="text/css" href="./admin.css">
  	<script type="text/javascript">
  		function tester(event){
  			if(event.target.value=="jiaoyu")
  			{
  				document.getElementById('subpart').innerHTML="<option value='0'>光学实验室</option>"
							+"<option value='1'>力学实验室</option>"
							+"<option value='2'>电磁学实验室</option>"
							+"<option vlaue='3'>震动与波</option>"
							+"<option value='4'>热学与综合</option>"
							+"<option value='5'>立体与综合</option>";
  			}
  			else
  			{
  				document.getElementById('subpart').innerHTML="";
  			}
  		}
  	</script>
    </head>

    <body>
        <div class="ui grid divided segment container">
            <div class="five wide  column">

                <h4 class="ui inverted header">

                    <i class="angle left  icon"></i>
                </h4>

                <h1 class="ui inverted center aligned header" style="font-size: 40px;margin-top:35px">
                    <p class="sub header">
                        Welcome to
                    </p>
                    BJTU Physics Lab
                </h1>



            </div>

            <div class="eleven wide column">
                <h4 class="ui inverted right aligned header">
                    <a href="../index.php" style="color:#ff695e;">or Home</a>
                </h4>

                <form class="ui form" action="#" method="post">
                    <div class="field">
                    	<label>文章标题</label>
                        <input type="text" name="title" placeholder="文章标题">
                    </div>

                  	<div class="field">
				    	<label>文章分类</label>
				    	<select class="ui fluid dropdown" name="class" oninput="tester(event)" >
					        <option value='jiaoyu'>科普教育</option>
							<option value='tiandi'>学生天地</option>
							<option value='tongji'>数据统计</option>
							<option value='rizhi'>表格下载</option>
							<option value='time'>开放时间</option>
							<option value='peixun'>本科教学</option>
							<option value='ziyuan'>学习资源</option>
							<option value='lianxi'>联系我们</option>
							<option value='canguan'>参观指南</option>
							<option value='info'>实验中心概述</option>
							<option value='news'>新闻</option>
      					</select>
    				</div>
                     
                     <div class="field" >
				    	<label>子分类</label>
				    	<select class="ui fluid dropdown" name="subclass" id="subpart">
					        <option value='1'>光学实验室</option>
							<option value='2'>力学实验室</option>
							<option value='3'>电学实验室</option>
      					</select>
    				</div>

                  <button class="ui inverted red circular right floated button" type="submit" >Publish</button>
                
            </div>
        </div>
        <div class="ui segment" id="content">
        <div class="ui form">
		  	<div class="field">
		    	<label>Text</label>
		    	<textarea name="content" placeholder="在这里编辑文章内容"></textarea>
		  	</div>
		</div>
		</div></form>
    </body>
</html>
<!-- <html>
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
	</body>
</html> -->