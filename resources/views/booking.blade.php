@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    
      
      
    
        <div class="imgbook">
                        <div class="booking" >
                            <h1 class="bkdoc">Book Doctor</h1>
                                <div class="col-sm-6">
                                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Pet Name</label>
                                            <input type="text" class="form-control" name="pet_name" id="pet_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Date</label>
                                            <input type="date" class="form-control" name="date" id="date" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Time</label>
                                            <input type="time" class="form-control" name="time" id="time">
                                        </div>

                                        <input type="hidden" name="doctor_id" value="{{$doctor_id}}">

                                        <div class="form-group " style="margin-top:10px;">
                                            <input class=" btnbook" type="submit" value=" Booking">
                                        </div>
                                    </form>
                                    
                                </div>
                        

                        </div>
        </div>
        
        </div>
        
       

        </div>
    </section>



@endsection

@push('scripts')

@endpush
