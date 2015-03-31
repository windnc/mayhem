<?

function connect_db()
{
	require_once "db_setting.php";
	$db = @mysql_connect( $db_host, $db_id, $db_passwd );
	if( !$db ) {
		echo "<h3>ERROR: Fail to connect db: $db_id @ $db_host</h3>";
		return false;
	}
	@mysql_query("SET NAMES 'utf8'");

	if( !@mysql_select_db( "mayhem" ) ) {
		echo "<h3>ERROR: Fail to select mayhem db</h3>";
		return false;
	}

	return $db;
}

function assert_mono_table( $db, $tbl_name ) {
	$query = "CREATE TABLE IF NOT EXISTS `" . $tbl_name. "` ";
	$query .= "( `id` int NOT NULL AUTO_INCREMENT, `lang` char(2) NOT NULL, `filename` varchar(255) NOT NULL, `auto-enc` varchar (12), `org` text NOT NULL, PRIMARY KEY (`id`) )  CHARSET=utf8 COLLATE=utf8_bin; ";
	$res = mysql_query( $query);
	if( !$res ) {
		echo mysql_error() . "\n";
		echo "$query\n";
		echo $db . "\n";
		die;
	}
}


?>
