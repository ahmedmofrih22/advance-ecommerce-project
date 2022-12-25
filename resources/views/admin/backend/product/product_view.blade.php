@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List <span class="badge badge-pill badge-danger">{{count($product)}}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product En</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">

                                        @foreach ($product as $itme)
                                            <tr>
                                                <td><img src="{{asset($itme->product_thambnail)}}" style="width:60px;
                                                    height:50px" ></td>
                                                <td>{{ $itme->product_name_en }}</td>
                                                <td>{{ $itme->selling_price }}$</td>
                                                <td>{{ $itme->product_qty }}Pic</td>
                                                <td>
                                                    @if ($itme->discount_price == Null)
                                                    <span class="badge badge-pill badge-danger">NO Discount</span>
                                                    @else
                                                            @php
                                                            $amount = $itme->selling_price  - $itme->discount_price ;
                                                            $Discount = ( $amount/$itme->selling_price)*100;

                                                            @endphp
                                                             <span class="badge badge-pill badge-info">{{round( $Discount)}}</span>

                                                    @endif


                                                </td>
                                                <td>
                                                  @if ($itme->status == 1)

                                                  <span class="badge badge-pill badge-success">Active</span>

                                                  @else
                                                  <span class="badge badge-pill badge-danger">InActive</span>
                                                  @endif

                                                </td >
                                                    <td width="30%">
                                                    <a href="{{route('product.edit',$itme->id)}}" class="btn btn-primary"><i title="Details" class="fa fa-eye"></i></a>

                                                    <a href="{{route('product.edit',$itme->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                    <a href="{{route('product.delete',$itme->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>

                                                    @if ($itme->status == 1)

                                                    <a href="{{route('product.inactive',$itme->id)}}" class="btn btn-danger"><i title="InActive Now" class="fa fa-arrow-down"></i></a>


                                                    @else
                                                    <a href="{{route('product.active',$itme->id)}}" class="btn btn-success"><i title="Active Now" class="fa fa-arrow-up"></i></a>

                                                    @endif
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



            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
