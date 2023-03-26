<?php
// Get the document root
$doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);

// Get the application path
$uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
$dirs = explode('/', $uri);
global $app_path;
for ($i = 1; $i < sizeof($dirs); $i++) {
    $app_path = $app_path . '/' . $dirs[$i];
}

set_include_path($doc_root . $app_path);

var_dump($doc_root);
echo '<br>';
$docexplode = explode('/', $doc_root);
var_dump($docexplode);
echo '<br>';
var_dump($uri);
echo '<br>';
var_dump($dirs);
echo '<br>';
var_dump($app_path);

?>