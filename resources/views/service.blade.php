@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    <section class="middle">
    <div class="main7">
      <div class="biggest">



            <form action="{{ route('check') }}" method="get" enctype="multipart/form-data">
                <div class="mainn" style="border-radius:10px">

                <div class="col-sm-6">
                <label for="exampleFormControlInput1" class="center">Diagnosis</label>

                    <select class=" btnservice" aria-label="Default select example" id="icategory_d" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(!empty($category_id) && $category->id ==  $category_id) Selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>

                                    <section class="divone">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="temprature" name="temprature" @if(!empty($checkList) && in_array('temprature',$checkList)) checked @endif>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    High temperatue?
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="voming" name="voming" @if(!empty($checkList) && in_array('voming',$checkList)) checked @endif>
                                                <label class="form-check-label" for="defaultCheck2">
                                                    Voming?
                                                </label>
                                            </div>
                                </section>


    <section class="divtwo">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="lack_of_appetite" name="lack_of_appetite" @if(!empty($checkList) && in_array('lack_of_appetite',$checkList)) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            Lack of appetite?
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="urinating" name="urinating" @if(!empty($checkList) && in_array('urinating',$checkList)) checked @endif>
                        <label class="form-check-label" for="defaultCheck2">
                            Urinating?
                        </label>
                    </div>
  </section>


            <div class="form-group">
                <input type="submit" value="Check Now"   class="btn btn-primary" style="margin-top:10px"; id="check">
            </div>
                </div>
                <div class="col-sm-6">
                <input class="form-control input-lg" id="inputlg" type="text" style="font-size:50px;margin-top:10%;text-align:center;" @if(!empty($result)) value="{{$result}}" @endif placeholder="Result" disabled>


                </div>


        </div>
        </form>







      </div>
    </div>

    </section>
@endsection

@push('scripts')

@endpush
