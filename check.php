<?php
if (isset($_GET['key'])) {
    $key = $_GET['key'];
    $isValid = checkKey($key);
    if ($isValid) {
        echo $key;
    } else {
        echo 'Key invalid';
    }
}

//fungsi untuk memeriksa apakah kunci masih berlaku
function checkKey($key) {
    $file = fopen('keys.txt', 'r');
    while (!feof($file)) {
        $data = fgets($file);
        if ($data) {
            $arr = explode(',', $data);
            if ($arr[0] == $key) {
                if (time() <= $arr[1]) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
    fclose($file);
    return false;
}
?>
<doctype html>
<html>
 <head>
   <title>GetKey</title>
  <meta name="color-scheme" content="light dark">
   
 </head>
 <body>
  <pre style="word-wrap: break-word; white-space: pre-wrap;"></pre>
 </body>
    </html>
