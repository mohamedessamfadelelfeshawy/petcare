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
            </div>
            <div class="col-md-6" style="margin-top:200px">
                <h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
                <p style="color:blue">@ {{ Auth::user()->username }}</p>
            </div>
            <div class="col-sm-2">
            <div class="form-group editprofile" style="margin-top:30px;">
                <a href="{{route('user.edit')}}"  class="btn btn-lg btn-primary"><i class='fa-solid fa-gear'> Edit profile</i></a>
            </div>
            </div>
        </div>



        <div class="" style="text-align:center;margin-top:100px;">
            <h1 style="font-size:100px;"><b>My Animals</b></h1>
            <hr />
            <div style="margin:50px;">
                <a href="{{ route('pet.create') }}" class="btn btn-lg btn-primary"><i class="fa-regular fa-square-plus"> Add animal</i></a>
            </div>

            <div class="row addpetme">
                @foreach($userPets as $pet)
                @php
                    $now = time(); // or your date as well
                    $your_date = strtotime($pet->vaccines);
                    $datediff = ceil(($your_date - $now)/86400);

                    @endphp
                <div class="card col-sm-3 maincard" style="margin:auto;">
                <img class="card-img-top " src="assets/images/{{$pet->img}}" alt="Card image cap">
                <div class="card-body" style="font-size:50px;background-color:black;color:antiquewhite;">
                    {{$pet->name}}
                    <p class="card-text"><i class="fa-solid fa-syringe"> {{$datediff}} Day</i>s </p>

                    <form action="{{ route('pet.delete',$pet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-lg btn-danger" value="Delete" type="submit">
                    </form>
                </div>
                </div>

                @endforeach
            </div>

        </div>
    </section>
@endsection

@push('scripts')

@endpush
