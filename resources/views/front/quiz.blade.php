@extends('front.layouts.app')

@section('content')
<!-- preloader - start -->
<div id="preloader" class="dia-preloader"></div>
<div class="up">
  <a href="#" id="scrollup" class="dia-scrollup text-center"><i class="fas fa-angle-up"></i></a>
</div>
      <!-- Start of header section
        ============================================= -->
        <header id="dia-header" class="dia-main-header">
          <div class="container">
            <div class="dia-main-header-content clearfix">
              <div class="dia-logo float-left">
                <a href="#"><img width="200" src="{{asset('front')}}/assets/img/slogo1.png" alt=""></a>
              </div>
              <div class="dia-main-menu-item float-right  bg-light">
                <nav class="dia-main-navigation  clearfix ul-li">
                  <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                    <li> <a href="{{route('front.home')}}">Home</a></li>
                    <li><a data-toggle="modal" data-target="#studentLoginForm" href="#">Login</a></li> 
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /desktop menu -->
            <div class="dia-mobile_menu relative-position">
              <div class="dia-mobile_menu_button dia-open_mobile_menu">
                <i class="fas fa-bars"></i>
              </div>
              <div class="dia-mobile_menu_wrap">
                <div class="mobile_menu_overlay dia-open_mobile_menu"></div>
                <div class="dia-mobile_menu_content">
                  <div class="dia-mobile_menu_close dia-open_mobile_menu">
                    <i class="far fa-times-circle"></i>
                  </div>
                  <div class="m-brand-logo text-center">
                    <a href="%21.html#"><img width="300" src="{{asset('front')}}/assets/img/d-agency/logo/logo2.png" alt=""></a>
                  </div>
                  <nav class="dia-mobile-main-navigation  clearfix ul-li">
                   <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                    <li> <a href="{{route('front.home')}}">Home</a></li>
                    <li><a data-toggle="modal" data-target="#studentLoginForm" href="#">Login</a></li> 
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /mobile-menu -->
          </div>
        </div>
      </header>
      @include('front.student-login-modal')
      <!-- End of header section
        ============================================= -->


          <!-- Start of Banner section
            ============================================= -->    
            <section id="dia-banner" class="dia-banner-section position-relative"> 

            </section>
      <!-- End of Banner section
        ============================================= -->

      <!-- Start of Service section
        ============================================= --> 
        <section id="dia-service" class="dia-service-section">
          <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong class="text-success">Message: {{  Session::get('message')  }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>      
            @endif
            <div class="dia-service-content">
              <div class="row">
                <div class="col-lg-12 col-md-12">

                  <div class="card">
                    <div class="card-header">  
                      <div id="hms" class="hms" hidden="hidden">01:30:00</div>
                      <div id="countTime"></div>
                    </div>


                    <div class="card-body py-5" id="fetchQuestion">

                      <div>
                        <h5 class="text-info">{{ $si }}.&nbsp;{{ $question->name }}</h5>
                        <div class="ans">
                          @php 
                          $options = App\Models\Option::where('question_id', $question->id)->get();
                          @endphp
                          @foreach($options as $option)
                          <label class="custom-control custom-radio">
                            <input
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            value="{{ $option->id }}"
                            onclick="count_mark(`{{ $question->id }}`, `{{ $option->id }}`);"
                            >
                            {{ $option->option_name }}
                          </label>
                          @endforeach
                        </div> 
                      </div>

                      <div>
                        <button class="btn btn-sm btn-primary" onclick="submit_answer(`{{$question->id}}`)">সাবমিট কর</button>
                        @if($question->id != 1)
                        <button class="btn btn-sm btn-primary" onclick="skip_now(`{{$question->id}}`, `{{$question->name}}`, `{{ $si }}`)">পরে দেব</button>
                        @endif
                      </div>
                    </div>


                      <div class="card-footer text-muted">
                        আমার সবচেয়ে বড় শক্তি আমার দেশের মানুষকে ভালবাসি, সবচেয়ে বড় দূর্বলতা আমি তাদেরকে খুব বেশী ভালবাসি। -- <span class="text-warning">বঙ্গবন্ধু শেখ মুজিবুর রহমান</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
      <!-- End of Service section
        ============================================= -->  

  <script type="">
    
    function count_mark(question_id, option_id){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "post",
        url : '{{url("mark/count")}}',
        data: {
          question_id: question_id,
          option_id: option_id,
        },
        success:function(data) {
          console.log(data);
            // $('#optionReload').empty().html(data);
          }
        });
    }


    function submit_answer(question_id){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "post",
          url : '{{url("submit/answer")}}',
          data: {
            question_id: question_id,
          },
          success:function(data) {
            console.log(data);
              $('#fetchQuestion').empty().html(data);
            }
          });
    }

    function skip_now(question_id, question_name, si){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "post",
          url : '{{url("skip")}}',
          data: {
            si: si,
            question_id: question_id,
            question_name: question_name
          },
          success:function(data) {
            console.log(data);
              $('#fetchQuestion').empty().html(data);
            }
          });
    }

    function ignore_question(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "post",
          url : '{{url("submit/answer")}}',
          success:function(data) {
            console.log(data);
              $('#fetchQuestion').empty().html(data);
            }
          });
    }

    // const timeInMinutes = 120;
    // const currentTime = Date.parse(new Date());
    // var countDownDate = new Date(currentTime + timeInMinutes*60*1000).getTime();

    // var x = setInterval(function() {
    //   var now = new Date().getTime();
    //   var distance = countDownDate - now;

    //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //   document.getElementById("demo").innerHTML = hours + "h "
    //   + minutes + "m " + seconds + "s ";

    //   // If the count down is over, write some text 
    //   if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("demo").innerHTML = "EXPIRED";
    //     window.location.href = "http://127.0.0.1:8000/result";
    //   }
    // }, 1000);




//     var start = document.getElementById("start");
// var dis = document.getElementById("display");
// var finishTime;
// var timerLength = 100;
// var timeoutID;
// dis.innerHTML = "Time Left: " + timerLength;

// if(localStorage.getItem('myTime')){
//     Update();
// }
// start.onclick = function () {
//     localStorage.setItem('myTime', ((new Date()).getTime() + timerLength * 1000));
//     if (timeoutID != undefined) window.clearTimeout(timeoutID);
//     Update();
// }

// function Update() {
//     finishTime = localStorage.getItem('myTime');
//     var timeLeft = (finishTime - new Date());
//     dis.innerHTML = "Time Left: " + Math.max(timeLeft/1000,0);
//     timeoutID = window.setTimeout(Update, 100);
// }


  
  ///// Time Count Start ////
  var startTime = document.getElementById('hms').innerHTML;
    if (localStorage.getItem("counter")) {
        if (getjudgetime(localStorage.getItem("counter"))) {
            var value = startTime;
        } else {
            var value = localStorage.getItem("counter");
        }
    } else {
        var value = startTime;
    }

    document.getElementById('countTime').innerHTML = value;
    var counter = function () {
        if (getjudgetime(value)) {
            // localStorage.setItem("counter", startTime);
            // value = startTime;
            window.location.href = "http://127.0.0.1:8000/finish-exam"
        } else {
            value = getnewtimestring(value);
            localStorage.setItem("counter", value);
        }
        document.getElementById('countTime').innerHTML = value;
    };
    var interval = setInterval(counter, 1000);

    function getnewtimestring(oTime) {
        var timedif = new Date(getnewtime(oTime).valueOf() - 1000);
        var newtime = timedif.toTimeString().split(" ")[0];
        return newtime;
    }

    function getnewtime(oTime) {
        var pieces = oTime.split(":");
        var time = new Date();
        time.setHours(pieces[0]);
        time.setMinutes(pieces[1]);
        time.setSeconds(pieces[2]);
        return time;
    }

    function getjudgetime(jTime) {
        return getnewtime(jTime) <= getnewtime("00:00:00")? true : false
    }

    ///// Time Count End ////


    window.onbeforeunload = function() {
      return "Dude, are you sure you want to leave? Think of the kittens!";
    }

  </script>
@endsection