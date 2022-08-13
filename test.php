<?php

$HEAD_hash = file_get_contents('.git/refs/heads/master'); // or branch x

$files = glob('.git/refs/tags/*');
foreach(array_reverse($files) as $file) {
    $contents = trim(file_get_contents($file));

    if($HEAD_hash === $contents)
    {
        print 'Current tag is ' . basename($file);
        exit;
    }
}

print 'No matching tag';