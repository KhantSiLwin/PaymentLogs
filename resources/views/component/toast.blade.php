@extends('layouts.master')
@section('toast')
@if (session('toast'))
<div aria-live="polite" aria-atomic="true" style="position: fixed; z-index:100;right:10px;top:75px;">
    <div class="toast animate__animate animate__bounceInDown" data-delay="700">
        <div class="toast-header">
            <img src="" alt="" class="rounded toast-icon mr-2">
            <strong class="mr-auto"> Hi {{ Auth::user()->name }} !</strong>
            <small>Just Now</small>
            <button class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
           {!! session('toast') !!}
        </div>
    </div>
</div>
@endif
@endsection
