#!/usr/bin/php
<?
	if( count( $argv ) != 4 ) {
		echo "usage: " . $argv[0]. " root-dir lang label\n";
		die;
	}
	require_once "../inc/os.php";
	require_once "../inc/db.php";

	$db = connect_db();
	if( !$db ) {
		die;
	}


	$root_dir = $argv[1];
	$lang = $argv[2];
	$tbl_name = $argv[3];
	$files = array();
	$enc_list = array();
	listFolderFiles( $root_dir, $files );
	echo "files: " . number_format( count($files ) ) . "\n";
	$byte = 0;

	assert_mono_table( $db, $tbl_name );
	for( $i=0; $i<count($files); $i++ ) {
		if( $i %10 == 0 ) {
			echo "\r" . $i;
		}

		$cont = file_get_contents( $files[$i] );
		$cont = str_replace("\r", "", $cont);
		$cont = trim( $cont );

		$org_enc = mysql_escape_string( $cont );
		$fn_enc = mysql_escape_string( $files[$i]);
		$query  = "INSERT INTO $tbl_name ( `lang`, `auto-enc`, `filename`, `org` ) VALUES ( '$lang', '$enc', '$fn_enc', '$org_enc' );";
		$res = mysql_query( $query );
		if( !$res ) {
			echo "error\n$query\n";
			die;
		}

		$byte += strlen( $cont );
	}
	echo "\r" . $i . "\n";
	echo "total size: " . number_format( $byte ) . " bytes\n";

?>
