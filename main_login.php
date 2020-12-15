        <div id="main_img_bar">
            <img src="./img/main_img.png">
</div>
        <div id="main_content">
            <div id="private_di">
                <h4>일기 즐겨찾기</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from diary where favorite like '설정' and id='$userid' order by num desc ";
    $result = mysqli_query($con, $sql);
    

    if (!$result)
        echo "일기 DB 테이블(board)이 생성 전이거나 아직 쓴 일기가 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
            $num = $row["num"];
?>
                <li>
                    <span><a href="diary_preview.php?num=<?=$num?>"><?=$row["subject"]?></a></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
                </ul>
            </div>
            <div id="private_bo">
                <h4>독후감 즐겨찾기</h4>
                <ul> 
<!-- 포인트 랭킹 표시하기 -->
<?php 
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from book_report where favorite like '설정' and id='$userid' order by num desc ";
    $result = mysqli_query($con, $sql);
    


    if (!$result)
        echo "독서록 DB 테이블(board)이 생성 전이거나 아직 쓴 독후감이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
            $num = $row["num"];
?>
                <li>
                    <span><a href="book_preview.php?num=<?=$num?>"><?=$row["subject"]?></a></span>
                    <span><?=$row["genre"]?></span>
                    <span><?=$regist_day?></span>
                </li>  
<?php
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
       