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
                            <h3 class="box-title">SubCategory Update</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('category.update') }}">
                                    @csrf

                                    <input type="hidden" name="id" class="form-control" value="{{ $category->id}}">


                                    <div class="form-group">
                                        <h5>Category_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en}}">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category_Name_Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_ar" class="form-control"value="{{ $category->category_name_ar}}">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Categoryd_Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"value="{{ $category->category_icon}}">

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
