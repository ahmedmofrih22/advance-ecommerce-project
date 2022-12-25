@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">




                <!-- /.col -->


                {{-- ----------  Add Brand------- --}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('brand.update',$brand->id) }}">
                                    @csrf


                                    <input type="hidden" name="id" value="{{ $brand->id }}">
                                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                    <div class="form-group">
                                        <h5>Brand_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $brand->brand_name_en }}" name="brand_name_en"
                                                class="form-control">
                                            @error('brand_name_en')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand_Name_Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $brand->brand_name_ar }}" name="brand_name_ar"
                                                class="form-control">
                                            @error('brand_name_ar')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Brand_Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control">
                                            @error('brand_image')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">

                                        <input type="submit" value="Update" class="btn btn-primary mb-5">
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
