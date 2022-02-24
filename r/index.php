<?php

include "url-shortener\db.php";
$db = new Database("localhost", "url_shortener", "root", "");
$db = $db->connect();

$id = $_GET["c"];
$query = "SELECT * FROM url_shortener WHERE id = :id LIMIT 1";
$statement = $db->prepare($query);

$parameters = array (
    "id" => $id
);

$statement->execute($parameters);
$url = $statement->fetch();
header("location: " . $url["regular_url"]);