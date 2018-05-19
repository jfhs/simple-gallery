<?php
define('SCANDIR', 'photos');

if (isset($_POST['email']) && isset($_POST['pic'])) {
    $path = realpath(str_replace('/', DIRECTORY_SEPARATOR, $_POST['pic']));
    if (realpath(SCANDIR) !== basename($path)) {
        die('FAIL');
    }
    system('mail -s '.escapeshellarg("Photo from me!").' '.escapeshellarg($_POST['email']).' -A '.escapeshellarg($path));
    die('OK');
}

$photos = scandir(SCANDIR);
$links = [];
$encoded_dir = urlencode(SCANDIR);
foreach($photos as $photo) {
    if (is_dir(SCANDIR.DIRECTORY_SEPARATOR.$photo)) {
        continue;
    }
    $links []= $encoded_dir.'/'.urlencode($photo);
}
include('template.php');