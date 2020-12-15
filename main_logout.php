        <div id="main_img_bar">
            <img src="./img/main_img.png">
</div>
        <div id="main_content">
            <div id="public_di">
                <h4>최근 올라온 일기</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from diary where public like '공개' order by num desc limit 5";
    $result = mysqli_query($con, $sql);
                    

    if (!$result)
        echo "일기 DB 테이블이 생성 전이거나 아직 쓴 일기가 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
            $num = $row["num"];
?>
                <li>
                    <span><a href="diary_preview.php?num=<?=$num?>"><?=$row["subject"]?></a></span>
                    <span><?=$row["id"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
                </ul>
            </div>
            <div id="public_bo">
                <h4>최근 올라온 독후감</h4>
                <ul> 
<?php 
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from book_report where public like '공개' order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "독서록 DB 테이블이 생성 전이거나 아직 쓴 독후감이 없습니다!";
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
                    <span><?=$row["id"]?></span>
                    <span><?=$regist_day?></span>
                </li>  
<?php
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
</div>
       