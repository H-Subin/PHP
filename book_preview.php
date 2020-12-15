<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>
   	<div id="board_box">
	    <h3 class="title">
			독서록 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];

	$con = mysqli_connect("localhost", "root", "", "sample");
	$sql = "select * from book_report where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
    $author	    = $row["author"];
    $publisher  = $row["publisher"];
    $favorite	= $row["favorite"];	
    $public     = $row["public"];
    $genre      = $row["genre"];
	

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

?>		
	    <ul id="book_view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$genre?> | <?=$regist_day?></span>
            </li>
            <li>
                <span class="col3">지은이 : <?=$author?>  |  출판사 : <?=$publisher?></span>
            </li>
			<li>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='index.php'">메인으로</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
