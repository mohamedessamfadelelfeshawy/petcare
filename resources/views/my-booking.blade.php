@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    <section class="middle">
    <div class="mybooking">
      <div class="textphoto">
      
    <table class=" tablebooking">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Doctor name</th>
      <th scope="col">Pet Name</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @php $count=0; @endphp
    @foreach($booking as $book)
    @php $count++ @endphp
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$book->doctor->firstname}} {{$book->doctor->lastname}}</td>
      <td>{{$book->pet_name}}</td>
      <td>{{$book->date}}</td>
      <td>{{$book->time}}</td>
      <td @if($book->status == 'approved') style="color:green;"  @else style="color:darkorange;"  @endif><b>{{$book->status}}</b></td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
<div>

    
       
    </section>
@endsection

@push('scripts')

@endpush
