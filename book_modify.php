<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $favorite = $_POST["favorite"];
    $public = $_POST["public"];
    $genre = $_POST["genre"];
          
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "update book_report set subject='$subject', content='$content', author='$author', publisher='$publisher', favorite='$favorite', public='$public' , genre='$genre' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'book_list.php?page=$page';
	      </script>
	  ";
?>