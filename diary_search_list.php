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
<?php
    if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;
           
    $keyword   = $_POST["keyword"];
    
        ?>
	    <h3>
	    	제목 검색 > '<?= $keyword ?>'
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">첨부</span>
					<span class="col4">작성일</span>
                    <span class="col5">즐겨찾기</span>
                    <span class="col6">공개여부</span>
					
				</li>    
        
<?php

    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from diary where subject like '%$keyword%' and id='$userid' order by num desc";
       
	$result = mysqli_query($con, $sql);
        
    $total_record = mysqli_num_rows($result);
            
    $scale = 10;
         
    // 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	  $num         = $row["num"];
	  $id          = $row["id"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];
      $favorite    = $row["favorite"];
      $public      = $row["public"];
      if ($row["file_name"])
      	$file_image = "<img src='./img/file.gif'>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="diary_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
					<span class="col3"><?=$file_image?></span>
					<span class="col4"><?=$regist_day?></span>
                    <span class="col5"><img style="cursor:pointer" <?=($favorite=="설정")?"src='./img/star_yl.png'":"src='./img/star_bl.png'";?>></span>
                    <span class="col6"><?=$public?></span>
				</li>	


<?php
          $number--;
    }
   mysqli_close($con);
        
        
?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='diary_list.php?page=$new_page'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='diary_list.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='diary_list.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
        </ul>
        <form  name="board_form" method="post" action="diary_search_list.php">
			<ul class="buttons">
                <li><input name="keyword" type="search" placeholder="제목 검색"></li>
                <li><button onclick="location.herf='diary_search_list'">검색</button></li>
				<li><button onclick="location.href='diary_list.php'">목록</button></li>
				<li>
<?php 
    if($userid) {
?>
					<button onclick="location.href='diary_form.php'">글쓰기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
    }
	
?>
                    
                </li>
			</ul>
        </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>