<?php
function base_path($path = "") {
    return realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR . $path;
}