<!doctype html>
<?php
require("./global/dev.php");
$parts=new parts;
$source=new source;
?>
<html>
<head>
<meta charset="utf-8">
<title>物理实验室主页</title>

<link href="./settings.css" rel="stylesheet" type="text/css">
<link href="./display.css" rel="stylesheet" type="text/css">
<script src="./script/vue.js"></script>
<script src="./script/display.js"></script>

</head>

<body>

 <div class="main">
  <div class="main2">
  <?php $parts->banner()?>
   <div class="left">
   		<div class="left_line1">
	 <div class="left_image">
	 	<div class="img_info">
	 		<p id="img_title">{{img_arr[count].title}}</p>
	 		<div class="controls_container"><span v-for="value in img_arr" v-bind:class="value.status"></span></div>
	 	</div>
	 	<img  v-bind:src="img_arr[count].src" width="780" height="320" alt=""/ id="img_src" style="opacity: 1.0">
	 </div>
	</div>
<div class="left_line2">
	  <a href="show.php?pid=jiaoyu">
       <div class="left_edu position_rel" style="background:rgba(21,3,160,0.88)" v-on:mouseover="cover" v-on:mouseout="uncover">
       	<div class="dark_cover">
       		<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("jiaoyu");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
       	</div>
	    <div class="left_line2_image" style="align-content: center">
	    	<img src="image/process.png"  alt="" style="margin-top: 38px;margin-left: 61px;">
	    </div>
		
	    <div class="left_line2_text">
	     <div class="left_line2_text1">
	      <div class="p3">科普教育</div>
	     </div>
	     
		    
		</div>
	     
	  </div>
	 </a>
	 <a href="show.php?pid=peixun"> 
      <div class="left_source position_rel" style="background:rgba(122,37,187,0.88)" v-on:mouseover="cover" v-on:mouseout="uncover">
      	<div class="dark_cover">
      		<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("peixun");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
      	</div>
	     <div class="left_line2_image" style="align-content: center"><img src="image/7.png"  alt="" style="margin-top: 38px;margin-left: 61px;"></div>
		
	    <div class="left_line2_text">
	     <div class="left_line2_text1">
	      <div class="p3">本科教学</div>
	     </div>
	     
		    
		</div>
	  </div> 
		</a> 
	</div>
	<div class="left_line2">
	 <a href="show.php?pid=rizhi"> 
     <div class="left_info position_rel" style="background:rgba(225,123,161,0.88)" v-on:mouseover="cover" v-on:mouseout="uncover">
      <div class="dark_cover">
      	<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("rizhi");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
      </div>
      <img src="./image/5.png" width="70" height="70" alt="" style="margin-top: 36px">
      <div class="p3" style="margin-top: 6px">表格下载
		 </div>
		 </div></a>
	  <a href="show.php?pid=lianxi">
	  <div class="left_tour position_rel" v-on:mouseover="cover" v-on:mouseout="uncover">
	  	<div class="dark_cover">
	  		<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("lianxi");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
	  	</div>
	   <img src="./image/4.png" alt="" style="margin-top: 40px"><br>
		  <div class="p3" style="margin-top: 10px">联系我们
		 </div>
		  </div></a>
	  <a href="show.php?pid=time">
	  <div class="left_time position_rel" style="background:rgba(112,139,206,0.88)" v-on:mouseover="cover" v-on:mouseout="uncover">
	  	<div class="dark_cover">
	  		<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("time");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
	  	</div>
	  	<div class="left_line2_time_image" style="align-content: center"><img src="./image/clock.png" width="70" height="70" alt=""/>
	    </div>
		<div class="left_line2_time_black"></div>
	    <div class="left_line2_time_text">
	     <div class="h">开放时间</div>
		 <div class="p2">周一至周五:
			<br>&nbsp;上午8:30-12:00&nbsp;下午2:00-6:00
		    <br>周末:
		    <br>&nbsp;上午7:30-12:00&nbsp;下午1:00-10:00</div>    
		</div>  
	    <div class="left_line2_time_name"><div class="p1">Time.</div>
	    </div>
		  </div></a>
    </div>
   	
    
   </div>
   <div class="right">
    <div class="right_line1">
    
     <a href="show.php?pid=news"><div class="right_line1_right">
      <div class="right_1">

       <img src="./image/3.png" style="width:160px;height:140px;margin:20px 15px" >
      </div>
      <div class="right_news">
      <div class="p1">
	&nbsp;News</div>
      <br>
      <div class="p6">
      <?php
		$source->connectsql();
		$news=$source->get_toparticle("news");
	  	echo substr($news["content"],0,120);
	  //UTF-8下一个中文占3个字符 
	  	echo "......";
		  ?>
      </div>
      </div>      
		 </div></a>
     
     <a href="show.php?pid=info">
     	<div class="right_connect position_rel"  v-on:mouseover="cover" v-on:mouseout="uncover">
     		<div class="dark_cover">
     			<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("info");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
     		</div>
      		<img src="./image/info.png" style="margin-top: 30px">
      		<div class="p3" style="margin-top:10px">实验中心概述</div>
		 </div>
	</a>

    </div>
    
    <div class="right_line2">
      	<a href="show.php?pid=ziyuan">
      		<div class="right_blog position_rel" v-on:mouseover="cover" v-on:mouseout="uncover">
      			<div class="dark_cover">
      			<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("ziyuan");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
      			</div>
      			<img src="./image/office.png" style="margin-top: 60px">
       			<div class="p3" style="margin-top: 16px">学习资源</div>
		 	</div>
		</a>
    <a href="show.php?pid=canguan">
    	<div class="right_data position_rel" v-on:mouseover="cover" v-on:mouseout="uncover">
    		<div class="dark_cover">
    			<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("canguan");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
    		</div>
      		<img src="./image/qiandao.png" style="margin-top: 50px">
      		<div class="p3" style="margin-top:10px">参观指南</div>
		 </div> 
	</a> 

    </div>
    
    <div class="right_line2">
    	<a href="show.php?pid=tongji">
    		<div class="right_train position_rel" v-on:mouseover="cover" v-on:mouseout="uncover">
    		<div class="dark_cover">
    			<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("tongji");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
    		</div>
      			<img src="./image/6.png" style="margin-top: 50px">
       			<div class="p3" style="margin-top:10px">数据统计</div>
		  	</div>
		</a>
      	<a href="show.php?pid=tiandi">
      		<div class="right_stu position_rel" v-on:mouseover="cover" v-on:mouseout="uncover">
      			<div class="dark_cover">
      				<?php
					$source->connectsql();
					$abstruct=$source->get_toparticle("tiandi");
					$abstruct=strip_tags($abstruct["content"]);
	  				echo substr($abstruct,0,300);
	  				echo "......";
		  		?>
      			</div>
      			<img src="./image/8.png" style="margin-top: 50px"><br>
      			<div class="p3" style="margin-top:10px">学生天地</div>
		  	</div>
		</a>         
    </div>       
   </div>
	 <!-- <div class='copyright'>版权所有</div>-->
   </div>
  </div>
</body>
</html>
