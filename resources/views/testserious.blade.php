<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>CodePen - Quiz app</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
    <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation-icons/3.0/foundation-icons.min.css'> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .title-bar {
            background: #689F38;
            padding: 0.9rem;
            margin-top: -1rem;
        }

        .next_button_outer {
            display: inline;
            float: right;
        }

        .radio_button {
            width: 100%;
            border: 1px solid #cccccc40;
            padding: 9px 34px;
            font-size: 15px;
            margin-right: 0px !important;
            margin-left: 0px !important;
            border-radius: 2px;
            font-weight: 400;
            /* float: right; */
        }

        .top-bar {
            background: #0a1342;
            color: #ffffff;
            /* margin-top: -1rem; */
        }

        .top-bar ul {
            background: #689f3800;
        }

        .top-bar-right ul li {
            list-style-type: none;
            text-align: right;
            padding: 0.2rem;
            border-top: 0.1rem solid #8BC34A;

        }

        .top-bar-right ul li:first-child {
            border-top: none;
        }

        .top-bar ul li a {
            color: #ffffff;
            transition: color 0.5s ease;
        }

        .top-bar ul li a:hover {
            color: #7c4dff;
        }

        li.is-submenu-item.is-accordion-submenu-item {
            background-color: #689F38;
        }

        .is-accordion-submenu-parent > a::after {
            border-color: #ffffff transparent transparent;
            right: 0;
        }

        /* general */

        .message {
            margin: 2px 0px 0px 69px;
            /* padding: 1.5rem; */
            background-color: #ffffff;
            color: #ffffff;
            width: 100%;
        }

        #message {
            margin: 0 0 1.5rem 0;
            color: #ffffff;
            border-radius: 0.5rem;
        }

        #notify {
            color: #212121;
        }

        .results {
            margin: 1rem 0;
            color: #000000;
        }

        .red {
            color: #f5543a;
        }

        .green {
            color: #b4f36b;
        }

        .success {
            color: #3adb76;
        }

        .warning {
            color: #ffae00;
        }

        .progress {
            display: none;
        }

        /*.answer div { */
        .radio {
        }

        .radio input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .radio input[type="radio"] + .radio-label:before {
            content: '';
            background: #f4f4f4;
            border-radius: 100%;
            border: 1px solid #b4b4b4;
            display: inline-block;
            width: 15px;
            height: 15px;
            position: relative;
            left: -15px;
            margin-right: 1em;
            vertical-align: middle;
            cursor: pointer;
            text-align: center;
            transition: all 250ms ease;
        }

        .radio input[type="radio"]:checked + .radio-label:before {
            background-color: #7c4dff;
            box-shadow: inset 0 0 0 4px #f4f4f4;
        }

        .radio input[type="radio"]:focus + .radio-label:before {
            outline: none;
            border-color: #7c4dff;
        }

        .radio input[type="radio"]:disabled + .radio-label:before {
            box-shadow: inset 0 0 0 4px #f4f4f4;
            /* //border-color: darken(#f4f4f4, 25%); */
            border-color: #b4b4b4;

        }

        .radio input[type="radio"]:empty + .radio-label:before {
            margin-right: 0;
        }

        input[type="text"],
        input[type="password"] {
            margin-bottom: 0.1rem;
        }

        input[type="button"],
        input[type="submit"] {
            border: none;
            border-radius: 5rem;
            background-color: #0a1342;
            padding: 11px 44px;
            margin-right: 1rem;
            color: #fff;
            transition: background-color 0.5s ease;
        }

        input[type="button"]:focus,
        input[type="submit"]:focus {
            outline: 0;
        }

        input[type="button"]:hover,
        input[type="submit"]:hover {
            color: #000000;
            background-color: #FFC107;
        }

        input#deleteBtn {
            float: right;
            background-color: #FFC107;
            /* //amber; */
            margin-top: 2rem;
        }

        input#deleteBtn:hover {
            /* //color: #ffffff; */
            background-color: #7c4dff;
            /* //deep purple */
        }

        label {
            text-align: left;
            font-weight: bold;
        }

        .buttons {
            padding: 1rem;
            font-size: smaller;
            font-weight: bold;
            /* //  margin: 0.5rem 0 2rem 0; */
        }

        .show {
            display: visible;
        }

        .hide {
            display: none;
        }

        /* login section */
        .loginMain {
            margin-top: 1.5rem;
            padding: 0.5rem;
        }

        .login,
        .submit,
        .warning {
            margin: 0rem 1.5rem 1.5rem 1.5rem;
        }

        .warning {
            font-weight: bold;
            color: #D32F2F;
            /* //margin: 0.5rem 0 1rem 0 */
        }

        .submit {
            margin: 1rem 1.5rem;
            color: #ffffff;
        }

        .notify {
            margin: 1rem 1.5rem;
            font-weight: bold;
            /* //color: #D32F2F; */
        }

        /* quiz section */
        .callout {
            background-color: #ffffff;
            border: 1px solid #cacaca7a;
            /* border-radius: 1.8rem; */
            margin: 50px 0px;
            padding: 0px 16px;
        }

        .row {
            margin: 0px !important;
            max-width: 100% !important;
            width: 100%;
        }

        .main,
        .quizButtons {
            margin: 10px 0px;
            width: 100%;
        }

        .main h3 {
            /* margin: 1.5rem 0; */
            font-size: 16px;
            width: 100%;
            margin: 12px 0px 22px;
            padding: 0px 10px;
        }

        .main div {
            margin: 0 0 0.7rem 0.5rem;
        }

        .answer p {
            margin-bottom: 0.1rem;
        }

        .quizButtons {
            color: #ffffff;
            padding: 0;
        }

        .quizButton {
            display: inline-block;
        }

        #scoreButton {
            color: #000000;
            background-color: #FFC107;
        }

        #scoreButton:hover {
            color: #FFFFFF;
            background-color: #7c4dff;
        }

        .prev_button {
            border: none;
            border-radius: 5rem;
            background-color: #0a1342;
            padding: 5px 50px;
            margin-right: 1rem;
            color: #fff;
            transition: background-color 0.5s ease;
            font-weight: 600;
        }

        .next_button {
            border: none;
            border-radius: 5rem;
            background-color: #0a1342;
            padding: 5px 50px;
            margin-right: 1rem;
            position: relative;
            right: 0px;
            color: #fff;
            transition: background-color 0.5s ease;
            font-weight: 600;
        }

        .answered {
            height: 15px;
            width: 15px;
            background-color: #09790e;
            display: inline-block;
            border-radius: 50%;
            position: relative;
            top: 3px;
            margin-right: 13px;
        }

        .wrong-ans {
            background-color: #c10909 !important;
            color: white;
        }

        .Marked {
            height: 15px;
            width: 15px;
            background-color: #182a86;
            display: inline-block;
            border-radius: 50%;
            position: relative;
            top: 3px;
            margin-right: 13px;
        }

        .right-ans {
            background-color: #019e64 !important;
            color: white;
        }

        .notVisited {
            height: 15px;
            width: 15px;
            background-color: #bdbdbd;
            display: inline-block;
            border-radius: 50%;
            position: relative;
            top: 3px;
            margin-right: 13px;
        }

        .notanswered {
            height: 15px;
            width: 15px;
            background-color: #F44336;
            display: inline-block;
            border-radius: 50%;
            position: relative;
            top: 3px;
            margin-right: 13px;
        }

        .attempt_ansinnersection {
            background: #ececec;
            width: 30px;
            border: 1px solid #ccc;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            padding-top: 3px;
            font-weight: 600;
        }

        .attempt_ans {
            padding: 17px 20px;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .results {
            color: white;
            margin-top: 1.5rem;
        }

        .sidemunu_bar {
            margin-top: 19px;
            max-height: 100%;
            height: 600px;
        }

        .attempt_ans h3 {
            font-size: 17px;
            border-bottom: 1px solid #cccccc5e;
            padding-bottom: 10px;
        }

        /* score display section */
        #myScoreDisplay {
            z-index: 10;
            position: absolute;
            right: -20rem;
            top: 5rem;
            -webkit-transform: translate(0rem, 0);
            transform: translate(0rem, 0);
            transition: transform 0.3s ease;
        }

        #myScoreDisplay.slideInMyScore {
            transform: translate(-20rem, 0);
            -webkit-transform: translate(-20rem, 0);
        }

        #showUserScores {
            /* margin: 1rem;
            padding: 1rem 1.5rem; */
            color: #ffffff;
            background: #7c4dff;
            border-radius: 2rem;
        }

        .emphasis {
            padding: 0.5rem;
            background-color: #FFC107;
            text-transform: uppercase;

        }

        p.emphasis {
            color: #7c4dff;
            margin-bottom: 0;
            font-weight: bold;
        }

        .attempt_ansinnersection {
            background: #ececec;
            width: 30px;
            border: 1px solid #ccc;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            padding-top: 3px;
            font-size: 12px;
            line-height: 22px;
            margin-bottom: 6px;
            display: inline-block;
            font-weight: 600;
            margin-right: 3px;
        }

        .headding_title {
            font-weight: 600;
            font-size: 18px;
            border-bottom: 1px solid #cccccc8a;
            padding: 7px 0px 6px;
        }

        .textseriousmark li {
            list-style: none;
            line-height: 40px;
        }

        .hidden {
            display: none !important;
        }

        .sidemunu_bar {
            margin-top: 19px;
        }

        /*
 * Hide only visually, but have it available for screen readers:
 * http://snook.ca/archives/html_and_css/hiding-content-for-accessibility
 */

        .visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        /*
 * Extends the .visuallyhidden class to allow the element
 * to be focusable when navigated to via the keyboard:
 * https://www.drupal.org/node/897638
 */

        .visuallyhidden.focusable:active,
        .visuallyhidden.focusable:focus {
            clip: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            position: static;
            width: auto;
        }

        /*
 * Hide visually and from screen readers, but maintain layout
 */

        .invisible {
            visibility: hidden;
        }

        /*
 * Clearfix: contain floats
 *
 * For modern browsers
 * 1. The space content is one way to avoid an Opera bug when the
 *    `contenteditable` attribute is included anywhere else in the document.
 *    Otherwise it causes space to appear at the top and bottom of elements
 *    that receive the `clearfix` class.
 * 2. The use of `table` rather than `block` is only necessary if using
 *    `:before` to contain the top-margins of child elements.
 */

        .clearfix:before,
        .clearfix:after {
            content: " ";
            /* 1 */
            display: table;
            /* 2 */
        }

        .clearfix:after {
            clear: both;
        }

        /* ==========================================================================
   EXAMPLE Media Queries for Responsive Design.
   These examples override the primary ('mobile first') styles.
   Modify as content requires.
   ========================================================================== */

        @media only screen and (min-width: 35em) {

            /* Style adjustments for viewports that meet the condition */
            .top-bar-left ul li {
                font-size: 1.5rem;
            }
        }

        @media print,
        (-webkit-min-device-pixel-ratio: 1.25),
        (min-resolution: 1.25dppx),
        (min-resolution: 120dpi) {
            /* Style adjustments for high resolution devices */
        }

        /* ==========================================================================
   Print styles.
   Inlined to avoid the additional HTTP request:
   https://www.phpied.com/delay-loading-your-print-css/
   ========================================================================== */

        @media print {

            *,
            *:before,
            *:after,
            *:first-letter,
            *:first-line {
                background: transparent !important;
                color: #000 !important;
                /* Black prints faster:
                                   http://www.sanbeiji.com/archives/953 */
                box-shadow: none !important;
                text-shadow: none !important;
            }

            a,
            a:visited {
                text-decoration: underline;
            }

            a[href]:after {
                content: " (" attr(href) ")";
            }

            abbr[title]:after {
                content: " (" attr(title) ")";
            }

            /*
     * Don't show links that are fragment identifiers,
     * or use the `javascript:` pseudo protocol
     */
            a[href^="#"]:after,
            a[href^="javascript:"]:after {
                content: "";
            }

            pre,
            blockquote {
                border: 1px solid #999;
                page-break-inside: avoid;
            }

            /*
     * Printing Tables:
     * http://css-discuss.incutio.com/wiki/Printing_Tables
     */
            thead {
                display: table-header-group;
            }

            tr,
            img {
                page-break-inside: avoid;
            }

            img {
                max-width: 100% !important;
            }

            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }

            h2,
            h3 {
                page-break-after: avoid;
            }
        }
    </style>
    <script>
        window.console = window.console || function (t) {
        };
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>

<body translate="no">


<div data-sticky-container>
    <div class="small-12 sticky" data-sticky data-sticky-on="small">
        <!-- <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Study Width Sandeep Sir</div>
        </div> -->
        <div class="top-bar" id="main-menu">
            <div id="topBarLeft" class="top-bar-left">
                <ul class=" menu hide-for-small-only" data-dropdown-menu>
                    <li class="menu-text">Study Width Sandeep Sir</li>
                </ul>
            </div>
            <div id="topBarRight" class="top-bar-right">
                <ul class="menu accordion-menu vertical medium-horizontal"
                    data-responsive-menu="accordion medium-dropdown">
                    <li>
                        <a id="myScores" href="#" data-toggle=""></a></li>

                </ul>
            </div>
        </div>

        <div id="myScoreDisplay" class="row " data-toggler=".slideInMyScore">
            <div id="showUserScores" class=""></div>
        </div>
    </div>
</div>


<div class="row m-0">

    <div class="col-lg-3 col-md-3 col-sm-3 p-0">
        <div class="shadow sidemunu_bar">
            <ul class="textseriousmark">
                <li>
                    <span class="answered"></span> Answered (6)
                </li>
                <li>
                    <span class="Marked"></span> Marked (6)
                </li>
                <li>
                    <span class="notVisited"></span> Not Visited (88)
                </li>
                <li>
                    <span class="notanswered"></span> Not Answered (88)
                </li>
            </ul>
            <div class="attempt_ans">
                <h3>Maths</h3>
                <p class="resend-otp">
                </p>
                <div class="attempt_ansinnersection right-ans">
                    1
                </div>
                <div class="attempt_ansinnersection right-ans">
                    2
                </div>
                <div class="attempt_ansinnersection right-ans">
                    3
                </div>
                <div class="attempt_ansinnersection right-ans">
                    4
                </div>
                <div class="attempt_ansinnersection right-ans">
                    5
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    6
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    7
                </div>
                <div class="attempt_ansinnersection ">
                    8
                </div>

                <div class="attempt_ansinnersection">
                    9
                </div>
                <div class="attempt_ansinnersection">
                    10
                </div>
                <div class="attempt_ansinnersection">
                    11
                </div>
                <div class="attempt_ansinnersection right-ans">
                    12
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    13
                </div>
                <div class="attempt_ansinnersection right-ans">
                    14
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    15
                </div>
                <div class="attempt_ansinnersection right-ans">
                    16
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    17
                </div>
                <div class="attempt_ansinnersection right-ans">
                    18
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    19
                </div>
                <div class="attempt_ansinnersection right-ans">
                    20
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    21
                </div>
                <div class="attempt_ansinnersection right-ans">
                    22
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    23
                </div>
                <div class="attempt_ansinnersection right-ans">
                    24
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    25
                </div>
                <div class="attempt_ansinnersection right-ans">
                    26
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    27
                </div>
                <div class="attempt_ansinnersection right-ans">
                    28
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    29
                </div>
                <div class="attempt_ansinnersection right-ans">
                    30
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    31
                </div>
                <div class="attempt_ansinnersection right-ans">
                    32
                </div>
                <div class="attempt_ansinnersection wrong-ans">
                    33
                </div>
                <div class="attempt_ansinnersection right-ans">
                    34
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-9">
        <div id="quizContainer" class="callout default-primary-color  small-12  shadow">

            <div class="row">
                <div id="quizNotify" class="message small-11 columns">
                    <div>
                        Question 2 of 100
                    </div>
                    <div class="">
                        <h4 id="message"></h4>
                    </div>
                    <div class="quizButton large-2">
                        <input type="button" id="startButton" class="buttons" value="Start quiz"/>
                    </div>
                    <div id="results" class="results"></div>
                    <div class="quizButtons ">
                    </div>
                </div>
            </div>

            <div class="row">

                <div id="formContainer" class="main ">
                    <div class="headding_title">Question 1 to 100</div>
                    <form id="form1" class="answer" action="" name="form1">
                    </form>
                </div>
            </div>

            <div class="row">
                <div id="quizButtons" class="quizButtons large-10 medium-10 columns">
                    <div id="previous" class="quizButton large-2">
                        <input type="button" id="prevButton" class="prev_button" class="buttons" value="Previous"/>
                    </div>
                    <div id="next" class="quizButton large-2 next_button_outer">
                        <input type="button" id="nextButton" class="next_button" class="buttons" value="Next"/>
                    </div>
                    <div id="score" class="quizButton large-2">
                        <input type="button" id="scoreButton" class="scror_button" class="buttons" value="Show Score"/>
                    </div>
                </div>
            </div>

            <div class="row large-10 medium-10 columns">

                <div class="warning">
                    <small id="warning" class=""></small>
                </div>
            </div>

            <div id="progressBar" class="">
                <div class="progress" role="progressbar" tabindex="0" aria-valuenow="0" aria-valuemin="0"
                     aria-valuetext="0 out of quizLength" aria-valuemax="3">
                        <span id="progressMeter" class="progress-meter" style="width: 25%">
                            <p id="progressMeterText" class="progress-meter-text"> </p>
                        </span>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
$hr = 01;
$min = 30;
$sec = 00;
?>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.js"></script>
<script>
    $(document).foundation()

    var topBarLeft = document.getElementById("topBarLeft"),
        topBarRight = document.getElementById("topBarRight"),
        total = document.getElementById("total");

    var welcome = document.getElementById("welcome");
    var message = document.getElementById("message");
    var results = document.getElementById("results");

    var startButton = document.getElementById("startButton"),
        quizContainer = document.getElementById("quizContainer"),
        quizNotify = document.getElementById("quizNotify"),
        quizLength = 0,
        choices = [],
        index = 0,
        formContainer = document.getElementById("formContainer"),
        form = document.form1,
        warning = document.getElementById("warning");

    var allQuestions = [{
        "question": "Q1.  Who is President of the United States?",
        "choices": ["Donald Trump", "Hillary Clinton", "Barack Obama", "George W. Bush"],
        "correctAnswer": 0
    },
        {
            "question": "Q2.  Who is Prime Minister of the United Kingdom?",
            "choices": ["David Cameron", "Gordon Brown", "Theresa May", "Tony Blair"],
            "correctAnswer": 2
        },
        {
            "question": "Q3.  Who is Prime Minister of the Netherlands?",
            "choices": ["Diederik Samson", "Marc Rutte", "Geert Wilders", "Alexander Pechtold"],
            "correctAnswer": 1
        },
        {
            "question": "Q4.  In which city does the Dutch government reside?",
            "choices": ["Rotterdam", "Amsterdam", "The Hague", "Utrecht"],
            "correctAnswer": 2
        }
    ];

    var storedAnswers = [];
    var storedScores = [];

    var quizButtons = document.getElementById("quizButtons"),
        prevButton = document.getElementById("prevButton"),
        next = document.getElementById("next"),
        nextButton = document.getElementById("nextButton"),
        scoreButton = document.getElementById("scoreButton");

    var scoreDisplay = document.getElementById("scoreDisplay"),
        myScores = document.getElementById("myScores");

    // var progressBar = document.getElementById("progressBar");
    // var progressMeter = document.getElementById("progressMeter");
    // var progressMeterText = document.getElementById("progressMeterText");
    // //quizButtons.classList.add("hide");
    //scoreDisplay.setAttribute("style", "display:visible");

    startButton.addEventListener("click", startQuiz);
    myScores.addEventListener("click", showUserScores);
    prevButton.addEventListener("click", previousQuestion);
    nextButton.addEventListener("click", nextQuestion);
    scoreButton.addEventListener("click", showScore);


    //shows welcome message and startbutton
    quizContainer.classList.remove("hide");
    // three parts of quizContainer:
    quizNotify.classList.remove("hide");
    formContainer.classList.add("hide");
    quizButtons.classList.add("hide");
    progressBar.classList.add("hide");
    progressBar.setAttribute("aria-valuemax", quizLength);

    // message.innerHTML = "Welcome to this quiz! <br />Would you like to start?";
    // startButton.setAttribute("style", "display:visible");


    function startQuiz() {
        index = 0;
        quizNotify.classList.add("hide");
        quizButtons.classList.remove("hide");
        progressBar.classList.remove("hide");

        if (storedAnswers.length != 0) {
            storedAnswers.length = 0; //empty the array
        }

        quizLength = allQuestions.length;
        showProgress(index);
        showQuestion();
    }

    function showQuestion() {
        showQuizButtons();
        if (index === quizLength) {
            return;
        }
        // display of question at given index:
        formContainer.classList.remove("hide")
        form.innerHTML = "";
        var quizItem = allQuestions[index];
        var q = document.createElement("h3");
        var text = document.createTextNode(quizItem.question);
        var storedAnswer = storedAnswers[index];

        q.appendChild(text);
        form.appendChild(q);

        // display of choices, belonging to the questions at given index:
        choices = allQuestions[index].choices;

        for (var i = 0; i < choices.length; i++) {
            var div = document.createElement("div");
            div.classList.add("radio");

            var input = document.createElement("input");
            input.setAttribute("id", i);
            input.setAttribute("type", "radio");
            input.setAttribute("name", "radio");

            if (i === quizItem.correctAnswer) {
                input.setAttribute("value", "1");
            } else {
                input.setAttribute("value", "0");
            }
            //if question has been answered already
            if (storedAnswer) {
                var id = storedAnswer.id;
                if (i == id) {
                    // if question is already answered, id has a value
                    input.setAttribute("checked", "checked");
                }
            }

            //if radiobutton is clicked, the chosen answer is stored in array storedAnswers
            input.addEventListener("click", storeAnswer);

            var label = document.createElement("label");
            label.setAttribute("class", "radio-label radio_button");
            label.setAttribute("for", i);
            var choice = document.createTextNode(choices[i]);
            label.appendChild(choice);

            div.appendChild(input);
            div.appendChild(label);

            form.appendChild(div);
        }


    }

    function showProgress(index) {
        ///update progress bar
        var increment = Math.ceil((index) / (quizLength) * 100);
        // var increment = index;
        progressMeter.style.width = (increment) + '%';
        progressMeterText.innerHTML = (index) + ' out of ' + quizLength;
        if (index === 0) {
            progressMeter.style.width = (25) + '%';
            progressMeter.style.background = "#ffffff";
            //progressMeterText.style.color = "000000";
        } else {
            progressMeter.style.background = "#689F38";
        }
    }

    function storeAnswer(e) {
        var element = e.target;
        var answer = {
            id: element.id,
            value: element.value
        };
        storedAnswers[index] = answer;
    }

    function showQuizButtons() {
        if (index === 0) {
            //there is no previous question when first question is shown
            prevButton.classList.add("hide");
        }
        if (index > 0) {
            prevButton.classList.remove("hide");
        }
        if (index === quizLength) {
            //only if last question is shown user can see the score
            scoreButton.classList.remove("hide");
            nextButton.classList.add("hide");
            //prevButton still visible so user can go back and change answers
            var h2 = document.createElement("h5");
            h2.innerHTML = "That's it! Would you like to see your score?";
            form.appendChild(h2);
        } else {
            nextButton.classList.remove("hide");
            scoreButton.classList.add("hide");
        }
    }

    // http://jsfiddle.net/hvG7k/
    function previousQuestion() {
        //shows previous question, with chosen answer checked
        index--;
        warning.innerHTML = "";
        form.innerHTML = "";
        $("#form1").fadeOut(0, function () {
            var show = showQuestion();
            $(this).attr('innerHTML', 'show').fadeIn(300);
        });
    }

    function nextQuestion() {
        //shows next question only if current question has been answered
        if (storedAnswers[index] == null) {
            warning.innerHTML = "Please choose an answer!";
            return;
        }

        index++;
        warning.innerHTML = "";
        form.innerHTML = "";
        $("#form1").fadeOut(0, function () {
            var show = showQuestion();
            $(this).attr('innerHTML', 'show').fadeIn(300);
        });
        showProgress(index);
    }

    function showScore() {
        form.innerHTML = "";
        prevButton.classList.add("hide");
        scoreButton.classList.add("hide");
        progressBar.classList.add("hide");

        quizNotify.classList.remove("hide");
        startButton.classList.remove("hide");

        var totalScore = 0;

        var output = "";
        var questionResult = "NA";

        for (var i = 0; i < storedAnswers.length; i++) {
            var score = parseInt(storedAnswers[i].value);
            if (score === 1) {
                questionResult = '<i class="fi-check green"></i>';

            } else {
                questionResult = '<i class="fi-x red"></i>';
            }
            output = output + '<p>Question ' + (i + 1) + ': ' + questionResult + '</p> ';
            totalScore += score;
        }

        if (totalScore === allQuestions.length) {
            message.innerHTML = "Great! You scored " + totalScore + " out of " + allQuestions.length + "!<br />You can do the quiz again, although you don't really need to!";
        } else if (totalScore <= 1) {
            message.innerHTML = "You could use a litte practice! You scored " + totalScore + " out of " + allQuestions.length + ".<br />Would you like to do the quiz again?";
        } else {
            message.innerHTML = "Well that's not too bad! You scored " + totalScore + " out of " + allQuestions.length + ".<br />Would you like to do the quiz again?";
        }

        results.innerHTML = output;
        // actualPlayer.score = totalScore;
        storedScores.push(totalScore);
        updateScore(totalScore);
    }


    //shows player's total score
    function showUserScores(e) {
        e.preventDefault();
        var showUserScores = document.getElementById("showUserScores");

        while (showUserScores.firstChild) {
            showUserScores.removeChild(showUserScores.firstChild);
        }
        if (myScores.innerHTML === "Show my scores") {
            myScores.innerHTML = "Hide my scores";
        } else if (myScores.innerHTML === "Hide my scores") {
            myScores.innerHTML = "Show my scores";
        }

        var userScores = storedScores;
        var h4 = document.createElement("h4");
        h4.innerHTML = "Your scores";
        var string = "";
        for (var i = 0; i < storedScores.length; i++) {
            string += storedScores[i] + "<br/>";
        }

        var p = document.createElement("p");
        p.setAttribute("id", "scores");

        if (userScores.length === 0) {
            string = "You don't have any scores yet";
        }
        p.classList.add("emphasis");
        p.innerHTML = string;
        showUserScores.appendChild(h4);
        showUserScores.appendChild(p);
    }

    function updateScore(score) {
        var showUserScores = document.getElementById("showUserScores");
        var scores = document.getElementById("scores");

        if (myScoreDisplay.classList.contains("slideInMyScore")) {
            scores.innerHTML = "";
            var string = "";
            for (var i = 0; i < storedScores.length; i++) {
                string += storedScores[i] + "<br/>";
            }


            scores.innerHTML = string;
        }
    }

    let x;
    let hr = 0,
        min = 0,
        sec = 0;

    /*Coockie*/
    checkCookie();

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }


    function checkCookie() {
        // debugger;
        var time = getCookie("time");
        if (time !== "") {
            let parseData = JSON.parse(time);
            hr = parseData.hr;
            min = parseData.min;
            sec = parseData.sec;
        } else {
            time = {
                "hr": 2,
                "min": 1,
                "sec": 0
            };
            let stringTime = JSON.stringify(time);
            if (stringTime !== "" && stringTime != null) {
                setCookie("time", stringTime, 1);
            }
        }
    }


    function formatted_string(pad, user_str, pad_pos) {
        if (typeof user_str === 'undefined')
            return pad;
        if (pad_pos === 'l') {
            return (pad + user_str).slice(-pad.length);
        }
        else {
            return (user_str + pad).substring(0, pad.length);
        }
    }


    interval = setInterval(function () {
        sec--;
        if (sec < 0) {

            if (min !== 0) {
                min = min - 1;
                sec = 59;
            } else {
                if (hr !== 0) {
                    hr = hr - 1;
                    min = 59;
                    sec = 59;
                } else {
                    hr = 0;
                    min = 0;
                    sec = 0;
                }
            }

        }
        // Display 'counter' wherever you want to display it.
        if (sec <= 0 && min <= 0 && hr <= 0) {
            // $('.resend-otp').html(`<a href="javascript:void(0);" onclick="send_it(${mobile})">Resend OTP </a>`);
            $('.resend-otp').text(`Resend OTP in :${formatted_string('00', hr, 'l')}:${formatted_string('00', min, 'l')}:${formatted_string('00', sec, 'l')}`);
            clearInterval(interval);
        } else {
            $('.resend-otp').text(`Resend OTP in :${formatted_string('00', hr, 'l')}:${formatted_string('00', min, 'l')}:${formatted_string('00', sec, 'l')}`);
            x = {
                "hr": hr,
                "min": min,
                "sec": sec
            };
            var cockiesss = JSON.stringify(x);

            setCookie("time", cockiesss, 1);
            // console.log(document.cookie);

            // $('.resend-otp').text(`Resend OTP in : ${min}:${formatted_string('00', sec, 'l')}`);
        }
    }, 1000);
</script>

</body>

</html>
