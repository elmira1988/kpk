<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>КПК СФБашГУ. Отправить заявку</title>

</head>

<body class="d-flex flex-column h-100 pt-0 h-100">
<?php include("php/functions.php");?>
<div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Согласие на обработку персональных данных</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <p>Настоящим действием подтверждается согласие Заказчика Башкирскому государственному университету (Стерлитамакский филиал, СФ БашГУ), расположенному по адресу: г. Стерлитамак, пр. Ленина, д. 49, на автоматизированную, а также без использования средств автоматизации обработку персональных данных, а именно совершение действий, предусмотренных пунктом 3 части первой статьи 3 Федерального закона от 27 июля 2006 № 152-ФЗ "О персональных данных": сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, распространение (передачу), обезличивание, блокировку и уничтожение сведений о Заказчике и Участнике: фамилия, имя, отчество; год, месяц, число и место рождения; паспортные данные, мобильный телефон.</p>
                <p>Срок действия настоящего согласия на обработку персональных данных: с момента его подписания и до достижения целей обработки.</p>
                <p>В дальнейшем - в соответствии с законодательством об архивном деле в Российской Федерации.</p>
                <p>Настоящее согласие может быть отозвано мной в письменной форме на основании заявления, поданного на имя директора СФ БашГУ.</p>
            </div>
        </div>
    </div>
</div>

<div class="header d-flex justify-content-lg-between justify-content-sm-center">
    <div class="d-none d-lg-block d-md-block"> <img src="src/images/str_left.png"> </div>
    <div> <img src="src/images/bsu_logo.png" class="pt-1"></div>
    <div class="d-none d-lg-block d-md-block"> <img src="src/images/str_left.png"></div>
</div>

<div class="d-flex flex-column justify-content-center mt-5">
    <h2 class="text-center text-secondary mb-0 ">Курсы повышения квалификации</h2>
    <h4 class="text-center text-secondary mt-0 animate__animated animate__fadeInUp"><small>оставить заявку на обучение</small></h4>
    <h5 class="text-center"><small><i>по вопросам звонить администратору 89170874433</i></small></h5>
</div>

<div class="container">
    <div id="smartwizard" class="sw sw-theme-arrows sw-justified mt-4 mb-5 ">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link inactive active" href="#step-1">
                    <strong>Шаг 1</strong> <br>Сведения о Вас
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="#step-2">
                    <strong>Шаг 2</strong> <br>Выберите курс(ы)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="#step-3">
                    <strong>Шаг 3</strong> <br>Отправить заявку
                </a>
            </li>
        </ul>

        <div class="tab-content bg-white animate__animated animate__fadeIn animate__delay-1s">
            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1" style="position: static; left: auto; width: 1038px;">
                <form id="teacher">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="surname"><i class="fa fa-user text-muted"></i></span>
                                </div>
                                <input type="text" class="form-control" name="surname" placeholder="Фамилия" aria-label="Фамилия" aria-describedby="surname" data-parsley-errors-container="#surname_error" value="" required>
                            </div>
                            <div id="surname_error"></div>


                            <div class="input-group mt-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="name"><i class="fa fa-user text-muted"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя" aria-describedby="Имя" data-parsley-errors-container="#name_error" value="" required>
                            </div>
                            <div id="name_error"></div>

                            <div class="input-group mt-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="patronymic"><i class="fa fa-user text-muted"></i></span>
                                </div>
                                <input type="text" class="form-control" name="patronymic" placeholder="Отчество" aria-label="Отчество" aria-describedby="Имя" data-parsley-errors-container="#patronymic_error" value="">
                            </div>
                            <div id="patronymic_error"></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group mt-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="birth"><i class="fa fa-calendar text-muted"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="birth" placeholder="дата рождения" aria-label="дата рождения" aria-describedby="дата рождения" data-parsley-errors-container="#birth_error" value="" required>
                                    </div>
                                    <div id="birth_error"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-group mt-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone"><i class="fa fa-phone text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="phone" placeholder="телефон" aria-label="телефон" aria-describedby="телефон" data-parsley-pattern="8\(\d{3}\)\d{3}-\d{2}-\d{2}" data-inputmask="'mask' : '8(999)999-99-99'"  data-parsley-errors-container="#phone_error" value="" required>
                                    </div>
                                    <div id="phone_error"></div>
                                </div>
                            </div>

                            <div class="input-group mt-4">
                                <select name="address" class="form-control js-example-data-ajax" placeholder="Адрес" data-parsley-errors-container="#addres_error" required></select>
                            </div>
                            <div id="addres_error"></div>



                            <div class="input-group mt-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"><i class="fa fa-envelope text-muted"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="Email" data-parsley-errors-container="#email_error" value="" required>
                            </div>
                            <div id="email_error"></div>

                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label class="text-muted d-block custom-control pl-0">Образование</label>
                                </div>
                                <div class="col-lg-9">
                                    <?php
                                    $level_of_education = get_level_of_education();


                                    for ($i=0; $i < count($level_of_education); $i++) {
                                        ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="level<?php echo $level_of_education[$i]["id"]?>" name="level_of_education"  class="custom-control-input"
                                                <?php if ($i==1) {echo " checked ";}?> value="<?php echo $level_of_education[$i]["id"]; ?>">
                                            <label class="custom-control-label" for="level<?php echo $level_of_education[$i]["id"]?>"><?php echo $level_of_education[$i]["name"]?></label>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr class="mt-0 mb-2">
                            <div class="form-group ">
                                <label class="text-muted d-block">Специализация</label>
                                <div id="subjects_error"></div>
                                <div class="row">


                                    <?php

                                    $subjects = get_subjects();

                                    for ($i=0; $i < count($subjects) ; $i++) {
                                        ?>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="subject<?php echo $subjects[$i]["id"]?>" name="subjects[]" class="custom-control-input" required value="<?php echo $subjects[$i]["id"]?>" data-parsley-errors-container="#subjects_error">
                                                <label class="custom-control-label" for="subject<?php echo $subjects[$i]["id"]?>"><?php echo $subjects[$i]["name"]?></label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="agreement" name="agreement" class="custom-control-input " checked disabled required value="1">
                            <label class="custom-control-label" for="agreement">Нажимая на кнопку "Далее", я даю <a href="#" style="text-decoration: underline;" data-toggle="modal" data-target=".bs-example-modal-lg">согласие на обработку персональных данных</a></label>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2" style="display: none;">
                <div class="alert alert-info" role="alert">Пожалуйста, ознакомьтесь внимательно с курсами, представленными ниже, укажите наиболее подходящие.</div>
                <form id="courses">
                    <div id="courses_error" class="alert alert-warning d-none" role="alert">Пожалуйста, выберите хотя бы один курс.</div>
                    <?php
                    $courses =  get_courses();

                    for ($i=0; $i < count($courses); $i++) {
                        ?>
                        <div class="card mb-2">
                            <div class="card-header pr-0 pt-0 pb-0">
                                <div class="custom-control custom-checkbox custom-control-inline text-dark">
                                    <input type="checkbox" id="course<?php echo $courses[$i]["id"]?>" name="courses[]" class="custom-control-input "  value="<?php echo $courses[$i]["id"]?>">
                                    <label class="custom-control-label" for="course<?php echo $courses[$i]["id"]?>"><h5><?php echo $courses[$i]["name"]?></h5></label>
                                </div>
                            </div>
                            <div class="card-body text-muted">
                                <?php echo $courses[$i]["description"]; ?>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                    <div class="form-group">
                        <label class="text-muted">Комментарий</label>
                        <textarea name="note" class="form-control" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3" style="display: none;">
                <div class="alert alert-success d-none" role="alert">
                    <h5 style="text-align: center;">Спасибо, Ваша заявка принята!</h5>
                </div>

                <div class="alert alert-warning d-none" role="alert">
                    <h5 style="text-align: center;">Ошибка при работе с базой данных!</h5>
                    <h6 style="text-align: center;">Пожалуйста, попробуйте отправить заявку позже или обратитесь к администратору по номеру 89170874433</h6>
                </div>

            </div>
        </div>


        <div class="toolbar toolbar-bottom animate__animated animate__fadeIn animate__delay-2s" role="toolbar" style="text-align: right;">

            <button class="btn sw-btn-prev disabled pull-left d-none" type="button">назад</button>
            <button class="btn sw-btn-next" type="button">дальше</button>
            <button class="btn sw-btn-end d-none" type="button" onclick="location.reload()">завершить</button>
        </div>
    </div>
</div>
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