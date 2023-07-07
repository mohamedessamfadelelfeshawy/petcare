@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    <section class="middle">
        <div class="row profile_photo">
                <div class="col-sm-4">
                    @if(Auth::user()->img)
                    <img src="assets/images/{{ Auth::user()->img }}" alt="not" id="profile-image1" class="img-p">
                    @else
                    <img src="assets/images/avatar.png" alt="not" id="profile-image1" class="img-p">
                    @endif
                    <form action="{{ route('user.changeImage',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group chphoto ">
                            <input type="file" name="img" id="img" class="filechange">

                            <input class=" btn btn-secondary filechangeph" type="submit" value="Change profile picture">
                        </div>
                    </form>

                </div>
                <div class="col-md-6" style="margin-top:200px">
                    <h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
                    <p style="color:blue">@ {{ Auth::user()->username }}</p>
                </div>
                <div class="col-sm-2">
                </div>
            </div>

            <form action="{{ route('user.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row container" style="margin-top:50% px;margin:auto;font-size:20px;background-color:#112d4e;padding:50px;border-radius:20px;color:white;">

            <div class="col-sm-6 main_edit">
                <div class="form-group labeledit">
                    <label for="exampleFormControlInput1">First name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ Auth::user()->firstname }}" >
                </div>
                <div class="form-group labeledit">
                    <label for="exampleFormControlInput1">Last name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ Auth::user()->lastname }}" >
                </div>
                <div class="form-group labeledit">
                    <label for="exampleFormControlInput1">User name</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->username }}" disabled>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group labeledit">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->contact_number }}" >
                </div>
                <div class="form-group labeledit">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ Auth::user()->address }}" >
                </div>
                <div class="form-group labeledit">
                    <label for="exampleFormControlInput1">Type</label>
                    <input type="text" class="form-control" name="type" id="type" value="{{ Auth::user()->type }}" disabled>
                </div>

            </div>

            <div class="form-group labeledit">
                <input type="submit" value="Update"   class="btn btn-primary updateedit" style="margin-top:10px;">
            </div>
        </div>
        </form>




    </section>
@endsection

@push('scripts')

@endpush
