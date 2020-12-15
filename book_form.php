<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.book_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.book_form.subject.focus();
          return;
      }
      if (!document.book_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.book_form.content.focus();
          return;
      }
      if (!document.book_form.author.value)
      {
          alert("지은이를 입력하세요!");    
          document.book_form.author.focus();
          return;
      }
      if (!document.book_form.publisher.value)
      {
          alert("출판사를 입력하세요!");    
          document.book_form.publisher.focus();
          return;
      }
      document.book_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header> 
    
    <?php
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    
    if ( !$userid )
    {
        echo("
                    <script>
                    alert('독서록 작성은 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }
    
    ?>
    
    
<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>
   	<div id="board_box">
	    <h3 id="board_title">
	    		독서록 > 글 쓰기
		</h3>
	    <form  name="book_form" method="post" action="book_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>
                 <li>
	    			<span class="col1">지은이 : </span>
	    			<span class="col2"><input name="author" type="text"></span>
	    		</li>
                 <li>
	    			<span class="col1">출판사 : </span>
	    			<span class="col2"><input name="publisher" type="text"></span>
	    		</li>
                <li>
                    <span class="col1">장르 : </span>
                    <span class="col2"><select name="genre">
                        <option selected>선택하세요
                        <option>가정
                        <option>건강
                        <option>경영/경제
                        <option>고전
                        <option>기술/공학
                        <option>만화
                        <option>사전
                        <option>소설
                        <option>시/에세이
                        <option>아동
                        <option>여행
                        <option>역사
                        <option>예체능
                        <option>외국어
                        <option>요리
                        <option>의학
                        <option>인문/철학
                        <option>자기계발
                        <option>자연과학
                        <option>정치/법률
                        <option>종교
                        <option>참고서
                        <option>취미/스포츠
                        <option>기타
                        </select>
                    </span>
                </li>
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
                <li>
					<span class="col1">즐겨찾기 : </span>
					<span class="col2"><select name="favorite">
                        <option selected>미설정
                        <option>설정
                        </select> </span>
				</li>
                <li>
					<span class="col1">공개 / 비공개 : </span>
					<span class="col2"><select name="public">
                        <option selected>비공개
                        <option>공개
                        </select> </span>
				</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
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
