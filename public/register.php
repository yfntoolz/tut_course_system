<?php

function cache(){
    session_start();
    $email = $_COOKIE["student_email"];
    $aps = $_COOKIE["student_aps"];
    $english = $_COOKIE["student_eng"];
    $math = $_COOKIE["student_math"];
    $phy = $_COOKIE["student_phy"];

    $_SESSION['student_email'] = $email;
    $_SESSION['student_aps'] = $aps;
    $_SESSION['student_english'] = $english;
    $_SESSION['student_math'] = $math;
    $_SESSION['student_physics'] = $phy;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="icon" href="img/overlays/tut_facelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="./index.html">
                <img src="img/overlays/tut_facelogo.png" width="50" alt="">
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/mdbootstrap" class="nav-link" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->
    <h2 class="text-center font-weight-bold pt-4 pb-5" style="color: white"><strong>Fill in the following details below
            to complete your registration</strong></h2>
    <!-- Steps form -->
    <div style="margin-top: 100px;">
        <div class="card1">
            <div class="card-body mb-4">

                <!-- Stepper -->
                <div class="steps-form">
                    <div class="steps-row setup-panel">
                        <div class="steps-step">
                            <a href="#step-9" type="button" class="btn btn-indigo btn-circle">1</a>
                            <p>Step 1</p>
                        </div>
                        <div class="steps-step">
                            <a href="#step-10" type="button" class="btn btn-default btn-circle"
                                disabled="disabled">2</a>
                            <p>Step 2</p>
                        </div>
                        <div class="steps-step">
                            <a href="#step-11" type="button" class="btn btn-default btn-circle"
                                disabled="disabled">3</a>
                            <p>Step 3</p>
                        </div>
                    </div>
                </div>

                <form role="form" name="reg_form" action="/user_create" onsubmit="captureEmail()" method="post">

                    <!-- First Step -->
                    <div class="row setup-content" id="step-9">
                        <div class="col-md-12">
                            <h3><strong>Basic Information</strong></h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group md-form">
                                <label for="first_name" data-error="wrong" data-success="right">First Name</label>
                                <input id="first_name" name="first_name" type="text" required
                                    class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <label for="last_name" data-error="wrong" data-success="right">Last Name</label>
                                <input id="last_name" name="last_name" type="text" required
                                    class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <label for="idnumber" data-error="wrong" data-success="right">ID Number</label>
                                <input id="idnumber" name="idnumber" type="text" required class="form-control validate">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group md-form ">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                                <input id="email" name="email" type="email" required class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <label for="password" data-error="wrong" data-success="right">Password</label>
                                <input id="password" name="password" type="password" required class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <label for="password_verify" data-error="wrong" data-success="right">Confirm Password</label>
                                <input id="password_verify" name="password_verify" type="password" required class="form-control validate">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-indigo btn-rounded nextBtn float-right" type="button">Next</button>
                        </div>
                    </div>

                    <!-- Second Step -->
                    <div class="row setup-content" id="step-10">
                        <div class="col-md-12">
                            <h3><strong>Qualification Information</strong></h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group md-form">
                                <select class="form-control"
                                    style="border: none;border-bottom: 1pt solid rgba(0, 0, 0, 0.171);"
                                    name="highest_qualification" id="sel1">
                                    <option>Select Highest Qualification</option>
                                    <option value="National Senior Certificate">National Senior Certificate</option>
                                    <option value="National Certificate (Vocational) at NQF Level 4">National
                                        Certificate (Vocational) at NQF Level 4</option>
                                    <option value="National N Certificate">National N Certificate</option>
                                </select>
                            </div>
                            <div class="form-group md-form ">
                                <label for="aps_score" data-error="wrong" data-success="right">APS Score</label>
                                <input id="aps_score" name="aps_score" type="number" required
                                    class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <div class="form-check md-form" style="margin-left: 10px;">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" required>I confirm that
                                        the information provided in this form is accurate and can be verified with the
                                        Department of Education.
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group md-form ">
                                <label for="english" data-error="wrong" data-success="right">English</label>
                                <input id="english" name="english" type="number" required class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <label for="mathematics" data-error="wrong" data-success="right">Mathematics</label>
                                <input id="mathematics" name="mathematics" type="number" required
                                    class="form-control validate">
                            </div>
                            <div class="form-group md-form ">
                                <label for="physics" data-error="wrong" data-success="right">Physical Sciences</label>
                                <input id="physics" name="physics" type="number" required class="form-control validate">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-indigo btn-rounded prevBtn float-left"
                                type="button">Previous</button>
                            <button class="btn btn-indigo btn-rounded nextBtn float-right" type="button">Next</button>
                        </div>
                    </div>

                    <!-- Third Step -->
                    <div class="row setup-content" id="step-11">

                        <div class="col-md-12">
                            <h3 class="font-weight-bold pl-0 my-4"><strong>You will be required to login once you have
                                    completed all necessary information.</strong></h3>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 70px;">
                            <div class="form-check md-form" style="margin-left: 10px;">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="" required>I confirm that the
                                    information I provided is accurate and can be verified with the Deprtment of
                                    Education and the Department of Home Affairs.
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-indigo btn-rounded prevBtn float-left"
                                type="button">Previous</button>
                            <button class="btn btn-default btn-rounded float-right" type="submit">Submit</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Steps form -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-indigo').addClass('btn-default');
                    $item.addClass('btn-indigo');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allPrevBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepSteps = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                prevStepSteps.removeAttr('disabled').trigger('click');
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='email'],input[type='password'],input[type='number'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-indigo').trigger('click');
        });
    </script>
    <script type="text/javascript">
        var cache_email;

        function captureEmail() {
            cache_email = document.forms["reg_form"]["email"].value;
            cache_aps = document.forms["reg_form"]["aps_score"].value;
            cache_english = document.forms["reg_form"]["english"].value;
            cache_math = document.forms["reg_form"]["mathematics"].value;
            cache_physics = document.forms["reg_form"]["physics"].value;

            createCookie("student_email", cache_email, 1);
            createCookie("student_aps", cache_aps, 1);
            createCookie("student_eng", cache_english, 1);
            createCookie("student_math", cache_math, 1);
            createCookie("student_phy", cache_physics, 1);
        }

        // Function to create the cookie 
        function createCookie(name, value, days) {
            var expires;

            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            }
            else {
                expires = "";
            }

            document.cookie = escape(name) + "=" +
                escape(value) + expires + "; path=/";
        } 
    </script>

</body>

</html>