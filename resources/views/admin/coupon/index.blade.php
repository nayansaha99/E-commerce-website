@extends('admin.admin-master')
@section('admin_content')
@section('coupon')active @endsection
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Coupon list</span>
       </nav>

      <div class="sl-pagebody">
        <div class="row-row-sm">
        <div class="row justify-content-center mt-30">
        <div class="col-md-8">
        <div class="sl-page-title">
       </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-5">
          <h6 class="card-body-title">Coupon list</h6>
          @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('status')}}</strong>
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
                  <th class="wd-15p"> Coupon name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>
                 </tr>
              </thead>
              <tbody>
                  @php  
                  $i = 1;
                  @endphp
                  @foreach($coupons as $row) 
                 <tr>
                  <td>{{$i++}}</td>
                  <td>{{$row->coupon_name}}</td>
                  <td>
                      @if($row->status==1)
                      <span class="badge badge-success">Active</span>
                      @else
                      <span class="badge badge-danger">Inactive</span>
                      @endif
                  </td>
                  <td>
                      <a href="{{url('admin/coupon/edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class ="fa fa-pencil "></i></a>
                      <a href="{{url('admin/coupon/delete/'.$row->id)}}" class="btn btn-sm btn-danger"onclick="return confirm('Are You Shure To Delete')"><i class="fa fa-trash"></i></a>
                      @if($row->status==1)
                      <a href="{{url('admin/coupon/inactive/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                      @else
                      <a href="{{url('admin/coupon/active/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
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
                <div class="card-header">Add Coupon
                </div>
                <div class="card-body">
                     
                       
                     

                    <form action="{{route('store.coupon')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Coupon Name</label>
                          <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter coupon">

                          @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                      </form>




                </div>
            </div>
        </div>

        </div>
        

</div>
@endsection