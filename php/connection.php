<?php
$mysqli = new mysqli("localhost", "root", "", "toltekplus_kpk");

if (mysqli_connect_error()) {
    die('Невозможно подключиться к базе (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

$mysqli->set_charset('utf8');

function get_raw($query)
{
    global $mysqli;

    $mysqli_result=$mysqli->query($query);

    if ($mysqli_result)
    {

        while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC))
        {
            $tmp[] = $row;
        }

        $mysqli_result->free();
        return $tmp;
    }
    else
    {
        return NULL;
    }

}



function get_raw_with_id($query,$id)
{
    global $mysqli;

    $mysqli_result=$mysqli->query($query);

    if ($mysqli_result)
    {

        while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC))
        {
            $tmp[$row["$id"]] = $row;
        }

        /* очищаем результаты выборки */
        $mysqli_result->free();
        return $tmp;
    }
    else
    {
        /* очищаем результаты выборки */
        $mysqli_result->free();
        return NULL;
    }

}
