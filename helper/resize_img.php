<?php

function resize_img($file, $width, $height)
{
    global $error;
    $size = getimagesize($file);
    
    if ($size) {
        if ($size['mime'] == 'image/jpg' || $size['mime'] == 'image/jpeg' || $size['mime'] == 'image/png' || $size['mime'] == 'image/gif') {
            //OUVERTURE DE L'IMAGE ORIGINALE
            $img_big = imagecreatefromjpeg($file); // On ouvre l'image d'origine
            $img_new = imagecreate($width, $height);
            
            //CREATION DE LA MINIATURE
            $img_small = imagecreatetruecolor($width, $height) or $img_small = imagecreate($width, $height);
            
            //COPIE DE L'IMAGE REDIMENSIONNEE
            imagecopyresized($img_small, $img_big, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            imagejpeg($img_small, $file);
        }
    }
}