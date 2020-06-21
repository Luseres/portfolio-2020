<?php

function _e($value)
{
    echo htmlspecialchars($value);
}
function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
