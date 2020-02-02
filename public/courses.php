<?php

session_start();

$student_email = $_SESSION['student_email'];
$rank_message = 'Your ranking is looking good. Send your application to complete the process.';
$available_courses = '';
/*
$email = $_SESSION['student_email'];
$aps = $_SESSION['student_aps'];
$eng = $_SESSION['student_english'];
$math = $_SESSION['student_math'];
$phy = $_SESSION['student_physics'];
*/
$aps = 24;
$eng = 4;
$math = 4;
$phy = 5;


function check()
{
    require('../connect.php');

    $sql = "SELECT course_name,aps FROM course WHERE english <= $eng AND maths <= $math AND physics <= $phy AND aps <= $aps";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $rank_message = 'Your ranking does not meet the course requirements. Please consider the below courses.';

        while ($row = $result->fetch_assoc()) {
            $available_courses .= "<li>" . $row["course_name"] . " - APS:" . $row["aps"]. "</li>";
        }
        
    } else {
        $rank_message = 'We regret to inform you that your marks are too low to be ranked in any of our courses.';
    }

    $conn->close();
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Welcome</title>
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
            <a class="navbar-brand" href="./dashboard.html">
                <img src="img/overlays/tut_facelogo.png" width="50" alt="">
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./dashboard.html">Dashdoard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./myprofile.html">My Profile
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./courses.html">Courses
                        </a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a class="nav-link">Thulani Nkabini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" target="_blank">
                            | <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <h1 align="center" style="color:white">Choose your career path</h1>

    <div class="container" style="margin-top: 50px;">

        <!--Grid row-->
        <div class="row">

            <!--COURSE 1 CARD-->
            <div class="col-md-4 mb-4">

                <!-- Card -->
                <div class="card gradient-card">

                    <div class="card-image" style="background-image: url(./img/overlays/card_bg_1.jpg)">

                        <!-- Content -->
                        <a href="#!">
                            <div class="text-white d-flex h-100 mask blue-gradient-rgba">
                                <div class="first-content align-self-center p-3">
                                    <h3 class="card-title">COMPUTER SYSTEMS</h3>
                                    <p class="lead mb-0">(NDCY03) - NQF Level 6</p>
                                </div>
                            </div>
                        </a>

                    </div>

                    <!-- Data -->
                    <div class="third-content ml-auto mr-4 mb-2">
                        <p class="text-uppercase text-muted">Required APS</p>
                        <h4 class="font-weight-bold float-right" id="NDCY03_aps">24</h4>
                    </div>

                    <!-- Content -->
                    <div class="card-body white">
                        <button type="button" id="btn-1" class="btn btn-primary mt-5 float-right" onclick="openModal(1,'COMPUTER SYSTEMS (NDCY03) - NQF Level 6',24,4,4,4)">
                            Apply
                        </button>
                        <h4 class="text-uppercase font-weight-bold my-4">Requirements</h4>
                        <p class="text-muted" align="justify">English: <strong id="NDCY03_english">4</strong></p>
                        <p class="text-muted" align="justify">Mathematics: <strong id="NDCY03_math">4</strong></p>
                        <p class="text-muted" align="justify">Physical Science: <strong id="NDCY03_physics">4</strong>
                        </p>
                    </div>

                    <div>

                    </div>

                </div>
                <!-- Card -->

            </div>
            <!--COURSE 1 CARD-->


        </div>
        <!--Grid row-->
    </div>



    <!-- Modal: modalPoll -->
    <div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead" id="modal_course">
                    </p>

                    <button type="button" class="close" onclick="closeModal()" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                        <p>
                            <strong>Your opinion matters</strong>
                        </p>
                        <p>Discover your ranking below and send your application.
                        </p>
                    </div>

                    <hr>

                    <!-- Radio -->
                    <p class="text-center">
                        <strong>Your rank</strong>
                    </p>
                    <h1 align="center">61</h1>
                    <!-- Radio -->

                    <p class="text-center">
                        <?php echo $rank_message;?>
                    </p>
                    <ul>
                        <?php echo $available_courses;?>
                    </ul>

                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <form action="">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Send
                            <i class="fa fa-paper-plane ml-1"></i>
                        </button>
                        <a type="button" class="btn btn-outline-primary waves-effect" onclick="closeModal()">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalPoll -->

    <!-- Modal: modalPoll -->
    <div class="modal fade right" id="modalPoll-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">COMPUTER SYSTEMS (Extended) (NDCYF0) - NQF Level 6
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                        <p>
                            <strong>Your opinion matters</strong>
                        </p>
                        <p>Discover your ranking below and send your application.
                        </p>
                    </div>

                    <hr>

                    <!-- Radio -->
                    <p class="text-center">
                        <strong>Your rank</strong>
                    </p>
                    <h1 align="center">5</h1>
                    <!-- Radio -->

                    <p class="text-center">
                        Your ranking is looking good. Send your application to complete the process.
                    </p>

                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-primary waves-effect waves-light">Send
                        <i class="fa fa-paper-plane ml-1"></i>
                    </a>
                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" onmouseout="removechange()">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalPoll -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
        // Animations initialization
        //new WOW().init();

        function changeOne(course) {
            $('#btn-one').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Applying...').attr('disabled', true);
        }

        function changeTwo(course) {
            $('#btn-two').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Applying...').attr('disabled', true);
        }

        function removechange() {
            $('#btn-one').html('Apply').attr('disabled', false);
            $('#btn-two').html('Apply').attr('disabled', false);
        }

        var button_id;
        var course_id;
        var course_name;
        var course_aps;
        var course_eng;
        var course_math;
        var course_phy;

        function openModal(id, course, aps, eng, math, phy) {

            course_id = id;
            button_id = '#btn-' + course_id;
            course_name = course;
            course_aps = aps;
            course_eng = eng;
            course_math = math;
            course_phy = phy;
            $('#modal_course').html(course_name);
            $('#modalPoll-1').addClass('show').attr('style', 'display:block;');
            $(button_id).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Applying...').attr('disabled', true);

            //play here
            console.log("Washa");
            checkIfQualifies(course_aps, course_eng, course_math, course_phy);
        }

        // Compares course qualification criteria with the marks the user got
        function checkIfQualifies(aps, english, maths, physics) {

            var student_aps = 24;
            var student_eng = 4;
            var student_math = 4;
            var student_phy = 5;

            if (!(aps <= student_aps && english <= student_eng && maths <= student_math && physics <= student_phy)) {
                
                alert("You don't qualify bitch");
                <?php check();?>
                return false;

            }
        }

        function closeModal() {
            
            $('#modalPoll-1').removeClass('show').attr('style', 'display:none;');
            $(button_id).html('Apply').attr('disabled', false);

        }

    </script>

</body>

</html>