<?php
    include "../db.php";

    $db = new Database("localhost", "url_shortener", "root", "");
    $db = $db->connect();

    $url = $_POST ["regular_url"];
    $query = "INSERT INTO url_shortener(regular_url) VALUES (:regular_url)";
    $statement = $db->prepare($query);
    $parameters = array (
        "regular_url" => $url
    );

    $result = $statement->execute($parameters);

    header("location: /url-shortener?i=" . $db->lastInsertId())
?>