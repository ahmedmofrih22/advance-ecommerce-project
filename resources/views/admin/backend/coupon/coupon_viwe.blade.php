@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-9">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Coupon List
                                <span class="badge badge-pill badge-danger">{{count($coupons)}}</span>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Coupon Name</th>
                                            <th>Coupon Discount</th>
                                            <th>Validity</th>
                                            <th>Status</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">cateogry

                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->coupon_name }}</td>
                                                <td>{{ $coupon->coupon_discount }}%</td>
                                                <td >
                                                  {{Carbon\Carbon::parse($coupon->coupon_validity )->format('D, d F Y')}}
                                                </td>
                                                <td>
                                                    @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))

                                                    <span class="badge badge-pill badge-success">Valid</span>

                                                    @else
                                                    <span class="badge badge-pill badge-danger">InValid</span>
                                                    @endif

                                                  </td >
                                                <td width="30%">
                                                    <a href="{{route('coupon.edit',$coupon->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                     <a href="{{route('coupon.delete',$coupon->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>
                                               </td>


                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                {{-- ----------  Add Brand------- --}}
                <div class="col-3">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Coupon List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('coupon.store') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Coupon_Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control"
                                                >
                                                @error('coupon_name')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon_Discount (%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_discount" class="form-control"
                                                >
                                                @error('coupon_discount')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Coupon_Validity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity" class="form-control"
                                               min="{{Carbon\Carbon::now()->format('Y-m-d')}}" >
                                                @error('coupon_validity')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">

                                        <input type="submit" value="submit" class="btn btn-primary mb-5">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>

                {{-- -----end Add Category---- --}}
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
