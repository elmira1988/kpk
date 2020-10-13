<?php
include "functions.php";

$name = $_GET["q"];
$result = find_city($_GET["q"]);
echo json_encode(array("total_count"=> count($result), "items" => $result));
