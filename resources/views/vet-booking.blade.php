@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    <section class="middle">
    <div class="vetbooking">
          <div class="textphoto">
                <div  style="margin-top:5%;" class="nondev">
                          <table class=" tablebooking2">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Owner name</th>
                            <th scope="col">pet name</th>
                            <th scope="col">date</th>
                            <th scope="col">time</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $count=0; @endphp
                          @foreach($booking as $book)
                          @php $count++ @endphp
                          <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$book->user->firstname}} {{$book->user->lastname}}</td>
                            <td>{{$book->pet_name}}</td>
                            <td>{{$book->date}}</td>
                            <td>{{$book->time}}</td>
                            <td @if($book->status == 'approved') style="color:green;"  @else style="color:darkorange;"  @endif><b>{{$book->status}}</b></td>
                            <td>
                              @if($book->status == 'pending')
                                <form action="{{ route('booking.approve',$book->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="btn btn-success" value="Approve" type="submit">
                                </form>
                              @endif
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
          </div>
          </div>
    </div>
   

    </section>
@endsection

@push('scripts')

@endpush
