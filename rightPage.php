<?php
require("./css/dev.php");
$source=new source;
$source->connectsql();
if($_POST["editTitle"]&&$_POST["editContent"]&&$_POST["editAid"])
{
    $source->update_article($_POST["editAid"],$_POST["editTitle"],$_POST["editContent"]);
}
$color=["blue","red","teal","orange","green","pink","brown"];
define("MainClass",$_GET["pid"]);
define("SubClass",$_GET["subclass"]);
if(SubClass==""||SubClass==undefined)
{
	$articleSet=$source->alist(MainClass);
}
else
{
	$articleSet=$source->sub_alist(MainClass,SubClass);
}
?>
<html>
<head>

	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/rightPage.css">
<link rel="stylesheet" type="text/css" href="css/SemanticUI/semantic.css">
<script type="text/javascript" src="css/script/readmore.js"></script>
<body>
	<div id="darkCover">
		<i class="remove circle outline inverted huge link icon" onclick="goback()"></i>
	</div>
    <form class="ui form" action="#" method="post">
    	<div class="ui segment padded fixedreading" id="reader">
    			<h1 id="lab_title" class="ui header">
                </h1>
                <div id="icon_container">
                    <i class="edit icon link large" onclick="edit()"></i>
                </div>
                <div id="lab_content"></div>
    	</div>
    </form>
	<div class="ui inverted vertical segment">
    	<div class="ui image">
            <img src="css/newImg/<?php echo $source->get_subbanner(MainClass,SubClass) ?>" alt="" />
        </div>
    </div>
    <div class="ui  vertical  segment">
    <?php
    for($i=0;$i<count($articleSet);$i++)
    {
    	echo "<div class='ui container segment'>";
    	echo 	"<div class='ui ".$color[$articleSet[$i]["subclass"]]." right ribbon label'>
                ".$source->get_subclass(MainClass,$articleSet[$i]["subclass"])."
            	</div>";
        echo "<h1 class='ui header'>".$articleSet[$i]["title"]."</h1>";
        echo 	"<p>".strip_tags(substr($articleSet[$i]["content"], 0, 120))."
        		</p>";
        echo "<button type='button' name='button' class='ui inverted blue button' onclick='readmore(".json_encode($articleSet[$i]).")'>Read more</button>";
        echo "</div>";
    }
    ?>
    </div>
    <div class="ui inverted  vertical very padded  segment">
        Developed by OOer® Following the  MIT License.
    </div>
</body>
</html>