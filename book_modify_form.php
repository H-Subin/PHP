<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.book_modify_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.book_modify_form.subject.focus();
          return;
      }
      if (!document.book_modify_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.book_modify_form.content.focus();
          return;
      }
      if (!document.book_modify_form.author.value)
      {
          alert("지은이를 입력하세요!");    
          document.book_modify_form.author.focus();
          return;
      }
      if (!document.book_modify_form.publisher.value)
      {
          alert("출판사를 입력하세요!");    
          document.book_modify_form.publisher.focus();
          return;
      }
      document.book_modify_form.submit();
   }
    
    
    
    
</script>
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
	    <h3 id="board_title">
	    		독서록 > 글 수정하기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "root", "", "sample");
	$sql = "select * from book_report where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$subject    = $row["subject"];
	$content    = $row["content"];
    $author     = $row["author"];
	$publisher  = $row["publisher"];
    $favorite   = $row["favorite"];
    $public     = $row["public"];
    $genre      = $row["genre"];

?>
	    <form  name="book_modify_form" method="post" action="book_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>
                 <li>
	    			<span class="col1">지은이 : </span>
	    			<span class="col2"><input name="author" type="text" value="<?=$author?>"></span>
	    		</li>
                 <li>
	    			<span class="col1">출판사 : </span>
	    			<span class="col2"><input name="publisher" type="text" value="<?=$publisher?>"></span>
	    		</li>
                <li>
                    <span class="col1">장르 : </span>
                    <span class="col2"><select name="genre">
                    
                        <option <?=($genre=="선택하세요")?"selected":"";?>>선택하세요
                        <option <?=($genre=="가정")?"selected":"";?>>가정
                        <option <?=($genre=="건강")?"selected":"";?>>건강
                        <option <?=($genre=="경영/경제")?"selected":"";?>>경영/경제
                        <option <?=($genre=="고전")?"selected":"";?>>고전
                        <option <?=($genre=="기술/공학")?"selected":"";?>>기술/공학
                        <option <?=($genre=="만화")?"selected":"";?>>만화
                        <option <?=($genre=="사전")?"selected":"";?>>사전
                        <option <?=($genre=="소설")?"selected":"";?>>소설
                        <option <?=($genre=="시/에세이")?"selected":"";?>>시/에세이
                        <option <?=($genre=="아동")?"selected":"";?>>아동
                        <option <?=($genre=="여행")?"selected":"";?>>여행
                        <option <?=($genre=="역사")?"selected":"";?>>역사
                        <option <?=($genre=="예체능")?"selected":"";?>>예체능
                        <option <?=($genre=="외국어")?"selected":"";?>>외국어
                        <option <?=($genre=="요리")?"selected":"";?>>요리
                        <option <?=($genre=="의학")?"selected":"";?>>의학
                        <option <?=($genre=="인문/철학")?"selected":"";?>>인문/철학
                        <option <?=($genre=="자기계발")?"selected":"";?>>자기계발
                        <option <?=($genre=="자연과학")?"selected":"";?>>자연과학
                        <option <?=($genre=="정치/법률")?"selected":"";?>>정치/법률
                        <option <?=($genre=="종교")?"selected":"";?>>종교
                        <option <?=($genre=="참고서")?"selected":"";?>>참고서
                        <option <?=($genre=="취미/스포츠")?"selected":"";?>>취미/스포츠
                        <option <?=($genre=="기타")?"selected":"";?>>기타
                        
                        </select>
                    </span>
                </li>
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
                <li>
					<span class="col1">즐겨찾기 : </span>
					<span class="col2"><select name="favorite">
                        <?php
                            if($favorite == "미설정"){ ?>
                                <option selected>미설정
                                <option>설정
                            <?php }else{ ?>
                                <option>미설정
                                <option selected>설정
                            <?php } ?>
                        </select> </span>
				</li>
                <li>
					<span class="col1">공개 / 비공개 : </span>
					<span class="col2"><select name="public">
                        <?php
                            if($public == "비공개"){ ?>
                                <option selected>비공개
                                <option>공개
                        <?php }else{ ?>
                                <option>비공개
                                <option selected>공개
                        <?php   }
                        ?>
                        </select> </span>
				</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='book_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
