@extends('layouts.master')

@section('css')
    <style>
       .form-control,.bg-tran-gray{

           background: #e4d5d547 !important;
       }

       .b-10{
           border-radius: 10px;
       }
       
       .align-left{
           text-align: left;
       }

       .historylog{
           overflow-y: auto;
           height: 68vh;
           overflow-x: hidden;
       }
       .historylog-hover{
           transition: 0.3s;
       }

       .historylog-hover:hover{
           transform:scale(1.01);
       }
       .text-indigo{
         color: #246523;
        }

        .w-min-amount{
            min-width: 50px;
        }
       @media screen and (max-width:768px){


        .historylog{
            height:72vh !important;
        }

       
}
    </style>
@endsection
@section('content')

{{-- <div class="container "> --}}
    <div class="row historylog mx-0 animate__animated animate__slideInLeft"> 
        
        <div class="col-12 p-0 p-md-2" style="padding-top:0px !important;">
           <div class="d-flex mb-3 align-items-center">
              <p class="mb-0">@yield('historylog_title')</p>
              <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goBack()"><i class="feather-arrow-left"></i></button>
              <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goForward()"><i class="feather-arrow-right"></i></button>
           </div>

                <div class="body">
                    @if (session('status'))
                        <p class="alert btn-tran">
                            {!!session('status')!!}
                        </p>
                    @endif
                <div class="">

                    @yield('historylog')


                   <div class="d-flex justify-content-around">
                       <p>In : <span class="text-indigo">+ {{$plus_money}}</span></p><p>Out :  <span class="text-warning-minus">- {{$minus_money}}</span></p>
                   </div>
               
                </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

@endsection