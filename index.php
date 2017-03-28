<?php
	/*  
		//=============================================================================\\
		|===============================================================================|
	  	|=== * Author: Khalid Mohammad Sheet                                         ===|
	  	|=== * url: http://test.nseha.com/api/v1.0.0/create-image/test            	 ===|
		|=== * links:																 ===|
		|=== 	* facebook: https://fb.me/khalid.m.sheet 							 ===|
		|=== 	* twitter : https://twitter.com/progKhalid							 ===|
		|=== 	* linkedin: https://www.linkedin.com/in/khalid-m-sheet-a94413135/	 ===|
		|===============================================================================|
		\\=============================================================================//

	*/

	// get the width && height from the user with $_GET method
	$getWidth  = is_numeric($_GET['w']) ? intval(htmlentities(htmlspecialchars(strip_tags($_GET['w'])))) : NULL;
	$getHeight = is_numeric($_GET['h']) ? intval(htmlentities(htmlspecialchars(strip_tags($_GET['h'])))) : NULL;


	if (!isset($_GET['type']) && htmlspecialchars($_GET['type']) != 'json') {

		// check if the width, haight has a value or not and do somthing
		if (isset($getHeight) && isset($getWidth)) {

			// check if the height and with not equal to zero
			if ($getHeight != 0 && $getWidth != 0) {


				// start the funtion
				function image($width = 100, $height = 100) {

					// fonts information
					$fontWidth  = ($width / 2); // X Axis
					$fontHeight = ($height / 2); // Y Axis
					$fontSize   = ($fontHeight * $fontWidth / ($height + 10));

					// Image Colors
					$red   = rand(0, 255);
					$green = rand(0, 255);
					$blue  = rand(0, 255);

					// create image
					$image = imagecreate($width, $height);

					// fill image with random color using [ rand() ] function
					imagecolorallocate($image, $red, $green, $blue);

					// text color should be white :)
					$textColor = imagecolorallocate($image, 255, 255, 255);

					// Create a text with these options
					/*
					 * [1] - $image    = imagecreate() function.
					 * [2] - $fontSize = It's a very small algorithm that used the font width and height to calculate the font size
					 * [3] - 0 = angle of the font
					 * [4] - $fontWidth  = get the width of the image and divided by 2
					 * [5] - $fontHeight = get the height of the image and divided by 2
					 * [6] - $textColor  = function to generate a white font color
					 * [7] - font path
					 * [8] - font text [ random text with rand() function ]
					*/

					// delete the '//' to enable the text
					//imagettftext($image, $fontSize, 0, $fontWidth, $fontHeight, $textColor, 'fonts/arial.ttf', rand(0, 1000));

					// set contet type to png image with header() function
					header('Content-type: image/png');

					// export the image as png
					imagepng($image);

					// destroy this images
					imagedestroy($image);


					// end of create image function
				}

				// export as image
				echo "<img src='".image($getWidth, $getHeight)."' />";

			} else {

				echo "
					<center>
						<h1>You Should Give the image Width And Height !</h1>
						<h3>You can't give the Image ( 0 ) size</h3>
					</center>
				";
			}
		} else {
			echo "
				<center>
					<h1>You Should Give the image Width And Height !</h1>
				</center>
			";
		}

	} else {

		if (isset($_GET['h']) && isset($_GET['w'])) {
			// get the width && height from the user with $_GET method
			$getWidth  = is_numeric($_GET['w']) ? intval(htmlentities(htmlspecialchars(strip_tags($_GET['w'])))) : NULL;
			$getHeight = is_numeric($_GET['h']) ? intval(htmlentities(htmlspecialchars(strip_tags($_GET['h'])))) : NULL;

			// Image Colors
			$red   = rand(0, 255);
			$green = rand(0, 255);
			$blue  = rand(0, 255);

			$arrType =  [
				'image_width'  		=> $getWidth,
				'image_height' 		=> $getHeight,
				'image_red_color'   => $red, 
				'image_green_color' => $green, 
				'image_blue_color'  => $blue,
				'image_url'			=> 'http://test.nseha.com/api/v1.0.0/create-image/'.$getWidth.'/'.$getHeight.'/'
			];

			$jsonType = json_encode($arrType);

			header('Content-type: application/json');
			echo $jsonType;

		} else {
			header('Content-type: text/html');
			echo "<h1>Please Give us the height and width of the image</h1>";
		}
	}


?>
