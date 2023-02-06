<?php

$timer = false;

if (isset($_COOKIE['entryTime'])) { 
    $entryTime = $_COOKIE['entryTime'];   
    $timer = true;   
}
