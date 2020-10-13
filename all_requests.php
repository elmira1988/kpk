<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>КПК СФБашГУ. Все заявки</title>

</head>

<body class="d-flex flex-column h-100 pt-0 h-100">
<?php include("php/functions.php");?>

<div class="header d-flex justify-content-lg-between justify-content-sm-center">
    <div class="d-none d-lg-block d-md-block"> <img src="src/images/str_left.png"> </div>
    <div> <img src="src/images/bsu_logo.png" class="pt-1"></div>
    <div class="d-none d-lg-block d-md-block"> <img src="src/images/str_left.png"></div>
</div>

<div class="d-flex flex-column justify-content-center mt-5">
    <h2 class="text-center text-secondary mb-0 ">Курсы повышения квалификации</h2>
    <h4 class="text-center text-secondary mt-0 animate__animated animate__fadeInUp"><small>все заявки</small></h4>
</div>

<div class="table-responsive pr-3 pl-3">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>№</th>
            <th>Ф.И.О.</th>
            <th>дата рожд.</th>
            <th>город/район</th>
            <th>телефон</th>
            <th>email</th>
            <th>образ-ие</th>
            <th>предметы</th>
            <th>курсы</th>
            <th>дата</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $requests = get_requests();

        for ($i=0; $i < count($requests); $i++) {
            ?>
            <tr>
                <td><?php echo ($i+1); ?></td>
                <td><?php echo $requests[$i]['surname'].' '.$requests[$i]['name'].' '.$requests[$i]['patronymic'] ?></td>
                <td><?php echo $requests[$i]['birth']; ?></td>
                <td><?php echo get_cities_districts_of_request($requests[$i]['id'])[0]['name'];?></td>
                <td><?php echo $requests[$i]['phone']; ?></td>
                <td><?php echo $requests[$i]['email']; ?></td>
                <td><?php echo $requests[$i]['level']; ?></td>
                <td><?php
                    $subjects = get_subjects_of_requests($requests[$i]['id']);
                    echo '<ul>';
                    for ($k=0; $k < count($subjects); $k++) {
                        echo '<li>'.$subjects[$k]["name"]."</li>";
                    }
                    echo '</ul>';
                    ?></td>
                <td><?php
                    $courses = get_courses_of_requests($requests[$i]['id']);
                    echo '<ul>';
                    for ($k=0; $k < count($courses); $k++) {
                        echo '<li>'.$courses[$k]["name"]."</li>";
                    }
                    echo '</ul>';

                    if($requests[$i]["note"]!="")
                    {
                        echo "<i>комментарий: </i>".$requests[$i]["note"];
                    }
                    ?></td>
                <td><?php echo $requests[$i]["time"] ?></td>
            </tr>
            <?
        }
        ?>
        </tbody>
    </table>
</div>


<footer class="footer mt-auto py-3">
    <div class="container">
        <p class="text-center text-muted mb-0">© 2020 Стерлитамакский филиал БашГУ, все права защищены</p>
    </div>
</footer>

<script src="dist/vendors~send_request.bundle.js"></script>
<script src="dist/send_request.bundle.js"></script>

<link href="dist/vendors~send_request.css" rel="stylesheet">
<link href="dist/send_request.css" rel="stylesheet">

</body>
</html>