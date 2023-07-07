@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <!-- middle section -->
    <section class="middle">
    <div class="addproduct">
      <div class="textphoto">
      <div class="newproduct" style="font-size:20px;;padding:50px">
           <h1>Add New Product</h1>
            <div class="col-sm-6">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

        <section class="section1">

            <label for="exampleFormControlInput1">Category</label>

                    <select class="form-select catogory "  aria-label="Default select example" id="category_id" name="category_id">

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="exampleFormControlInput1">Type</label>

                    <select class="form-select " aria-label="Default select example" id="type" name="type">
                        <option value="pet">Pet</option>
                        <option value="food">Food</option>
                        <option value="accessories">Accessories</option>
                        <option value="treatment">Treatment</option>
                    </select>
</section>
<section class="section2">
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" >
                    </div>
</section>
<section class="section3">
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" >
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Image</label>
                        <input type="file" class="form-control " name="img" id="img">
                    </div>
</section>
                    <div class="form-group "  style="margin-top:10px;">
                        <input class=" btn btn-primary " id="btnproduct" type="submit" value="Add Product">
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
