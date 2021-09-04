<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#af7eca">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('js/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/animate_it/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/feather-icons-web/feather.css') }}" rel="stylesheet">
    <style>

        *{
            user-select: none;
        }

        .historylog::-webkit-scrollbar{

        width: 8px;

        }

        .historylog::-webkit-scrollbar-track{

        background-color: rgb(0, 0, 0,0.2);
        }

        .historylog::-webkit-scrollbar-thumb{

        background-color:#e4ad88f5;
        }

        body{

            /* background-image: url('{{ asset("storage/bg/Ghosts.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed; */
/*            background: linear-gradient(to right top,#733d6d,#315fe8);
*/
            background: linear-gradient(to right top,#424d88,#ad2ac5);

        }

        a{
            text-decoration: none;
            color: black;
            outline: none !important;
        }

        .text-warning-minus{
            color:#a54040;
        }

        .btn:focus,.form-control:focus{
            box-shadow: none !important;
            outline: none;
            border: 1px solid #ced4da !important;
        }

        .container-vh{
            /* backdrop-filter:blur(62px); */
            background: linear-gradient(to right top,rgba(255, 255, 255, 0.6),rgba(255, 255, 255, 0.2));
            border: 2px solid #7f80c18f;
            min-height:100vh;
        }

        .profile-photo{

            width: 80px;
            height: 80px;
            border-radius: 50%;
            }

            .total-money{

            font-size: 60px;
            font-weight: bold;
            }

            .btn-tran{
            background: linear-gradient(to left top,rgba(255, 255, 255, 0.6),rgba(255, 255, 255, 0.2));
            transition: 0.5s;
            }

            .link-text{
                transition: 0.5s;
            }

            .btn-tran:hover{
                background: linear-gradient(to left top,rgba(255, 255, 255, 0.7),rgba(255, 255, 255, 0.4));

            }

            .btn-tran:hover .link-text{
                color: black;
                padding-left: 5px;

            }

            .text-left{

                display: flex;
                justify-content: space-between;
            }

            .feather-large{
                font-size: 25px;
                border-radius: 50%;
            }

            .hide-sidebar-btn,.show-sidebar-btn{


                border-radius: 50%;
            }

            .pt-18{
                padding-top: 0.3rem;
            }

            .main-col-content{
                /* height: 100 !important; */
                overflow-y: auto;
            }

  @media screen and (max-width:767px){

    .sidebar{

        position: fixed;
        width: 300px;
        /* height: 100%; */
        z-index: 10;
        display: block !important;
        background-color: #e2d2d2eb;
        margin-left: -100%;
        z-index: 50;
        height: 100vh;
        overflow-y: auto;
    }

    .main-col-content{
                height: 100vh !important;
                overflow-y: auto;
            }


    /* .main-master-content{
        min-height:72vh !important;
        } */

    .header-sticky{
        /* position: sticky;
        top:25px; */
        z-index: 49;
    }

    .main-row{
        margin:0 !important;
    }

    .container-fluid{
        padding: 0 !important;
    }

    .historylog::-webkit-scrollbar{

    width: unset;

    }

    .historylog::-webkit-scrollbar-track{

    background-color: unset;
    }

    .historylog::-webkit-scrollbar-thumb{

    background-color:unset;
    }

    .sm-no-shadow{
        box-shadow: none !important;
    }
  }
  @media screen and (max-width:570px){

    .total-money{
        font-size: 2rem;
    }
  }




    </style>
    @yield('css')
</head>
<body class="">


    <section class="container-fluid container-vh  d-md-flex justify-content-center align-items-center">

      @if (session('toast'))
      <div aria-live="polite" d="toast" aria-atomic="true" style="position: fixed; z-index:100;right:10px;top:75px;">
          <div class="toast toast-content animate__animated animate__fadeIn" data-delay="7000" i>
              <div class="toast-header">
                  <img src="" alt="" class="rounded toast-icon mr-2">
                  <strong class="mr-auto"> Hi {{ Auth::user()->name }} !</strong>
                  <small>Just Now</small>
                  <button  type="button" class="ml-2 mb-1 close btn" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true" class="outline-none">&times;</span>
                  </button>
              </div>
              <div class="toast-body">
                 {!! session('toast') !!}
              </div>
          </div>
      </div>
       @endif

        <div class="row main-row w-100 sm-no-shadow shadow-lg">
            <div class="col-12 col-md-4  p-3 sidebar">
                <div class="hide-sidebar-btn text-right"><i class="feather-chevrons-left btn-tran p-2 shadow-lg feather-large d-md-none"></i></div>
                <div class="d-flex justify-content-center align-items-center">
                 <div class="profile text-center">
                     <img src="{{ asset("storage/profile/".\Illuminate\Support\Facades\Auth::user()->photo) }}" alt="" class="profile-photo my-2 shadow">
                     <h4>{{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
                 </div>

                </div>
                <hr>
                <div class="">
                 @php
                     $d = date("Y-m-");
                     $m = date("Y-")
                 @endphp
                 <a href="{{route("paymentlog.create")}}" class="btn btn-tran my-2 p-3 w-100 text-left "><span class="link-text">Add Log</span><span class="arrow px-3"><i class="feather-bookmark"></i></span></a>
                 <a href="{{route("paymentlog.index")}}" class="btn btn-tran my-2 p-3 w-100 text-left "><span class="link-text">History Log</span><span class="arrow px-3"><i class="feather-list"></i></span></a>
                 <a href="{{route("paymentlog.daily",$d)}}" class="btn btn-tran my-2 p-3 w-100 text-left "><span class="link-text">Daily Log</span><span class="arrow px-3"><i class="feather-list"></i></span></a>
                 <a href="{{route("paymentlog.monthly",$m)}}" class="btn btn-tran my-2 p-3 w-100 text-left "><span class="link-text">Monthly Log</span><span class="arrow px-3"><i class="feather-list"></i></span></a>
                 <a href="{{route("paymentlog.yearly")}}" class="btn btn-tran my-2 p-3 w-100 text-left "><span class="link-text">Yearly Log</span><span class="arrow px-3"><i class="feather-list"></i></span></a>
                 <a href="{{route("profile.edit")}}" class="btn btn-tran my-2 p-3 w-100 text-left "><span class="link-text">Edit Profile</span><span class="arrow px-3"><i class="feather-edit"></i></span></a>
                 <a class="btn btn-tran my-2 p-3 w-100 text-left " href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                 <span class="link-text"> {{ __('Logout') }}</span>
                 <span class="arrow px-3"><i class="feather-log-out"></i></span>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                </div>
             </div>

             <div class="col-12 col-md-8 py-4 main-col-content">
                <div class="header-sticky">
                    <div class="show-sidebar-btn"><i class="feather-align-left shadow-lg btn-tran p-2 feather-large d-md-none"></i></div>
                    <div class="">
                         <h5 class="pt-18 text-center">Your Money</h5>
                         <h1 class="total-money flex-grow-1 text-center" ><span class="counter-up">{{\Illuminate\Support\Facades\Auth::user()->total_money}}</span> Ks</h1>
                         <div class="d-flex justify-content-between">
                           <p class="mb-0">$ <span class="counter-up">{{floor(\Illuminate\Support\Facades\Auth::user()->total_money /1500)}}</span> </p>
                           <p class="mb-0"><span class="counter-up">{{substr(\Illuminate\Support\Facades\Auth::user()->total_money / 100000,0,4)}}</span> Lakhs</p>

                         </div>
                    </div>
                 <hr class="mt-0">

                </div>

              <div class="">  @yield('content')</div>

             </div>

        </div>
    </section>
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/wow/wow.js")}}"></script>
    <script src="{{asset("js/way_point/jquery.waypoints.js")}}"></script>
    <script src="{{asset("js/counter_up/counter_up.js")}}"></script>
    <script src="{{asset("js/style.js")}}"></script>
   <script>
        $('.counter-up').counterUp({
    delay: 100,
    time: 2000
});
new WOW().init();


function goBack() {
    window.history.back();
}

function goForward() {
    window.history.forward();
}
   </script>
</body>
</html>
