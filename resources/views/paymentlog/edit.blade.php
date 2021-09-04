@extends('layouts.master')

@section('css')
    <style>
       .form-control{

           background: #e4d5d547 !important;
       }
    </style>
@endsection
@section('content')

<div class="container animate__animated animate__fadeInRight">
    <div class="row">
        <div class="col-12">

            


                <div class="body">
                    @if (session('status'))
                        <p class="alert btn-tran">
                            {!!session('status')!!}
                        </p>
                    @endif
                    <div class="">
                                <label for="title">Title</label>
                                 <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goBack()"><i class="feather-arrow-left"></i></button>
                                 <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goForward()"><i class="feather-arrow-right"></i></button>
                            </div>

                   <form action="{{route("paymentlog.update",$paymentlog->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method("put")
                        <div class="form-group">
                           
                            <input type="text" name="title"  id="title" value="{{$paymentlog->title}}{{old('title')}}" class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input name="amount"  id="amount" type="number" value="{{$paymentlog->amount}}{{old('amount')}}"  class="form-control @error('amount') is-invalid @enderror" required>
                            @error('amount')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="inout" id="customRadio0" value="0" class="custom-control-input" @if ($paymentlog->inout==0) checked @endif required="required">                                      
                                 <label class="custom-control-label" for="customRadio0">In</label>  
                            </div>
                           <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="inout" id="customRadio1" value="1" class="custom-control-input" @if ($paymentlog->inout==1) checked @endif required="required">                                        
                                <label class="custom-control-label" for="customRadio1">Out</label> 
                            </div>
                            @error('inout')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                        </div>

                        <button class="btn btn-tran my-3">Save</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
