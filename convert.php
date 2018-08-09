<?php

//try {
    $width = $_POST["width"]*1;
    $height = $_POST["height"]*1;
    $datapin = $_POST["datapin"];
    $animationfps = $_POST["animationfps"]*1;
    $spritesheetfile = $_FILES["spritesheetfile"]["tmp_name"];
    $spritesheetfilename = $_FILES["spritesheetfile"]["name"];

    if ($width <= 0 || $height <= 0) throw new Exception("Dimentions need to be positive numbers bigger than 0!");
    if ($animationfps <= 0) throw new Exception("Frames per second need to be a positive number bigger than 0!");

    $code = "void loop() {\n";

    $spritesheet = imagecreatefrompng($spritesheetfile);
    list($spritesheetWidth, $spritesheetHeight) = getimagesize($spritesheetfile);
    if ($spritesheetWidth != $width) throw new Exception("Invalid spritesheet width!");
    if ($spritesheetHeight%$height !== 0) throw new Exception("Invalid spritesheet height! Height must be multiplier of given height");

    $frameCount = $spritesheetHeight/$height;
    $lastFrame = imagecreate($width, $height);
    imagecolorallocate( $lastFrame, 0, 0, 0);
    
    for ($frame = 0; $frame < $frameCount; $frame++) {
        $offset = $frame*$height;
        $code .= "\t// Frame #".($frame+1)."\n";
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                if ($offset == 0 /* <- if this is the first frame */ ||
                    /* last frame -> */ imagecolorat($spritesheet, $x, $y+$offset-$height) !==
                    imagecolorat($spritesheet, $x, $y+$offset)) {
                    $i = $width*$y + $x;
                    $rgb = imagecolorat($spritesheet, $x, $y+$offset);
                    $r = ($rgb >> 16) & 0xFF;
                    $g = ($rgb >> 8) & 0xFF;
                    $b = $rgb & 0xFF;
                    $code .= "\tleds[$i] = CRGB($r, $g, $b);\n";
                }
            }
        }
        $code .= "\tdelay(1000/$animationfps);\n\n";
    }
    $code .= "}";
    $filename = substr($spritesheetfilename, 0, strrpos($spritesheetfilename, "."));
    header("Content-Type: application/octet-stream; charset=utf-8");
    header("Content-Disposition: attachment; filename=\"$filename.ino\"");
    echo $code;
/*} catch (Exception $e) {
    $_SESSION["error_msg"] = $e->getMessage();
    header("Location: index.php");
    die();
}*/