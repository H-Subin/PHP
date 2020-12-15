<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>my diary&amp;book report</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/search.css">    
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
	    		도서정보검색
		</h3>
        <div id="search"> <!-- 1번째 줄 -->
            <div id="search_form1"> <!-- 알라딘 -->
                <img src="img/aladin.png" class="col1">
                <form method=get action="https://www.aladin.co.kr/search/wsearchresult.aspx" target="_blank">
                <input name="SearchWord" type="text" class="col2" autocomplete='off'>
                <input type="submit" value="검색" class="col3">
                </form>
            </div>
            <div id="search_form2"> <!-- 네이버 -->
                <img src="img/naver.png" class="col1">
                <form method=get action="https://search.naver.com/search.naver" target="_blank">
                <input name="query" type="text" class="col2" autocomplete='off'>
                <input type="submit" value="검색" class="col3">
                </form>
            </div>
        </div>
        <div id="search"> <!-- 2번째 줄 -->
            <div id="search_form1"> <!-- 교보문고 -->
                <img src="img/kyobo.png" class="col1">
                <form method=get action="https://search.kyobobook.co.kr/web/search" target="_blank">
                <input name="vPstrKeyWord" type="text" class="col2" autocomplete='off'>
                <input type="submit" value="검색" class="col3">
                </form>
            </div>
            <div id="search_form2"> <!-- 구글 -->
                <img src="img/google.png" class="col1">
                <form method=get action="https://www.google.com/search" target="_blank">
                <input name="q" type="text" class="col2" autocomplete='off'>
                <input type="submit" value="검색" class="col3">
                </form>
            </div>
        </div>
        <div id="search"> <!-- 3번째 줄 -->
            <div id="search_form1"> <!-- 영풍문고 -->
                <img src="img/ypbooks.png" class="col1">
                <form method=get action="https://www.ypbooks.co.kr/search.yp" target="_blank">
                <input name="query" type="text" class="col2" autocomplete='off'>
                <input type="submit" value="검색" class="col3">
                </form>
            </div> 
            <div id="search_form2"> <!-- 다음-->
                <img src="img/daum.png" class="col1">
                <form method=get action="https://search.daum.net/search" target="_blank">
                <input name="q" type="text" class="col2" autocomplete='off'>
                <input type="submit" value="검색" class="col3">
                </form>
            </div>
        </div>
        </div>
        
	<footer>
    	<?php include "footer.php";?>
    </footer>
        </section> 
</body>
</html>
