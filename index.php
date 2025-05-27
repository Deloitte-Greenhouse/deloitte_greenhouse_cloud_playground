<?php

include __DIR__ . '/kirby/bootstrap.php';

$root = '/data/persistent_volume/kirby_files';
$url = 'https://nfs-test-client-32683298196.europe-west1.run.app';

$kirby = new Kirby([
    'roots' => [
        'index'   => __DIR__,
        'content' => $root.'/content',
        'media' => $root.'/media',
        'sessions' => $root.'/sessions',
        'site' => $root.'/site'
    ],
    'urls' => [
        'media'  => $url . '/media',
        'assets' => $url . '/assets'
    ],
]);

$symlink = __DIR__ . '/media';
if (!file_exists($symlink)) {
    symlink($kirby->roots()->media(), $symlink);
}

echo $kirby->render();