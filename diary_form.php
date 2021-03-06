<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.diary_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.diary_form.subject.focus();
          return;
      }
      if (!document.diary_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.diary_form.content.focus();
          return;
      }
      document.diary_form.submit();
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
                    alert('일기 작성은 로그인 후 이용해 주세요!');
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
	    		일기장 > 글 쓰기
		</h3>
	    <form name="diary_form" method="post" action="diary_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
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
				<li><button type="button" onclick="location.href='diary_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
