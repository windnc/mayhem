<?

function listFolderFiles($root, &$files ) {
	$ffs = scandir($root);
	foreach($ffs as $ff){
		if($ff != '.' && $ff != '..'){
			if(is_dir($root.'/'.$ff)) {
				listFolderFiles($root.'/'.$ff, $files );
			}
			else {
				$files[] =  $root . "/" . $ff;
			}
		}
	}
}
?>
