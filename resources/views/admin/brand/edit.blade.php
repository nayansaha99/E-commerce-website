@extends('admin.admin-master')
@section('admin_content')
@section('brand')active @endsection
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Product</a>
        <span class="breadcrumb-item active">Brand</span>
       </nav>

      <div class="sl-pagebody">
        
        <div class="row-row-sm">
        

        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">Update Brand
                </div>
                

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <form action="{{route('update.brand')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Brand Name</label>
                          <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" value="{{$brand->brand_name}}" aria-describedby="emailHelp" >

                          @error('brand_name')
                        <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Update Brand</button>
                      </form>




                </div>
            </div>
        </div>

        </div>
        

</div>
@endsection