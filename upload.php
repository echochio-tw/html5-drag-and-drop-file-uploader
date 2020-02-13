<?php

// set error reporting level
if (version_compare(phpversion(), '5.3.0', '>=') == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

if (isset($_FILES['myfile'])) {
    $tmapFileName = $_FILES['myfile']['tmp_name'];
    $sFileName = $_FILES['myfile']['name'];
    $sFileType = $_FILES['myfile']['type'];
    $sFileSize = bytesToSize1024($_FILES['myfile']['size'], 1);
    move_uploaded_file($tmapFileName, './files/test_ok');

    echo <<<EOF
<div class="s">
    <p>上傳的檔案: {$sFileName} 以正確收到.</p>
    <p>檔案大小: {$sFileSize}</p>
</div>
EOF;
} else {
    echo '<div class="f">An error occurred</div>';
}
