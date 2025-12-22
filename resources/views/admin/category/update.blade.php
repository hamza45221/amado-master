@extends('layout.adminmain')
@section('contant')


<div class="container-fluid">
    <div class="content">
        <form action="{{  route('category.update',$category->id) }}" method="POST" enctype="">
            @csrf
            <div class="row  px-md-3">

                <div class="col-md-6">
                    <div class="  form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" id="name" name="name" required="" placeholder="Write Name..." autofocus="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="brand_name">Brand Name</label>
                        <input id="brand_name" type="text" class="form-control" value="{{ $category->brand_name }}"  name="brand_name" placeholder="Write Brand Name..." required="">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class=" form-group">
                        <label for="description">Description</label>
                        <textarea id="description" rows="6" class="form-control" name="description" placeholder="Write Description here..."
                            required="">{!!  $category->description !!}</textarea>
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