@extends('layout.adminmain')
@section('contant')


<div class="container-fluid">
    <div class="content">
        <form action="{{  route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row  px-md-3">

                <div class="col-md-6">
                    <div class="  form-group">
                        <label for="name">Category</label>
                        <select class="form-control select"  name="catrgory">
                            <option>--- Select Category ---</option>
                            @foreach ($category as $cat )
                            <option value="{{ $cat->name  }}">{{ $cat->name  }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Write Name..." required="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="price">Price</label>
                        <input id="price" type="text" class="form-control" name="price" placeholder="Write Price..." required="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="currency">Currency</label>
                           <select class="form-control select"  name="currency">
                            <option>--- Select Currency ---</option>
                            <option value="PKR">PKR</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="color">Color</label>
                        <input id="color" type="text" class="form-control" name="color" placeholder="Write Color..." required="">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="color">Brand</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Write Brand..." required="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="color">Stock</label>
                        
                           <select class="form-control select"  name="availibility">
                            <option>--- Select Stock ---</option>
                            <option value="In Stock">In Stock</option>
                            <option value="Out Of Stock">Out Of Stock</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="offer">Offer</label>
                        <input id="offer" type="text" class="form-control" name="offer" placeholder="Write Offer..." >
                    </div>
                </div>


                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="discount">Discount</label>
                        <input id="discount" type="number" class="form-control" name="discount" placeholder="Write Discount..." >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="image">Images</label>
                        <input id="image" type="file" multiple class="form-control" name="images[]" required="">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class=" form-group">
                        <label for="description">Description</label>
                        <textarea id="description" rows="6" class="form-control" name="description" placeholder="Write Description here..."
                            required=""></textarea>
                    </div>
                </div>
            </div>



            <div class="col-2">
                <div class="form-group no-margin  mt-5">
                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </div>
            </div>


        </form>
    </div>
</div>


@endsection