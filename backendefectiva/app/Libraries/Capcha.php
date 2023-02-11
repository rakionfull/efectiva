<?php namespace App\Libraries;
class Capcha
{

  public function __construct()
  {

  }

//generamos la imagen

public function CreaCaptcha($img_width,$img_height,$expiration){

    // primero removemos los captchas vencido
    $img_id='';
    $now = microtime(TRUE);
    $img_filename = $now.'.png';
    $img_path =  '../public/captcha/';
    $current_dir = @opendir($img_path);
		while ($filename = @readdir($current_dir))
		{
			if (in_array(substr($filename, -4), array('.jpg', '.png'))
				&& (str_replace(array('.jpg', '.png'), '', $filename) + $expiration) < $now)
			{
				@unlink($img_path.$filename);
			}
		}

	@closedir($current_dir);
    function generate_string($input, $strength = 6) {
   
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
      
        return $random_string;
    }
    $image = imagecreatetruecolor(200, 50);
    imageantialias($image, true);
 
    $colors = [];
    $silver = rand(170, 175);
    // $red = rand(125, 175);
    // $green = rand(125, 175);
    // $blue = rand(125, 175);
     
    for($i = 0; $i < 5; $i++) {
    //   $colors[] = imagecolorallocate($image, $silver - 20*$i, $silver - 20*$i, $silver - 20*$i);
      $colors[] = imagecolorallocate($image, $silver - 20*$i, $silver - 20*$i, $silver - 20*$i);
    }
     
    imagefill($image, 0, 0, $colors[0]);
     
    for($i = 0; $i < 10; $i++) {
      imagesetthickness($image, rand(2, 10));
      $rect_color = $colors[rand(1, 4)];
      imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
    }

    $black = imagecolorallocate($image, 0,0,0);
    $white = imagecolorallocate($image, 255, 255, 255);
    $textcolors = [$black, $white];
    
    $fonts = [dirname(__FILE__).'\fonts\Ubuntu-BoldItalic.ttf', dirname(__FILE__).'\fonts\Merriweather-BoldItalic.ttf', dirname(__FILE__).'\fonts\PlayfairDisplay-BoldItalic.ttf'];
 
    $string_length = 6;
    $permitted_chars  = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha_string = generate_string($permitted_chars, $string_length);
   
    for($i = 0; $i < $string_length; $i++) {
    $letter_space = 170/$string_length;
    $initial = 15;
   
    imagettftext($image, 20, rand(-15, 15), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
    }
    
    // header('Content-type: image/png');
    imagepng($image,$img_path.$img_filename);
    imagedestroy($image);
    // $img_width=150;
    // $img_height=30;
    $img_new_path='http://localhost/efectiva/backendefectiva/public/captcha/';
    $img = '<img '.($img_id === '' ? '' : 'id="'.$img_id.'"').' src="'.$img_new_path.$img_filename.'" style="width: '.$img_width.'px; height: '.$img_height .'px; border: 0;" alt=" " />';
    return array('word' => $captcha_string, 'time' => $now, 'image' => $img, 'filename' => $img_filename);
    // return $output_png;
    }
}