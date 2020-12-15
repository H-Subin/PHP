<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.diary_modify_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.diary_modify_form.subject.focus();
          return;
      }
      if (!document.diary_modify_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.diary_modify_form.content.focus();
          return;
      }
      document.diary_modify_form.submit();
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
	    		일기장 > 글 수정하기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "root", "", "sample");
	$sql = "select * from diary where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];
	$favorite   = $row["favorite"];
	$public     = $row["public"];
    
?>
	    <form  name="diary_modify_form" method="post" action="diary_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
                 <li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 변경 : </span>
			        <span class="col2"><input type="file" name="upfile"></span>
                    <span>현재 파일 : <?=$file_name?></span>
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
