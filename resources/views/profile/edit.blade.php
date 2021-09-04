@extends('layouts.master')
@section('css')
    <style>
        .profile-photo-edit{

            width:100px;
            height:100px;
            border-radius:50%;
        }

        .form-control{

            background: #e4d5d547 !important;
        }

        /* .hidden-upload{
            position:absolute;
            right: 180px;
            bottom: -5px;
        } */
    </style>
@endsection
@section('content')

         <div class="row animate__animated animate__slideInLeft">
            <div class="col-12 col-md-6 wow bounceInDown">
                <div class="">
                    <label for="title">Edit Profile</label>
                     <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goBack()"><i class="feather-arrow-left"></i></button>
                     <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goForward()"><i class="feather-arrow-right"></i></button>
                 </div>
                <div class="text-center">
                    <img src="{{asset("storage/profile/".Auth::user()->photo)}}" id="blah" alt="" class="profile-photo-edit shadow">
                   <div> <label for="photo" class="mt-3 btn btn-tran round hidden-upload ">Choose A Photo</label>   </div>
                   @error('photo')
                   <small class="alert text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <form action="{{route("profile.update")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-group">
                       <input type="file" name="photo" class="form-control p-1" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" hidden>
                   </div>

                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name"  id="name" value="{{Auth::user()->name}}{{old('name')}}" class="form-control  @error('name') is-invalid @enderror" required>
                    @error('name')
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email"  id="email" value="{{Auth::user()->email}}{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" required>
                    @error('email')
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>

                    <button class="btn btn-tran mt-3">Update Profile</button>
               </form>

            </div>
         </div>

@endsection
