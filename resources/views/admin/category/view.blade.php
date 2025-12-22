@extends('layout.adminmain')
@section('contant')


@if (session('success'))
   <div class="alert   border border-success text-success alert-dismissible d-flex align-items-enter mb-2 fade show " style="z-index: 222;height: 55px;"
        role="alert">
        
        <i class="gd-check-box icon-text text-success mr-2"></i>

        <p class="mb-0">
            <strong>Success:</strong> {!! session('success') !!}
        </p>
 
   </div>
@endif




<div class="container-fluid">
    <div class="content">
          <div class="row">
                <div class="col-12">
                    <div class="card mb-3 mb-md-4">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="font-weight-semi-bold mb-0">Recent Orders</h5>

                            <a class="btn btn-secondary" href="{{  route('category.create') }}">Create</a>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive-xl">
                                <table class="table text-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">Name</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">Brand Name</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">Description</th> 
                                        <th class="font-weight-semi-bold border-top-0 py-2">Action</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
    @foreach ($categories as $index => $category)
    <tr>
        <td class="py-3">{{ $index + 1 }}</td>

        <td class="py-3">
            <div>{{ $category->name }}</div>
        </td>

        <td class="py-3">{{ $category->brand_name }}</td>

        <td class="py-3">{{ $category->description }}</td>

        <td class="py-3">
            <div class="position-relative">

                <a id="dropDownInvoker{{ $category->id }}" 
                   class="link-dark d-flex" 
                   href="#" 
                   aria-controls="dropDown{{ $category->id }}" 
                   aria-haspopup="true" 
                   aria-expanded="false"
                   data-unfold-target="#dropDown{{ $category->id }}" 
                   data-unfold-event="click"
                   data-unfold-type="css-animation" 
                   data-unfold-duration="300" 
                   data-unfold-animation-in="fadeIn" 
                   data-unfold-animation-out="fadeOut">
                    <i class="gd-more-alt icon-text"></i>
                </a>

                <ul id="dropDown{{ $category->id }}" 
                    class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut"
                    aria-labelledby="dropDownInvoker{{ $category->id }}" 
                    style="min-width: 150px; right: 0; animation-duration: 300ms;">

                    <!-- Edit -->
                    <li class="unfold-item">
                        <a class="unfold-link media align-items-center text-nowrap" 
                           href="{{ route('category.edit', $category->id) }}">
                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                            <span class="media-body">Edit</span>
                        </a>
                    </li>

                    <li class="unfold-item">
                        <a class="unfold-link media align-items-center text-nowrap" 
                           href="{{ route('category.delete', $category->id) }}">
                            <i class="gd-close unfold-item-icon mr-3"></i>
                            <span class="media-body">Delete</span>
                        </a>
                    </li>

                     
                                
                              

                </ul>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


@endsection