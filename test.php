<?php
// $str = "a 'quate' is <b>bold</b>";
// $str = "<a href='https://www.youtube.com'>Yahoo Baba</a>";

// // echo $str . '<br><br>';
// $htmlent = htmlentities($str, ENT_QUOTES);
// echo $htmlent;

// echo '<br><br>';

// echo html_entity_decode($htmlent);
// ?>


<?php
$str = 'Helow';

echo 'This string: ' . $str . '<br><br>';
echo 'This Binary: ' . md5($str) . '<br><br>';
echo 'This Hex: ' . md5($str, true) . '<br><br>';

echo 'This Binary: ' . sha1($str) . '<br><br>';
echo 'This Hex: ' . sha1($str, true) . '<br><br>';

?>