<?php
define('SCANDIR', 'photos');

if (isset($_POST['email']) && isset($_POST['pic'])) {
    $path = realpath(str_replace('/', DIRECTORY_SEPARATOR, $_POST['pic']));
    if (realpath(SCANDIR) !== basename($path)) {
        die('FAIL');
    }
    system('echo "Photo" | mail -a '.escapeshellarg(realpath(SCANDIR)."/".$path).' -v -s '.escapeshellarg("Photo from me!").' '.escapeshellarg($_POST['email']));
    die('OK');
}

$photos = scandir(SCANDIR);
$links = [];
$encoded_dir = urlencode(SCANDIR);
$video_exts = ['mp4', 'avi'];
foreach($photos as $photo) {
    if (is_dir(SCANDIR.DIRECTORY_SEPARATOR.$photo)) {
        continue;
    }
    if ($photo === '.gitkeep') {
        continue;
    }
    $type = in_array(pathinfo($photo, PATHINFO_EXTENSION), $video_exts) ? 'video' : 'photo';
    $links []= array('url' => $encoded_dir.'/'.urlencode($photo), 'type' => $type);
}
include('template.php');