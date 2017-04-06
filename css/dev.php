<?php
require(dirname(__FILE__)."/../config/config.php");
class source
{
	public function connectsql()
	{
		//require("../config/config.php");
		mysql_connect(MYSQL_IP,MYSQL_USER,MYSQL_PASSWD);
		mysql_query("use lab;");
	}
	public function add_article($title,$class,$content,$subclass)
	{
		date_default_timezone_set('PRC');
		$que="insert into lab_article set ";
		$t=time();
		$que.="title='".$title."',";
		$que.="content='".$content."',";
		$que.="class='".$class."',";
		if(!isset($subclass)&&$subclass!=""&&$subclass!=undefined)
			$que.="subclass='".$subclass."',";
		$que.="est_time='".date("Y-m-d",$t)."',";
		$que.="update_time='".date("Y-m-d",$t)."';";
		mysql_query($que);
	}
	//update_article($_GET["aid"],$_POST["title"],$_POST["content"])
	public function update_article($aid,$title,$content)
	{
		date_default_timezone_set('PRC');
		$que="update lab_article set ";
		$t=time();
		$que.="title='".$title."',";
		$que.="content='".$content."',";
		$que.="update_time='".date("Y-m-d",$t)."' ";
		$que.="where aid='".$aid."';";
		mysql_query($que);
	}
	public function get_article($aid)
	{
		return mysql_fetch_array(mysql_query("select * from lab_article where aid='".$aid."';"));
	}
	public function check($uid,$passwd)
	{
		$result=mysql_fetch_array(mysql_query("select * from lab_admin;"));
		if($uid==$result["uid"]&&md5($passwd)==$result["passwd"])
			return 1;
		else
			return 0;
		
	}
	public function getaid($title)//future bug
	{
		$result=mysql_fetch_array(mysql_query("select * from lab_article where title='".$title."';"));
		return $result["aid"];
	}
	public function alist($class)
	{
		$result=mysql_query("select * from lab_article where class='".$class."' order by aid desc;");
		for($i=0;$i<mysql_num_rows($result);$i++)
		{
			$str=mysql_fetch_array($result);
			$ans[$i]=$str;
		}
		return $ans;
	}
	public function sub_alist($class,$subclass)
	{
		$result=mysql_query("select * from lab_article where class='".$class."' and subclass='".$subclass."' order by aid desc;");
		for($i=0;$i<mysql_num_rows($result);$i++)
		{
			$str=mysql_fetch_array($result);
			$ans[$i]=$str;
		}
		return $ans;
	}
	public function admin_alist()
	{
		$result=mysql_query("select * from lab_article order by aid desc;");
		for($i=0;$i<mysql_num_rows($result);$i++)
		{
			$str=mysql_fetch_array($result);
			print_r($str);
		}
	}
	public function get_toparticle($class)
	{
		$result=mysql_query("select * from lab_article where class='".$class." ' order by aid desc;");
		return mysql_fetch_array($result);
	}
	public function get_subclass($class,$subclass)
	{
		$result=mysql_fetch_array(mysql_query("select * from lab_class where pid='".$class."' and subclass='".$subclass."';"));
		return $result["value"]==""?"article":$result["value"];
	}
	public function get_subbanner($class,$subclass)
	{
		$result=mysql_fetch_array(mysql_query("select * from lab_class where pid='".$class."' and subclass='".$subclass."';"));
		return $result["tmp"]==""?"banner.jpg":$result["tmp"];
	}
	
}
class parts
{
	public function banner()
	{
		echo "
		 <div class='banner'>
    <div class='banner_image'><img src='./image/bjtu.png' width='120' height='120'></div>
	 <div class='banner_head'>";
		if($_COOKIE["user"]=="admin")
			echo "<a href='./admin.php'>&nbsp;&nbsp;&nbsp;&nbsp;管理员&nbsp;&nbsp;<img src='./image/account.png' width='26' height='25' ></a>";
		echo "&nbsp;<div class='p1' style='float:left'>威海校区 |  公众号&nbsp;&nbsp;<img src='./image/search.png' width='24' height='26' ></div></div>
	 <div class='banner_text'>
   <br>
    <div class='p4'>北京交通大学国家级物理实验教学中心(威海)</div><br>
     <div class='p5'>&nbsp;Beijing Jiaotong University National Center for Physics Experiment Teaching</div></div>
    
   </div>
		";
	}
	public function pagetitle($pid)//左侧正方形内的页面类别标题
	{
		if($pid=="tiandi")echo "学生天地";
					else if($pid=="tongji")echo "数据统计";
					else if($pid=="rizhi")echo "表格下载";
					else if($pid=="time")echo "开放时间";
					else if($pid=="peixun")echo "本科教学";
					else if($pid=="ziyuan")echo "学习资源";
					else if($pid=="lianxi")echo "联系我们";
					else if($pid=="canguan")echo "参观指南";
					else if($pid=="jiaoyu")echo "科普教育";
					else if($pid=="info")echo "实验中心概述";
					else if($pid=="news")echo "新闻";
					else echo "ERROR!";
	}
	public function login_form()
	{
		echo "
			<div class='logininfo'>
			<form method='post' action='#'>
				<div class='formline'>
					<div class='formline_left'>用户名</div>
					<div class='formline_right'>
						<input type='text' name='uid'>
					</div>
				</div>
				<div class='formline'>
					<div class='formline_left'>密码</div>
					<div class='formline_right'>
						<input type='password' name='passwd'>
					</div>
				</div>
				<div class='formline'>
					<input type='submit' class='loginbutton' value='登录'>
				</div>
				
				
				
			</form>
			</div>
		";
	}
	public function login_banner()
	{
		echo "
		<div class='loginbanner'>
				<img src='image/bjtu_banner.jpg' style='width:400px;height:120px;'>
			</div>
		";
	}
	public function form_title()
	{
		echo "<div class='formtitle'>物理实验室管理系统</div>";
	}
	public function admin_form()//left part
	{
		echo "
		<div class='logininfo'>
			<form method='post' action='#'>
				<div class='formline'>
					<div class='formline_left'>标题</div>
					<div class='formline_right'>
						<input type='text' name='title'>
					</div>
				</div>
				<div class='formline'>
					<div class='formline_left'>分类</div>
					<div class='formline_right'>
						<select name='class'>
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
				</div>
				<div class='formline'>
					<input type='submit' class='loginbutton' value='发布'>
				</div>
				
			</div>
		";
	}
}
?>