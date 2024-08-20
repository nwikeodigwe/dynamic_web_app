<?php

function die_and_dump($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}