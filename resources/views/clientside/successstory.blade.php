@extends('clientside.Master.main')
@section('title','Courses')
@section('content')
<div class="about_banner">
    <div class="">
        <h2 class="aboutus">
            Success Story

        </h2>
        <p class="text-light">
            <a href="#" class="text-light">Home</a>
            <span class="greter_then mx-2">></span>
            <a href="#" class="text-light">
                Success Story
            </a>
        </p>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="row">
            <div class="media_success" onclick="openModal();currentSlide(1)">
                <div class="layer">
                    <p>+ Paul Gilmore</p>
                </div>
                <img src="https://cdnwp.tonyrobbins.com/wp-content/uploads/2016/09/Life-coach-vs-Therapist-e1478726377264.jpg" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(2)">
                <div class="layer">
                    <p>+ M. O' Neil</p>
                </div>
                <img src="https://images.unsplash.com/photo-1443397646383-16272048780e?dpr=1&auto=format&fit=crop&w=1199&h=899&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(3)">
                <div class="layer">
                    <p>+ N. Mehta</p>
                </div>
                <img src="https://www.dervishconsulting.com/images/CoactiveCoaching_2people.jpg" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(4)">
                <div class="layer">
                    <p>+ Paul Gilmore</p>
                </div>
                <img src="https://images.unsplash.com/photo-1431818563807-927945852ab6?dpr=1&auto=format&fit=crop&w=1199&h=899&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(5)">
                <div class="layer">
                    <p>+ M. O' Neil</p>
                </div>
                <img src="https://images.unsplash.com/photo-1443397646383-16272048780e?dpr=1&auto=format&fit=crop&w=1199&h=899&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(6)">
                <div class="layer">
                    <p>+ N. Mehta</p>
                </div>
                <img src="https://images.unsplash.com/photo-1442965416224-f6a7eca980fa?dpr=1&auto=format&fit=crop&w=1199&h=799&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(7)">
                <div class="layer">
                    <p>+ Paul Gilmore</p>
                </div>
                <img src="https://images.unsplash.com/photo-1431818563807-927945852ab6?dpr=1&auto=format&fit=crop&w=1199&h=899&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(8)">
                <div class="layer">
                    <p>+ M. O' Neil</p>
                </div>
                <img src="https://images.unsplash.com/photo-1443397646383-16272048780e?dpr=1&auto=format&fit=crop&w=1199&h=899&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
            <div class="media_success" onclick="openModal();currentSlide(9)">
                <div class="layer">
                    <p>+ N. Mehta</p>
                </div>
                <img src="https://images.unsplash.com/photo-1442965416224-f6a7eca980fa?dpr=1&auto=format&fit=crop&w=1199&h=799&q=80&cs=tinysrgb&crop=" alt="" />
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal_make">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content_make">

        <!-- <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="img_nature_wide.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="img_snow_wide.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="img_mountains_wide.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="img_lights_wide.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

        <div class="caption-container">
            <p id="caption"></p>
        </div>


        <div class="column">
            <img class="demo cursor" src="https://images.unsplash.com/photo-1431818563807-927945852ab6?dpr=1&auto=format&fit=crop&w=1199&h=899&q=80&cs=tinysrgb&crop=" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
        </div>

    </div>
</div>
<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
@stop
