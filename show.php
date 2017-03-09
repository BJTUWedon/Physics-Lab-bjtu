<?php
require("./global/dev.php");
$pid=$_GET["pid"];
$source =new source;
$parts=new parts;
$source->connectsql();
/*
if(isset($_POST["title"])&&isset($_POST["content"]))
{
	$source->update_article($_GET["aid"],$_POST["title"],$_POST["content"]);
	$source->
}
*/
	if(!isset($_GET["aid"]))
		$info=$source->get_toparticle($pid);
	else
		$info=$source->get_article($_GET["aid"]);
?>
<html>
<head>
<meta charset="utf-8">
<title><?php
	$parts->pagetitle($pid);
	?></title>
<link href="./settings.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="./css/update.css">
<link rel="stylesheet" type="text/css" href="./css/SemanticUI/semantic.css">
<style>
	a{
		color:#ffffff;font-family: Adobe 黑体 Std,Adobe 黑体 Std R;
	}
</style>
</head>
<body>
<div class="main">
<div class="main2">
	<?php $parts->banner();?>
	<div class="sub_main">
    	<div class="sub_block1" >
        	<div class="sub_e2_<?php echo $pid;?>">
            	<div class="sub_<?php echo $pid;?>" ></div>
                <div class="sub_x1"></div>
                <div class="sub_gaiyao"><?php
					
					$parts->pagetitle($pid);
					
					?></div>
            </div>
			<!--<div class="sub_block1_main"></div>-->
            <a href="home.php"><div class="sub_back" ></div><div class="sub_back_text">返回</div></a>
        </div>
        <div class="sub_block2_<?php echo $pid;?>">
        	<div class="sub_bText">
            	<div class="sub_title"><?php if(isset($info["title"])) echo $info["title"]?></div>
                <div class="sub_header">
                	<div class="sub_header1"><?php if(isset($info["title"]))echo "发布时间：".substr($info["est_time"],0,10)?></div>
                	<div class="sub_header2"><?php if(isset($info["title"]))echo "更新时间：".substr($info["update_time"],0,10)?></div>
                	<div class="sub_header3"><?php
						if($_COOKIE["user"]=="admin")
							if(isset($info["title"]))echo "<a href='show_edit.php?pid=".$_GET["pid"]."&aid=".$source->getaid($info["title"])."'>编辑</a>";
						?></div>
                </div>
                <div class="sub_content">
                	<?php
						echo $info["content"];
					?>
                </div>
            </div>
        </div>
        <div class="sub_block3">
        	<div class="sub_sText1">
				<h3 style="text-align: center;line-height:40px;">近期文章</h3>
          		<hr style="width:90%;margin-top:10px;margin:auto;">
           		<?php
				$source->alist($pid);
				?>
				
			</div>
             
            <div class="lab_menu">
	            <div class="ui transparent segment">
	            	<div class="ui two column grid">
	            		<div class="column">
	            			<div class="ui segment">光学实验室</div>
	            		</div>
	            		<div class="column">
	            			<div class="ui segment">光学实验室</div>
	            		</div>
	            		<div class="column">
	            			<div class="ui segment">光学实验室</div>
	            		</div>
	            		<div class="column">
	            			<div class="ui segment">光学实验室</div>
	            		</div>
	            	</div>
	            </div>
            </div>
       </div>
    </div>    

</div>
</div>

</body>
</html>
