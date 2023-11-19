<?php

include 'vendor/autoload.php';

$converter = new \KarimTarekDev\Weightify\Weightify();
echo $converter->convert(10, 'ounce', 'gram');
