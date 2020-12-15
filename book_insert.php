<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";


    $subject    = $_POST["subject"];
    $content    = $_POST["content"];
    $author     = $_POST["author"];
    $publisher  = $_POST["publisher"];
    $genre      = $_POST["genre"];
    $favorite   = $_POST["favorite"];
    $public     = $_POST["public"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장


	$con = mysqli_connect("localhost", "root", "", "sample");

	$sql = "insert into book_report (id, name, subject, content, regist_day, author, publisher, genre, favorite, public) ";
	$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', '$author', '$publisher', '$genre', '$favorite', '$public' ";
    $sql .= ")";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'book_list.php';
	   </script>
	";
?>

  
