<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
    if(isset($_POST["button"])){
        $counter++;
        echo $counter;
    }
}