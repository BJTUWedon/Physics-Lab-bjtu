<?php
//if($_COOKIE["user"]!="admin")
	//header("home.php");
require("./global/dev.php");
$pid=$_GET["pid"];
$source =new source;
$parts=new parts;
$source->connectsql();

if(isset($_POST["title"])&&isset($_POST["content"]))
{
	$source->update_article($_POST["aid"],$_POST["title"],$_POST["content"]);
	header("location:show.php?pid=".$_GET['pid']."&aid=".$_POST['aid']." ");
}

	
	$info=$source->get_toparticle($pid);
?>
<html>
<head>
<meta charset="utf-8">
<title>show</title>
<link href="./settings.css" rel="stylesheet" type="text/css">
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
            <div class="sub_block1_main"></div>
            <a href="home.php"><div class="sub_back"></div></a>
        </div>
        <form action="#" method="post">
        <input type="hidden" value="<?php echo $_GET["aid"]?>" name="aid">
        <div class="sub_block2_<?php echo $pid;?>">
        	<div class="sub_bText">
            	<div class="sub_title"><input style="width:80%;height:80%" type="text" name="title" value="<?php echo $info["title"]?>"></div>
                <div class="sub_header">
                	<div class="sub_header1">发布时间：<?php echo substr($info["est_time"],0,10)?></div>
                	<div class="sub_header2">更新时间：<?php echo substr($info["update_time"],0,10)?></div>
                	<div class="sub_header3">
                		<input type="submit">
                	</div>
                </div>
                <div class="sub_content">
                	<textarea name="content" style="width:100%;height:100%"><?php
						echo $info["content"];
					?></textarea>
                </div>
            </div>
        </div>
		</form>
        <div class="sub_block3">
        	<div class="sub_sText1">
          		<h3 style="text-align: center;line-height:40px;">近期文章</h3>
          		<hr style="width:90%;margin-top:10px;margin:auto;">
           		<?php
				$source->alist($pid);
				?>
				
			</div>
             
            <a href="#"><div class="sub_sText2">
            	<div class="sub_con">
                	<div class="sub_clock"></div>
                    <div class="sub_x2"></div>
					<div class="sub_clockTxt">开放时间</div></div>
					
                <div class="sub_t2"><p>周一至周五</p>
			
 <p>&nbsp;上午8:30-12:00<br>&nbsp;下午2:00-6:00</p>
		    
<p>周末:</p>
		    
<p>&nbsp;上午7:30-12:00<br>&nbsp;下午1:00-10:00</p>
 
				</div>
            </div></a>
            
            <a href="#"><div class="sub_sText3">
            	<div class="sub_con">
                	<div class="sub_phone"></div>
                    <div class="sub_x3"></div>
					<div class="sub_phoneTxt">联系我们</div>
                </div>
                <div class="sub_t3">电话：1383838438
<br>邮箱：physiclab@bjtu.edu.cn
<br>公众号：北京交通大学威海校区</div>
				</div></a>
        </div>
    </div>    

</div>
</div>

</body>
</html>
