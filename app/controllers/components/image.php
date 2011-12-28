<?php
/*
 *
 */
App::import('Model', 'Image');
class ImageComponent extends Object {
	var $controller;
	var $Image;
	function startup(&$controller) {
		$this->controller = &$controller;
		$this->Image = new Image();
	}
	function upload($data) {
		if(is_uploaded_file($data['tmp_name']) ) {
			$data['name'] = md5(time() ) . '.' . substr($data['type'], strpos($data['type'], '/') + 1 );
			move_uploaded_file($data['tmp_name'], 'files/products/' . $data['name']);
			return $this->save($data);
		} else {
			return 0;
		}
	}
	function save($data) {
		$this->Image->create();
		$this->Image->save($data);
		$this->resize('files/products/' . $data['name'], 'files/products/thumbnails/' . $data['name'], 71);
		$this->resize('files/products/' . $data['name'], 'files/products/optimal/' . $data['name'], 223);
		return $this->Image->id;
	}
	/**
	* Resize image from source and places it in the destination
	* @params string $source The relative path to the source file
	* @params string $destination The relative path to write the destination file
	* @params int $thumbwidth Resize the source file to the specified width in pixels
	*/
	function resize($source, $destination, $thumbWidth = 71) {
		$size = getimagesize($source);
		if(empty($size) ) {
			echo "Unable to create thumbnail for $source \r\n";
			$this->log("Unable to create thumbnail for $source", 'activity');
		}
		if($size['mime']=="image/jpeg") {
			// load image and get image size
			$img = imagecreatefromjpeg($source);
			$width = imagesx( $img );
			$height = imagesy( $img );

			// calculate thumbnail size
			$new_width = $thumbWidth;
			$new_height = floor( $height * ( $thumbWidth / $width ) );

			// create a new temporary image
			$tmp_img = imagecreatetruecolor( $new_width, $new_height );

			// copy and resize old image into new image
			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

			// save thumbnail into a file
			imagejpeg( $tmp_img, $destination);
			$this->log('JPEG file resized at ' . $destination. 'activity');
		} else if($size['mime'] == "image/png") {
			// get image size of img
			$x = getimagesize($source);
			// image width
			$width = $x[0];
			// image height
			$height = $x[1];
			$new_width = $thumbWidth;
			$new_height = floor( $height * ( $thumbWidth / $width ) );
			$img = imagecreatefrompng($source); //  or PNG Image
			// Create the resized image destination
			$tmp_img = imagecreatetruecolor ($new_width, $new_height);
			// This will make it transparent
			imagesavealpha($tmp_img, true);
			imagefill($tmp_img, 0, 0, imagecolorallocatealpha($tmp_img, 0, 0, 0, 127) );
			imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			// Output resized image
			imagepng($tmp_img, $destination);
			$this->log('PNG file resized at ' . $destination, 'activity');
		} else if($size['mime'] == "image/gif") {
			// get image size of img
			$x = getimagesize($source);
			// image width
			$width = $x[0];
			// image height
			$height = $x[1];
			$new_width = $thumbWidth;
			$new_height = floor( $height * ( $thumbWidth / $width ) );

			$img = imagecreatefromgif(source); // or GIF Image
			// Create the resized image destination
			$tmp_img = imagecreatetruecolor ($new_width, $new_height);
			imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			// Output resized image
			imagegif($tmp_img, $destination);
			$this->log('GIF file resized at ' . $destination, 'activity');
		}	
	}
        function validImage($file) {
                $valid = false;
                $data  = getimagesize($file);
                if(!empty($data) ) {
                        $valid = true;
                }
                return $valid;
        }

}
?>
