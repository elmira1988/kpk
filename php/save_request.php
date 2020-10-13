<?php
include("functions.php");

$request = json_decode($_POST["data"],true);

$subjects = $request["subjects"];
$courses = $request["courses"];
$address = $request["address"];

unset($request["subjects"]);
unset($request["courses"]);
unset($request["address"]);

if($id_request = save_request($request))
{
    //сохраняем курсы
    function update_courses(&$val,$key, $id_request) { $val = "(NULL, '".$id_request."', '".$val."')";}
    array_walk($courses,'update_courses',$id_request);
    save_data("INSERT INTO `requests__courses` (`id`, `id_request`, `id_course`) VALUES ".implode($courses,","));

    //сохраняем предметы
    function update_subjects(&$val,$key, $id_request) { $val = "(NULL, '".$id_request."', '".$val."')";}
    array_walk($subjects,'update_subjects',$id_request);
    save_data("INSERT INTO `requests__subjects` (`id`, `id_request`, `id_subject`) VALUES ".implode($subjects,","));

    //сохраняем город/район
    $address = explode("_",$address);
    $table = $address[0];
    $id = $address[1];
    save_data("INSERT INTO `requests__".$table."` (`id`, `id_request`, `id_".$table."`) VALUES (NULL,'".$id_request."','".$id."')");

    echo json_encode(array("result" => "ok", "msg" => "INSERT INTO `".$table."` (`id`, `id_request`, `id_".$table."`) VALUES (NULL,'".$id_request."','".$id."')"));

}
else
{
    echo json_encode(array("result" => "error", "msg" => "Ошибка при работе с базой данных"));
}

