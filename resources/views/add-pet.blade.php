@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    <section class="middle">
            <div class="imgaddpet">
                    <div class="textphoto">
                                        <div class="row container addpetanmail" style="margin-top:400px;margin:auto;font-size:20px;padding:50px">
                                            <h1>Add New Pet</h1>
                                                                    <div class="col-sm-6 mainpet">
                                                                                <form action="{{ route('pet.store') }}" method="POST" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <div class="form-group">
                                                                                        <label for="exampleFormControlInput1">Name</label>
                                                                                        <input type="text" class="form-control" name="name" id="name">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleFormControlInput1">Vaccines</label>
                                                                                        <input type="date" class="form-control" name="vaccines" id="vaccines" value="2024-01-01" >
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleFormControlInput1">Image</label>
                                                                                        <input type="file" class="form-control" name="img" id="img">
                                                                                    </div>

                                                                                    <div class="form-group addmainpet" style="margin-top:10px; margin-left:80%; ">
                                                                                        <input style="width:300px; font-size:30px;" class=" btn btn-primary" type="submit" value="Add pet">
                                                                                    </div>
                                                                                </form>

                                                                    </div>


                                            </div>
                    </div>
            </div>






    </section>



@endsection

@push('scripts')

@endpush
