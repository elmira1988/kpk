<?php
include "connection.php";

//разбить объект на ключ - значение
function get_array_key_value($obj)
{
    $array_key=array();
    $array_val=array();

    foreach ($obj as $key => $value) {
        array_push($array_key,"`".$key."`");
        array_push($array_val,"'".$value."'");
    }

    return array($array_key,$array_val);
}


function get_level_of_education()
{
    $query = "SELECT * FROM `level_of_education`";

    return  get_raw($query);
}

function get_subjects()
{
    $query = "SELECT * FROM `subjects` ORDER BY `name`";

    return  get_raw($query);
}


function get_courses()
{
    $query = "SELECT * FROM `courses` ORDER BY `name`";

    return  get_raw($query);
}


//сохраняем данные в базе и возвращаем id
//INSERT запрос
function save_data($query)
{
    global $mysqli;

    $res=$mysqli->query($query);

    if ($res)
    {
        return $mysqli->insert_id;
    }
    else
    {
        return NULL;
    }

}


function save_request($request)
{
    $arr = get_array_key_value($request);

    $query = "INSERT INTO `requests` (".implode($arr[0],',').") VALUES (".implode($arr[1],',').");";


    return save_data($query);

}


function get_requests()
{
    $request = get_raw("SELECT `requests`.*,`level_of_education`.name AS `level` FROM `requests` LEFT JOIN `level_of_education` ON `requests`.level_of_education=`level_of_education`.id ORDER BY `time` DESC");

    return $request;
}


function get_subjects_of_requests($id_request)
{
    $subjects = get_raw("SELECT `subjects`.* FROM (SELECT * FROM `requests__subjects` WHERE `id_request`=".$id_request.") AS t LEFT JOIN `subjects` ON `subjects`.`id`=`t`.`id_subject`");

    return $subjects;
}


function get_courses_of_requests($id_request)
{
    $courses = get_raw("SELECT `courses`.* FROM (SELECT * FROM `requests__courses` WHERE `id_request`=".$id_request.") AS t LEFT JOIN `courses` ON `courses`.`id`=`t`.`id_course`");

    return $courses;
}

function find_city($name)
{
    $query = "SELECT concat('г. ',`name`)  AS `text`, concat('cities_',`id`) AS `id` FROM `cities` WHERE `name` LIKE '%".$name."%'";

    $cities = get_raw($query);

    $query = "SELECT concat(`name`,' район') AS `text`, concat('districts_',`id`) AS `id` FROM `districts` WHERE `name` LIKE '%".$name."%'";

    $districts = get_raw($query);

    return array_merge($cities,$districts);
}


function get_cities_districts_of_request($id_request)
{
    $query = "SELECT concat('г. ', `cities`.`name`) AS `name` FROM `requests__cities` INNER JOIN  `cities` ON `requests__cities`.`id_cities`= `cities`.`id`  WHERE `id_request`=".$id_request;

    $result = get_raw($query);

    if(count($result))
    {
        return $result;
    }

    $query = "SELECT concat(`districts`.`name`,' район') AS `name` FROM `requests__districts` INNER JOIN  `districts` ON `requests__districts`.`id_districts`= `districts`.`id`  WHERE `id_request`=".$id_request;

    $result = get_raw($query);

    return $result;

}

