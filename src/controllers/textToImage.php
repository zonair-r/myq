<?php
// Image params

$imgWidth = 420;
$imgHeight = 600;

// Text params
$text = $q_text;
$drawFrame = array(10, 140, $imgWidth - 16, $imgHeight - 140);
$fontType = 'Roboto-Light.ttf';
$fontSize = 24;
$lineHeight = 32;
$wordSpacing = ' ';
$hAlign = 0; // -1:left  0:center 1:right
$vAlign = 0; // -1:top  0:middle 1:bottom

// allocate

$img = imagecreatetruecolor($imgWidth, $imgHeight);
$background = imagecolorallocate($img, 78, 129, 154);
$textColor = imagecolorallocate($img, 255, 255, 255);

// debug show text area

$area_color = imagecolorallocate($img, 255, 0, 0);
//imagerectangle($img, $drawFrame[0], $drawFrame[1], $drawFrame[2], $drawFrame[3], $area_color);

// write text

wrapimagettftext($img, $fontSize, $drawFrame, $textColor, $fontType, $text, '100%', ' ', $hAlign, $vAlign);
////////////////////////************************************************************* */

//* Create Folder Path & fileName to Store the Image
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../../storage/uploads/';   //2

$strtotime = strtotime("now");
$fileNameToStore = $user_id . '_' . $strtotime . '.jpeg';
$targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4
$targetFile = $targetPath . $fileNameToStore;

//* output image

header("Content-type: image/jpeg");
imagejpeg($img, $targetFile);
imagecolordeallocate($img, $textColor);
imagecolordeallocate($img, $background);
//****************************************************************************************** */

function wrapimagettftext($img, $fontSize, $drawFrame, $textColor, $fontType, $text, $lineHeight = '', $wordSpacing = '', $hAlign = 0, $vAlign = 0)
{

    if ($wordSpacing === ' ' || $wordSpacing === '') {
        $size = imagettfbbox($fontSize, 0, $fontType, ' ');
        $wordSpacing = abs($size[4] - $size[0]);
    }
    $size = imagettfbbox($fontSize, 0, $fontType, 'Zltfgyjp');
    $baseHeight = abs($size[5] - $size[1]);
    $size = imagettfbbox($fontSize, 0, $fontType, 'Zltf');
    $topHeight = abs($size[5] - $size[1]);

    if ($lineHeight === '' || $lineHeight === '') {
        $lineHeight = $baseHeight * 110 / 100;
    } else if (is_string($lineHeight) && $lineHeight{
        strlen($lineHeight) - 1} === '%') {
        $lineHeight = floatVal(substr($lineHeight, 0, -1));
        $lineHeight = $baseHeight * $lineHeight / 100;
    } else { }

    $usableWidth = $drawFrame[2] - $drawFrame[0];
    $usableHeight = $drawFrame[3] - $drawFrame[1];

    $leftX = $drawFrame[0];
    $centerX = $drawFrame[0] + $usableWidth / 2;
    $rightX = $drawFrame[0] + $usableWidth;

    $topY = $drawFrame[1];
    $centerY = $drawFrame[1] + $usableHeight / 2;
    $bottomY = $drawFrame[1] + $usableHeight;

    $text = explode(" ", $text);

    $line_w = -$wordSpacing;
    $line_h = 0;
    $total_w = 0;
    $total_h = 0;
    $total_lines = 0;

    $toWrite = array();
    $pendingLastLine = array();

    for ($i = 0; $i < count($text); $i++) {
        $size = imagettfbbox($fontSize, 0, $fontType, $text[$i]);

        $width = abs($size[4] - $size[0]);
        $height = abs($size[5] - $size[1]);

        $x = -$size[0] - $width / 2;
        $y = $size[1] + $height / 2;

        if ($line_w + $wordSpacing + $width > $usableWidth) {
            $lastLineW = $line_w;
            $lastLineH = $line_h;

            if ($total_w < $lastLineW) $total_w = $lastLineW;
            $total_h += $lineHeight;

            foreach ($pendingLastLine as $aPendingWord) {

                if ($hAlign < 0) $tx = $leftX + $aPendingWord['tx'];
                else if ($hAlign > 0) $tx = $rightX - $lastLineW + $aPendingWord['tx'];
                else if ($hAlign == 0) $tx = $centerX - $lastLineW / 2 + $aPendingWord['tx'];

                $toWrite[] = array('line' => $total_lines, 'x' => $tx, 'y' => $total_h, 'txt' => $aPendingWord['txt']);
            }
            $pendingLastLine = array();

            $total_lines++;
            $line_w = $width;
            $line_h = $height;

            $pendingLastLine[] = array('tx' => 0, 'w' => $width, 'h' => $height, 'x' => $x, 'y' => $y, 'txt' => $text[$i]);
        } else {

            $line_w += $wordSpacing;
            $pendingLastLine[] = array('tx' => $line_w, 'h' => $width, 'w' => $height, 'x' => $x, 'y' => $y, 'txt' => $text[$i]);
            $line_w += $width;
            if ($line_h < $height) $line_h = $height;
        }
    }

    $lastLineW = $line_w;
    $lastLineH = $line_h;

    if ($total_w < $lastLineW) $total_w = $lastLineW;
    $total_h += $lineHeight;

    foreach ($pendingLastLine as $aPendingWord) {

        if ($hAlign < 0) $tx = $leftX + $aPendingWord['tx'];
        else if ($hAlign > 0) $tx = $rightX - $lastLineW + $aPendingWord['tx'];
        else if ($hAlign == 0) $tx = $centerX - $lastLineW / 2 + $aPendingWord['tx'];

        $toWrite[] = array('line' => $total_lines, 'x' => $tx, 'y' => $total_h, 'txt' => $aPendingWord['txt']);
    }
    $pendingLastLine = array();
    $total_lines++;

    $total_h += $lineHeight - $topHeight;

    foreach ($toWrite as $aWord) {

        $posx = $aWord['x'];

        if ($vAlign < 0) $posy = $topY + $aWord['y'];
        else if ($vAlign > 0) $posy = $bottomY - $total_h + $aWord['y'];
        else if ($vAlign == 0) $posy = $centerY - $total_h / 2 + $aWord['y'];

        imagettftext($img, $fontSize, 0, $posx, $posy, $textColor, $fontType, $aWord['txt']);
    }
}
