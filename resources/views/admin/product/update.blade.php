@extends('layout.adminmain')
@section('contant')


    <div class="container-fluid">
        <div class="content">
            <form action="{{  route('product.update',$edit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row  px-md-3">

                    <div class="col-md-6">
                        <div class="  form-group">
                            <label for="name">Category</label>
                            <select class="form-control select"  name="catrgory">
                                <option>--- Select Category ---</option>
                                @foreach ($category as $cat )
                                    <option value="{{ $cat->name  }}" {{ ($edit->catrgory == $edit->category) ? 'selected' : '' }}>{{ $cat->name  }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" value="{{ $edit->name }}" name="name" placeholder="Write Name..." required="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="price">Price</label>
                            <input id="price" type="text" class="form-control" value="{{ $edit->price }}" name="price" placeholder="Write Price..." required="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="currency">Currency</label>
                            <select class="form-control select"  name="currency">
                                <option value="">--- Select Currency ---</option>
                                <option value="PKR" {{ ($edit->currency == 'PKR') ? 'selected' : '' }}>PKR</option>
                                <option value="USD" {{ ($edit->currency == 'USD') ? 'selected' : '' }}>USD</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="color">Color</label>
                            <input id="color" type="text"  class="form-control" value="{{ $edit->color }}" name="color" placeholder="Write Color..." required="">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="color">Brand</label>
                            <input id="brand" type="text" class="form-control" value="{{ $edit->brand }}" name="brand" placeholder="Write Brand..." required="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="color">Stock</label>

                            <select class="form-control select" name="availibility">
                                <option value="">--- Select Stock ---</option>
                                <option value="In Stock" {{ ($edit->availibility == 'In Stock') ? 'selected' : '' }}>
                                    In Stock
                                </option>
                                <option value="Out Of Stock" {{ ($edit->availibility == 'Out Of Stock') ? 'selected' : '' }}>
                                    Out Of Stock
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="offer">Offer</label>
                            <input id="offer" type="text" class="form-control" value="{{ $edit->offer }}" name="offer" placeholder="Write Offer..." >
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="discount">Discount</label>
                            <input id="discount" type="number" class="form-control" value="{{ $edit->discount }}" name="discount" placeholder="Write Discount..." >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="image">Images</label>
                            <input id="image" type="file" multiple class="form-control"   name="images[]"  >
                        </div>
                        <div class="images d-flex ">
                            @if($edit->images)
                                @foreach (json_decode($edit->images) as $img)
                                    <img src="{{ asset( $img) }}" alt="Product Image" width="60"
                                         class="img-thumbnail me-1 ">
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class=" form-group">
                            <label for="description">Description</label>
                            <textarea id="description" rows="6" class="form-control"  name="description" placeholder="Write Description here..."
                                      required="">{!! $edit->description !!}</textarea>
                        </div>
                    </div>
                </div>



                <div class="col-2">
                    <div class="form-group no-margin  mt-5">
                        <button type="submit" class="btn btn-primary btn-block">
                            Update
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>


@endsection
