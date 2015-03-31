<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>UKi's Mayhem</title>


<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>



<body>


<?
require_once "../inc/db.php";
$db = connect_db();
if( $db == false )	die;
?>

<pre>
코퍼스 종류
- 단일어
  - 문서레벨
  - 문단레벨?
  - 문장레벨

- 병렬
  * 병렬은 정렬 정보가 아주 중요하니 쌍으로 함께 저장하는 것을 원칙으로 함.
</pre>

<?
require_once "../inc/os.php";
$files = array();
listFolderFiles( "/mnt/disk-work/corpus/knovel", $files );
for( $i=0; $i<count($files); $i++ ) {
	echo $files[$i];

	$cont = file_get_contents( $files[$i] );
//	$enc = mb_detect_encoding( $cont , "auto" );
//	echo  "  " . $enc . "<BR>";
//	break;
//	if( $i> 2 )	break;
	echo "<BR>";
	if( $i> 10 )	break;;
}
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
