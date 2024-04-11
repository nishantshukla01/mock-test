<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>{{$question_master->ExamData->exam_name}}</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.css">--}}
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
    <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation-icons/3.0/foundation-icons.min.css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
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
            margin: 2px 0px 0px 7px;
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

        .hnQ p {
            margin-bottom: 0px;
            display: inline;
            line-height: 28px;
        }

        .enQ p {
            margin-bottom: 0px;
            display: inline;
            line-height: 28px;
        }

        .hnQ div {
            margin-bottom: 0px;
            display: inline;
            line-height: 28px;
        }

        .enQ div {
            margin-bottom: 0px;
            display: inline;
            line-height: 28px;
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
            left: -22px;
            top: 0px;
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
            display: block;
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
            margin: 5px 0px 0px;
            padding: 0px 8px;
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
            /*margin: 0 0 0 0;*/
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

        .review-ans {
            background-color: #182a86;
            color: white;
        }

        .active-question {
            background-color: #57bce5 !important;
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

        /*.attempt_ansinnersection {*/
        /*background: #ececec;*/
        /*width: 30px;*/
        /*border: 1px solid #ccc;*/
        /*height: 30px;*/
        /*border-radius: 50%;*/
        /*text-align: center;*/
        /*padding-top: 3px;*/
        /*font-weight: 600;*/
        /*cursor: pointer;*/
        /*}*/

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
            height: 97%;
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
            width: 29px;
            border: 1px solid #ccc;
            height: 29px;
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

        .timer {
            position: absolute;
            top: 5px;
            right: 40px;
        }

        .timer p {
            font-size: 25px;
            font-weight: 500;
        }
    </style>
    <style>
        .questionForm {
            height: 500px;
            /*overflow: auto;*/
        }

        /* width */
        .scrollStyle::-webkit-scrollbar {
            width: 0px;
        }

        /* Track */
        .scrollStyle::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        .scrollStyle::-webkit-scrollbar-thumb {
            background: #0a1342;
            border-radius: 10px;
        }

        .q_div {
            min-height: 140px;
            max-height: 260px;
            overflow: auto;
        }

        .optDiv {
            /*min-height: 140px;*/
            max-height: 260px;
            overflow: auto;
        }

        .instructionDiv {
            height: 500px;
            overflow: auto;
        }

        /*#startButton {*/
        /*margin-top: 10px;*/
        /*}*/

        .instructionHeading {
            padding: 6px 15px 10px;
            color: white;
            /* border-bottom: 1px solid #ccc; */
            background-color: #0a0a48;
            font-size: 18px;
            margin-top: 5px;
            width: 100%;
            display: block;
        }

        .questionNoDiv {
            overflow: auto;
            max-height: 340px;
        }

        p.hnopt {
            padding: 9px 19px 0px;
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
                <ul class=" menu hide-for-small-only mb-0 py-1" style="list-style: none" data-dropdown-menu>
                    <li class="menu-text">Study With Sandeep Sir</li>
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

    <div class="col-lg-2 col-md-3 col-sm-3 p-0">
        <div class="shadow sidemunu_bar">
            <ul class="textseriousmark">
                <li>
                    <span class="answered"></span> Answered ({{$answered}})
                </li>
                <li>
                    <span class="Marked"></span> Visited ({{$visited + 1}})
                </li>
                <li>
                    <span class="notVisited"></span> Not Visited ({{$not_visited - 1}})
                </li>
                <li>
                    <span class="notanswered"></span> Not Answered ({{$not_answered}})
                </li>
            </ul>
            <div class="attempt_ans">
                <h3>{{$question_master->ExamData->exam_name}}</h3>
                <div class="questionNoDiv scrollStyle">
                    @if(count($questions)>0)
                        @foreach($questions as $q_index => $numbers)
                            <div class="attempt_ansinnersection @if($numbers->visited == 1 && $numbers->review == 0 && $numbers->result !='skip') right-ans @elseif($numbers->visited == 1 && $numbers->review == 1) review-ans @elseif($numbers->visited == 1 && $numbers->result == 'skip' ) wrong-ans @endif @if($question_master->current_question == $numbers->question_no) active-question @endif"
                                 data-qno="{{$numbers->question_no}}">
                                {{$numbers->question_no}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <input type="hidden" value="{{count($questions)}}" id="total_q"/>
        </div>
    </div>

    <div class="col-lg-10 col-md-9 col-sm-9">
        <div id="quizContainer" class="callout default-primary-color  small-12  shadow">
            <div class="row">
                <div id="quizNotify" class="message small-11 columns">
                    <span class="instructionHeading">Read the instruction carefully</span>
                    <div class="instructionDiv scrollStyle">
                        {!!$question_master->ExamData->ExamInstructionData->instruction  !!}
                    </div>
                    <div class="quizButton large-2 float-right">
                        <input type="button" id="startButton" class="buttons" value="Start quiz"/>
                    </div>
                </div>
            </div>
            <div class="row">

                <div id="formContainer" class="main">

                </div>
            </div>
            <div class="row">
                <div id="quizButtons" class="quizButtons large-10 medium-10 columns">
                    <div id="previous" class="quizButton large-2">
                        <input type="button" id="prevButton" class="prev_button hide buttons" value="Previous"/>
                    </div>
                    <div id="next" class="quizButton large-2 next_button_outer">
                        <input type="button" id="nextButton" class="next_button hide buttons" value="Next"/>
                    </div>
                    <div id="score" class="quizButton large-2">
                        <input type="button" id="scoreButton" class="scror_button hide buttons" value="Submit"/>
                    </div>
                    <input type="hidden" value="0" id="index"/>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.js"></script>
<script>
    let hr = 0;
    let min = 0;
    let sec = 0;
    // document.cookie = "time= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    // console.log(document.cookie);
    $(document).foundation();

    var topBarLeft = document.getElementById("topBarLeft"),
        topBarRight = document.getElementById("topBarRight"),
        total = document.getElementById("total");

    var welcome = document.getElementById("welcome");
    var message = document.getElementById("message");
    var results = document.getElementById("results");


    $(document).ready(function () {
        sessionStorage.clear();
        $(`#startButton`).click(function () {
            showQuestion();
        });
    });

    function startQuiz() {

        // showQuestion();
    }

    function showQuestion() {
        // showQuizButtons();
        // debugger;
        let id = '{{encrypt($question_master->id)}}';
        let q_no = '{{encrypt($question_master->current_question)}}';
        $.ajax({
            url: '{{route('start.mocktest')}}',
            type: 'post',
            data: {id, q_no},
            beforeSend: function () {

            },
            success: function (response) {
                if (response.success === true) {
                    $(`#quizNotify`).addClass('hide');

                    $(`#formContainer`).html(response.view);
                    $(`#index`).val(response.index);
                    let current_clock = sessionStorage.getItem("current_clock");
                    if (current_clock) {
                        let SessionClock = JSON.parse(current_clock);
                        hr = parseInt(SessionClock[0].hr);
                        min = parseInt(SessionClock[0].min);
                        sec = parseInt(SessionClock[0].sec);
                    } else {
                        hr = parseInt(response.hr);
                        min = parseInt(response.min);
                        sec = parseInt(response.sec);
                        let TimerClock = [
                            {
                                'hr': hr,
                                'min': min,
                                'sec': sec
                            }
                        ];
                        sessionStorage.setItem('current_clock', JSON.stringify(TimerClock));
                        // console.log(JSON.stringify(TimerClock));
                    }
                    showQuizButtons();
                    // intervel();
                } else {
                    // console.log(response);
                    $.alert({
                        icon: 'fa fa-warning',
                        title: 'Alert!',
                        content: 'Simple alert!',
                        type: 'red'
                    });
                }
            }
        });
    }

    var quizLength = parseInt('{{count($questions)}}');
    var quizButtons = $(`#quizButtons`),
        prevButton = $(`#prevButton`),
        next = $(`#next`),
        nextButton = $(`#nextButton`),
        scoreButton = $(`#scoreButton`);
    $(document).ready(function () {
        showQuizButtons();
        nextButton.click(function () {
            nextQuestion(this);
        });
        prevButton.click(function () {
            previousQuestion(this);
        });
        scoreButton.click(function () {
            let dis = $(this);
            $.confirm({
                title: 'Confirm!',
                content: 'Submit Test?',
                buttons: {
                    confirm: function () {
                        showScore(dis);
                    },
                    cancel: function () {

                    },
                }
            });
        });


    });

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

    function showQuizButtons() {
        // debugger;
        let index = parseInt($(`#index`).val());
        let total = parseInt($(`#total_q`).val());
        if (index === 0) {
            // prevButton.addClass("hide");
            nextButton.addClass("hide");
        }
        if (index === 1) {
            //there is no previous question when first question is shown
            prevButton.addClass("hide");
            // nextButton.addClass("hide");
        }
        if (index > 1) {
            prevButton.removeClass("hide");
        }
        if (index > total) {
            //only if last question is shown user can see the score
            scoreButton.removeClass("hide");
            nextButton.addClass("hide");
        } else if (index > 0) {
            nextButton.removeClass("hide");
            scoreButton.addClass("hide");
        }
    }

    function nextQuestion(dis) {

        //shows next question only if current question has been answered
        let storedAnswers = true,
            qNo = $(`#form`).data('qid'),
            qId = $(`#form`).data('id'),
            qAns = '';
        $(`.radio`).each(function () {
            if ($(this).children().is(':checked')) {
                qAns = $(this).children().val();
            }
        });

        if (storedAnswers === false) {
            // warning.innerHTML = "Please choose an answer!";
            return;
        }
        storeProgress(dis, qId, qAns, qNo);
    }


    function storeProgress(dis, id, ans, qno) {
        let hr_store,
            min_store,
            sec_store;
        let current_clock = sessionStorage.getItem("current_clock");
        if (current_clock) {
            let SessionClock = JSON.parse(current_clock);
            hr_store = SessionClock[0].hr;
            min_store = SessionClock[0].min;
            sec_store = SessionClock[0].sec;
            $.ajax({
                url: '{{route('client.mocktest.store.ans')}}',
                type: 'post',
                data: {id, ans, qno, hr_store, min_store, sec_store},
                beforeSend: function () {

                },
                success: function (response) {
                    if (response.success === true) {
                        if (hr_store == 0 && min_store == 0 && sec_store == 1) {
                            showScore(dis);
                        } else {
                            if (response.finish === true) {
                                $(`#index`).val(response.index);
                                showQuizButtons();
                            } else {
                                $(`#formContainer`).html(response.view);
                                $(`.sidemunu_bar`).load(window.location.href + " .sidemunu_bar");
                                $(`#index`).val(response.index);
                                showQuizButtons();
                            }

                            // hr = response.hr;
                            // min = response.min;
                            // sec = response.sec;
                        }

                        // intervel();
                    } else {
                        console.log(response);
                        $.alert({
                            icon: 'fa fa-warning',
                            title: 'Alert!',
                            content: 'Simple alert!',
                            type: 'red'
                        });
                    }
                }
            });
        } else {
            // alert('Please reload the page');
        }
    }

    function previousQuestion(dis) {
        //shows previous question, with chosen answer checked
        let hr_store,
            min_store,
            sec_store;
        let current_clock = sessionStorage.getItem("current_clock");
        if (current_clock) {
            let SessionClock = JSON.parse(current_clock);
            hr_store = SessionClock[0].hr;
            min_store = SessionClock[0].min;
            sec_store = SessionClock[0].sec;
        }
        let qNo = $(`#form`).data('qid'),
            qId = $(`#form`).data('id');
        $.ajax({
            url: '{{route('client.mocktest.previous')}}',
            type: 'post',
            data: {qNo, qId, hr_store, min_store, sec_store},
            beforeSend: function () {
                $(dis).attr('disabled', true);
            },
            success: function (response) {
                $(dis).attr('disabled', false);
                if (response.success === true) {
                    $(`#formContainer`).html(response.view);
                    $(`.sidemunu_bar`).load(window.location.href + " .sidemunu_bar");
                    $(`#index`).val(response.index);
                    showQuizButtons();
                    // hr = response.hr;
                    // min = response.min;
                    // sec = response.sec;
                    // intervel();
                } else {
                    console.log(response);
                    $.alert({
                        icon: 'fa fa-warning',
                        title: 'Alert!',
                        content: 'Simple alert!',
                        type: 'red'
                    });
                }
            }
        })
    }

    function showScore(dis) {
        let id = '{{encrypt($question_master->id)}}';
        $.ajax({
            url: '{{route('client.mocktest.submit')}}',
            type: 'post',
            data: {id},
            beforeSend: function () {
                $(dis).attr('disabled', true);
            },
            success: function (response) {
                $(dis).attr('disabled', false);
                if (response.success === true) {
                    window.location.href = '{{route('client.mocktest.result',['slug'=>$slug,'id'=>\Illuminate\Support\Facades\Auth::id()])}}';
                } else {
                    console.log(response);
                    $.alert({
                        icon: 'fa fa-warning',
                        title: 'Alert!',
                        content: 'Simple alert!',
                        type: 'red'
                    });
                }
            }
        });


    }

    function intervel() {
        setInterval(function () {
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
                let TimerClock = [
                    {
                        'hr': hr,
                        'min': min,
                        'sec': sec
                    }
                ];
                // $('.resend-otp').html(`<a href="javascript:void(0);" onclick="send_it(${mobile})">Resend OTP </a>`);
                $('.resend-otp').text(`${formatted_string('00', hr, 'l')}:${formatted_string('00', min, 'l')}:${formatted_string('00', sec, 'l')}`);
                clearInterval();
                nextQuestion($(`#nextButton`));
                sessionStorage.clear();
            } else {
                $('.resend-otp').text(`${formatted_string('00', hr, 'l')}:${formatted_string('00', min, 'l')}:${formatted_string('00', sec, 'l')}`);
                let TimerClock = [
                    {
                        'hr': hr,
                        'min': min,
                        'sec': sec
                    }
                ];
                sessionStorage.setItem('current_clock', JSON.stringify(TimerClock));
            }
        }, 1000);
    }
</script>
</body>

</html>
