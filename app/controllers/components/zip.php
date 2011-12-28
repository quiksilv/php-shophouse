<?php

class ZipComponent extends Object {
	var $controller;
	var $components = array('Image');
	function startup(&$controller) {
		$this->controller = &$controller;
	}
	function upload($data) {
		if(is_uploaded_file($data['archive']['tmp_name']) ) {
			if($data['archive']['type'] != "application/zip") {
				return 0; //fail
			}
			move_uploaded_file($data['archive']['tmp_name'], 'files/tmp/temp.zip');
			chmod('files/tmp/temp.zip', 0755);
			if($this->unzip('files/tmp/temp.zip') ) {
				$files = $this->getZipFilenames('files/tmp/temp.zip');
				$published = ($data['published'] == '1') ? 1 : 0;
				$i = 0;
				foreach($files as $file) {
					//move from files/tmp folder to files/products folder
					$attr = getimagesize('files/tmp/' . $file);
					$filename = md5($i . time() ) . '.' . substr($attr['mime'], strpos($attr['mime'], '/') + 1 );
					rename('files/tmp/' . $file, 'files/products/' . $filename);
					$object['Product'][$i]['parent_id'] = $data['parent_id'];
					$object['Product'][$i]['reference_number'] = $file;
					$object['Product'][$i]['name'] = 'undefined';
					$object['Product'][$i]['description'] = 'undefined';
					$object['Product'][$i]['price'] = 0;
					$object['Product'][$i]['published'] = $published;
					
					$image['name'] = $filename;
					$image['type'] = $attr['mime'];
					$image['size'] = filesize('files/products/' . $filename);
					$object['Product'][$i]['image_id'] = $this->Image->save($image);
					$i++;
				}
				return $object;
			}
		}
	}
	//note: must not have any folders in the zip file
	function unzip($filename) {
		$zip = new ZipArchive;
		if($res = $zip->open($filename) ) {
			$zip->extractTo('files/tmp/');
			$zip->close();
			return 1;
		} else {
			return 0;
		}
	}
	function getZipFilenames($filename) {
		$zip = new ZipArchive;
		if($zip->open($filename) ) {
			for($i = 0; $i < $zip->numFiles; $i++) {
				if(substr($zip->getNameIndex($i), -1) != "/" ) //check for directories
				        $files[] = $zip->getNameIndex($i);
			} 		
		}
		return $files;
	}
	function clean($filename) {

	}
}

?>
