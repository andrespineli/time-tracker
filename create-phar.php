<?php
$pharFile = 'tracker.phar';

if (file_exists($pharFile)) {
    unlink($pharFile);
}

if (file_exists($pharFile . '.gz')) {
    unlink($pharFile . '.gz');
}

$p = new Phar($pharFile);
  
$p->buildFromDirectory('./');
  
$p->setDefaultStub('tracker.php', '/tracker.php');
  
$p->compress(Phar::GZ);
   
echo "$pharFile successfully created";