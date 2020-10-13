import * as $ from 'jquery'
import '../styles/styles.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'smartwizard/dist/js/jquery.smartWizard.min.js'
import 'smartwizard/dist/css/smart_wizard_all.min.css'
import 'parsleyjs/dist/parsley.min.js'
import 'parsleyjs/dist/i18n/ru.js'
import 'parsleyjs/src/parsley.css'
import 'select2/dist/js/select2.min.js'
import 'select2/dist/css/select2.min.css'
import Inputmask from 'inputmask'
import 'animate.css/animate.min.css'
import '@fortawesome/fontawesome-free/js/all.min'

$(document).ready(function(){

    console.log(this);

    Inputmask().mask(document.querySelectorAll("input"));
    // Smart Wizard
    $('#smartwizard').smartWizard({
        selected: 0,// Initial selected step, 0 = first step
        theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        autoAdjustHeight: false, // Automatically adjust content height
        enableURLhash: false, // Enable selection of the step based on url hash
        // darkMode: true,
        transition: {
            animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
        }
    });


    $(".js-example-data-ajax").select2({
        ajax: {
            //url: "https://api.github.com/search/repositories",
            url: "php/find_city.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                //console.log(params);
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                //console.log(data);
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Город/Район Респ. Башкортостан',
        language: 'ru',
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });

    function formatRepo (repo) {
        //console.log(repo);
        if (repo.loading) {
            return repo.text;
        }
        //console.log(repo);

        var $container = $("<div>"+repo.text+"</div>");
        return $container;
    }

    function formatRepoSelection (repo) {
        return repo.full_name || repo.text;
    }



    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
        //console.log(e);
        //console.log(anchorObject);
        console.log('Текущий шаг: '+currentStepIndex);
        console.log('Последующий шаг: '+nextStepIndex);
        console.log('Описание шага: '+stepDirection);

        switch(currentStepIndex) {
            case 0:
                if(nextStepIndex>currentStepIndex)
                {
                    let validate = $("#teacher").parsley().validate();
                    if (validate)
                    {
                        $(".sw-btn-prev").removeClass("d-none");
                        $(".sw-btn-next").html("отправить заявку");
                        return true;
                    }

                    return false;
                }
                break;

            case 1:

                if(nextStepIndex>currentStepIndex)
                {
                    if($("#courses").find("[name='courses[]']:checked").length==0)
                    {
                        $("#courses_error").removeClass("d-none");
                        return false;
                    }
                }

                $(".sw-btn-prev").addClass("d-none");
                $(".sw-btn-next").addClass("d-none");
                $(".sw-btn-end").removeClass("d-none");

                //Отправка формы
                var request = new Object();

                //сведения
                $("#teacher").find("select, input[type='text'],input[type='email'],input[type='date'],input[type='radio']:checked").each(function(i,index){
                    let name = $(index).attr("name");
                    let val = $(index).val();
                    request[name] = val;
                });

                //предметы
                request['subjects'] = [];
                $("#teacher").find("input[name='subjects[]']:checked").each(function(i,index){
                    request['subjects'].push($(index).val());
                });

                //курсы
                request['courses'] = [];
                $("#courses").find("input[name='courses[]']:checked").each(function(i,index){
                    request['courses'].push($(index).val());
                });

                //комментарий
                request['note'] = $("textarea[name='note']").val();

                console.log(request);


                $.ajax({
                    url:     "php/save_request.php",
                    type:     "POST",
                    dataType: "json",
                    data: {"data" : JSON.stringify(request)},
                    success: function(response) { //Данные отправлены успешно
                        //console.log(response);
                        if (response.result=="ok")
                        {
                            console.log("данные успешно сохранены");
                            $("#step-3").find(".alert-success").removeClass("d-none");
                            $("#step-3").find(".alert-warning").addClass("d-none");
                            $(".nav-link.inactive.active").removeClass("active").addClass("done");
                        }
                        else
                        {
                            $("#step-3").find(".alert-success").addClass("d-none");
                            $("#step-3").find(".alert-warning").removeClass("d-none");
                        }
                    },
                    error: function(response) { // Данные не отправлены
                        $("#step-3").find(".alert-success").addClass("d-none");
                        $("#step-3").find(".alert-warning").removeClass("d-none");
                    }
                });

                //return true;
                break;

            default:
                break;
        }

    });


});



