@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="/assets/css/doctor.css" />
  <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
          
  

  <section class="bac_center">
    @foreach($vets as $vet)
      <section class="one">
        <div class="">
        @if($vet->img)
                <img src="assets/images/{{ $vet->img }}" alt="not" id="profile-image1" style="height:90px;">
                @else
                <img src="assets/images/avatar.png" alt="not" id="profile-image1" style="height:90px;">
                @endif
        </div>

        <div class="one_two"> 
          <p class="pra1">Name: {{$vet->firstname}} {{$vet->lastname}}</p>
          <p class="pra2">phone: {{$vet->contact_number}}</p>
        </div>

        <div class="one_there">Address: {{$vet->address}}</div>

        <div class="" id="bac1">
        <form method="GET" action="{{ route('booking.create') }}">
            <input type="hidden" name="doctor_id" value="{{$vet->id}}">
            <button class="btn btn-lg btn-primary" type="submit"> Book Now</button>
        </form>
        </div>

      </section>
    @endforeach
  </section>

</html>

@endsection


@push('scripts')


@endpush
