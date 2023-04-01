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
        <div class="row justify-content-center mt-8">
        <div class="col-md-8">
        <div class="sl-page-title">
       </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-20">
          <h6 class="card-body-title">Product Brand list</h6>
          @if(session('brand updated'))
                <div class="alert alert-success 
                alert-dismissible fade show" role="alert">
                <strong>{{session('brand updated')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                  </button>
          </div>
           @endif  
           @if(session('delete'))
                    <div class="alert alert-danger
                    alert-dismissible fade show" role="alert">
                    <strong>{{session('delete')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
           @endif  
           @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif  

          <div class="table-wrapper pd-sm-60" >
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SL</th>
                  <th class="wd-15p">Brand name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>
                 </tr>
              </thead>
              <tbody>
                  @php  
                  $i = 1;
                  @endphp
                  @foreach($brands as $row) 
                 <tr>
                  <td>{{$i++}}</td>
                  <td>{{$row->brand_name}}</td>
                  <td>
                      @if($row->status==1)
                      <span class="badge badge-success">Active</span>
                      @else
                      <span class="badge badge-danger">Inactive</span>
                      @endif
                  </td>
                  <td>
                      <a href="{{url('admin/brand/edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class ="fa fa-pencil "></i></a>
                      <a href="{{url('admin/brand/delete/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      @if($row->status==1)
                      <a href="{{url('admin/brand/inactive/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                      @else
                      <a href="{{url('admin/brand/active/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                      @endif
                  </td>
                  </td>
                  </td>
                
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        </div>

        <div class="col-md-4  pd-sm-30">
            <div class="card">
                <div class="card-header">Add Brand
                </div>
                

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <form action="{{route('store.brand')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Brand Name</label>
                          <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter brand">

                          @error('brand_name')
                        <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Add Brand</button>
                      </form>




                </div>
            </div>
        </div>

        </div>
        

</div>
@endsection