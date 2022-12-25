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
                            <h3 class="box-title">Brand List
                                <span class="badge badge-pill badge-danger">{{count($brand)}}</span>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th>Brand_Name_En</th>
                                            <th>Brand_Name_En</th>
                                            <th>Brand_Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($brand as $brands)
                                            <tr>
                                                <td>{{ $brands->brand_name_en }}</td>
                                                <td>{{ $brands->brand_name_ar }}</td>
                                                <td><img src="{{ asset($brands->brand_image)  }}" width="70px" height="40px" alt=""> </td>
                                                <td>
                                                    <a href="{{route('brand.edit',$brands->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                    <a href="{{route('brand.delete',$brands->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('brand.store') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Brand_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control"
                                                >
                                                @error('brand_name_en')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand_Name_Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_ar" class="form-control"
                                                >
                                                @error('brand_name_ar')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Brand_Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control"
                                                >
                                                @error('brand_image')
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

                {{-- -----end Add Brand---- --}}
            </div>
            <!-- /.row -->
        </section>


          <!-- /.content -->

    </div>
@endsection
