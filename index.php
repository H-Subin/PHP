<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
        <?php 
    
         if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
         else $userid = "";
    
         if ( !$userid )
         {
            include "main_logout.php";
         }else
            include "main_login.php";
    
    
    ?>

	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
