<?php
/*if (isset($_POST['submit'])) {
  
        $key = generateKey();
    $expiration = time() + (24 * 60 * 60); 
    saveKey($key, $expiration);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/check.php?key=' . $key; // membuat URL dengan kunci
    echo 'Your key: ' . $key; // menampilkan URL dengan kunci
  
}
    // 24 jam
    
  


function keyExistsForIp($ip) {
    $lines = file('keys_for_ip.txt', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if ($line == $ip) {
            return true;
        }
    }
    return false;
}

function saveKeyForIp($key, $ip) {
    $data = $key . ',' . $ip . "\n";
    $file = fopen('keys_for_ip.txt', 'a');
    fwrite($file, $data);
    fclose($file);
}
*/
function generateKey() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $key = '';
    do {
        for ($i = 0; $i < 16; $i++) {
            $key .= $characters[rand(0, strlen($characters) - 1)];
        }
    } while (keyExists($key));
    return $key;
}

  

function saveKey($key, $expiration) {
    $data = $key . ',' . $expiration . "\n";
    $file = fopen('keys.txt', 'a');
    fwrite($file, $data);
    fclose($file);
    recordKey($key);
  
}

function recordKey($key) {
    $file = fopen('recorded_keys.txt', 'a');
    fwrite($file, $key . "\n");
    fclose($file);
}
if (isset($_COOKIE['key']) && keyExists($_COOKIE['key'])) {
    echo 'You have already generated a key.';
    exit;
} else {
    echo 'Your key: ' . $key;
    $key = generateKey();
    $expiration = time() + (24 * 60 * 60); 
}

if (isset($_POST['submit'])) {
    
    saveKey($key, $expiration);

    // Set cookie untuk menyimpan key
    setcookie('key', $key, $expiration, '/');

    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/check.php?key=' . $key; // membuat URL dengan kunci
   // menampilkan URL dengan kunci
}

function keyExists($key) {
    $lines = file('recorded_keys.txt', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if ($line == $key) {
            return true;
        }
    }
    return false;
}/*
if (isset($_POST['submit'])) {
    $ip = $_SERVER['REMOTE_ADDR']; // mendapatkan alamat IP dari client
    if (!keyExistsForIp($ip)) { // cek apakah sudah ada kunci yang diberikan untuk IP yang sama
        $key = generateKey();
        $expiration = time() + (24 * 60 * 60); 
        saveKey($key, $expiration);
        saveKeyForIp($key, $ip); // simpan kunci untuk IP yang sama
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/check.php?key=' . $key;
        echo 'Your key: ' . $key;
        setcookie('key', $key, $expiration, '/');
    } else {
        echo 'You have already received a key.';
    }
}
*/

// Cek cookie untuk memastikan hanya satu key per perangkat atau IP


/*
function keyExists($key) {
    $lines = file('recorded_keys.txt', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if ($line == $key) {
            return true;
        }
    }
    return false;
}


function generateKey() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $key = '';
    for ($i = 0; $i < 16; $i++) {
        $key .= $characters[rand(0, strlen($characters) - 1)];
    }
  
    return $key;
}



function saveKey($key, $expiration) {
    $data = $key . ',' . $expiration . "\n";
    $file = fopen('keys.txt', 'a');
    fwrite($file, $data);
    fclose($file);
} */
?>
<doctype html>
<html>
 <head>
   <title>GetKey</title>
  <meta name="color-scheme" content="light dark">
   
 </head>
 <body>
 </body>
</html>
