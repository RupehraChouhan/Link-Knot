<html>
	<head>
		<title>PHP</title>
	</head>
	<body>
	
	<?php

	$filename = 'image.jpg';
	$percent = 0.9;

	// Content type
	header('Content-Type: image/jpeg');

	// Get new dimensions
	list($width, $height) = getimagesize($filename);
	print($width);
	print($height);
	$new_width = $width * $percent;
	$new_height = $height * $percent;

	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	// Output
	imagejpeg($image_p, null, 100);
	?>
	</body>
</html>