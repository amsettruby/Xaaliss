<?php

// Majuscules (A-Z), Minuscules (a-z) et Chiffres (0-9)
date_default_timezone_set('Africa/Dakar');
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    echo $timestamp;
// foreach($chars as $c) {
//     echo $c;
// }