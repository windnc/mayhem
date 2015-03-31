#!/usr/bin/php
<?
	if( count( $argv ) != 2 ) {
		echo "usage: " . $argv[0]. " root-dir\n";
		die;
	}

	$root_dir = $argv[1];

	require_once "../../inc/os.php";
	$files = array();
	$enc_list = array();
	listFolderFiles( $root_dir, $files );
	echo "files: " . number_format( count($files ) ) . "\n";
	$byte = 0;
	for( $i=0; $i<count($files); $i++ ) {
		$cont = file_get_contents( $files[$i] );
		$enc = mb_detect_encoding( $cont, "auto" );

		if( isset( $enc_list[$enc] ) ) {
			$enc_list[ $enc ]++;
		}
		else {
			$enc_list[ $enc ] = 1;
		}
		$byte += strlen( $cont );
	}
	echo "total size: " . number_format( $byte ) . " bytes\n";
	print_r( $enc_list );
?>
