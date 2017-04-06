<?php
require("./global/dev.php");
$source=new source;
$parts=new parts;
if($_COOKIE["user"]=="admin")
{
    //header("location:./admin.php");
    print_r($_COOKIE);
}
else
{
    if(isset($_POST["uid"])&&isset($_POST["passwd"]))
    {
        $source->connectsql();
        if($source->check($_POST["uid"],$_POST["passwd"])==1)
        {
            setcookie("user","admin");
            header("location:./admin.php");
        }
        else
            echo "<script>alert('Check Your Password!');</script>";
        //check
    }
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>物理实验室管理系统</title>
        <link rel="stylesheet" href="./css/SemanticUI/semantic.css" media="screen" title="no title" charset="utf-8">
  <!--       <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="./login/admin.css">

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
                    <a href="./index.php" style="color:#ff695e;">or Exit</a>
                </h4>

                <form class="ui form" action="#" method="post">
                    <div class="field">
                        <input type="text" name="uid" placeholder="usernsame">
                    </div>

                  <div class="field">
                      <input type="password" name="passwd" placeholder="password">
                  </div>

                        

                  <button class="ui inverted red circular right floated button" type="submit" >Done</button>
                </form>
            </div>
        </div>
    </body>
</html>
