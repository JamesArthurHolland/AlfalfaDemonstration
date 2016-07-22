<?php

    $files = glob(__DIR__ . '/Di/*.php');

    foreach ($files as $file) {
        require_once($file);
    }