@extends('admin.layouts.master')

@section('title','Update Information')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        @section('header')
        <h3>Update Admin Information</h3>
        @endsection
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-7 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2 "><strong>Update Information</strong></h3>
                            </div>
                            <hr>
                            <form action="{{route('admin#updateAccount',Auth::user()->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            @if (Auth::user()->image==null && Auth::user()->gender=='male')
                                            <img class="img-thumbnail" src="{{asset('images/default_user.png')}}"  />
                                            @endif
                                            @if (Auth::user()->image==null && Auth::user()->gender=='female')
                                            <img class="img-thumbnail" src="{{asset('images/default_female_user.png')}}"  />
                                            @endif
                                            @if (Auth::user()->image)
                                            <div style="width: 260px; height: 260px; overflow: hidden;">
                                                <img class="img-thumbnail w-100 h-100" style="object-fit: cover; object-position:center;" src="{{asset('storage/profileImages/'.Auth::user()->image)}}"/>
                                            </div>
                                            @endif
                                            <div class="">
                                                <input type="file" name="image" class="form-control mt-3 @error('image') is-invalid @enderror" id="">
                                            </div>
                                            @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-1 fs-4 me-3 d-flex px-2">
                                                    <label for="name" class="text-center my-auto"><i class="fa-solid  fa-user me-2"></i></label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input  type="text" name="name" class="form-control form-control-sm  bg-white @error('name') is-invalid @enderror" value="{{old('name',Auth::user()->name)}}" placeholder="Enter Name">
                                                    @error('name')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-1 fs-4 me-3 d-flex px-2">
                                                    <label for="role" class="text-center my-auto"><i class="fa-solid  fa-shield-halved me-2"></i></label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input  type="text" name="role" class="form-control form-control-sm " value="{{old('role',Auth::user()->role)}}" readonly >
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-1 fs-4 me-3 d-flex px-2">
                                                    <label for="gender" class="text-center my-auto"><i class="fa-solid  fa-venus-mars me-1"></i></label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <select name="gender" class="form-select form-control-sm  @error('gender') is-invalid @enderror">
                                                        <option value="">Choose Gender</option>
                                                        <option value="male" @if(Auth::user()->gender=='male') selected @endif>male</option>
                                                        <option value="female" @if(Auth::user()->gender=='female') selected @endif>female</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-1 fs-4 me-3 d-flex px-2">
                                                    <label for="email" class="text-center my-auto"><i class="fa-solid  fa-envelope me-2"></i></label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input  type="text" name="email" class="form-control form-control-sm  bg-white @error('email') is-invalid @enderror" value="{{old('email',Auth::user()->email)}}" placeholder="Enter Email">
                                                    @error('email')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-1 fs-4 me-3 d-flex px-2">
                                                    <label for="phone" class="text-center my-auto"><i class="fa-solid  fa-phone me-2"></i></label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input  type="text" name="phone" class="form-control form-control-sm  bg-white @error('phone') is-invalid @enderror" value="{{old('phone',Auth::user()->phone)}}" placeholder="Enter Phone Number">
                                                    @error('phone')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-1 fs-4 me-3 px-2">
                                                    <label for="address" class="text-center my-auto"><i class="fa-solid  fa-location-dot me-2"></i></label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <textarea  name="address" placeholder="Enter Address" cols="" rows="3" class="form-control form-control-sm  bg-white @error('address') is-invalid @enderror">{{old('address',Auth::user()->address)}}</textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-end me-4">
                                    <a href="{{route('admin#informationPage')}}" class="btn btn-secondary"><i class="fa-solid  fa-arrow-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid  fa-arrow-up-from-bracket me-2"></i>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
