@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">





                {{-- ----------  Add Blog Category------- --}}
                <div class="col-10">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Blog Category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('blogcategory.update') }}">
                                    @csrf


                                     <input type="hidden" name="id" value="{{ $blogcategory->id}}" >
                                    <div class="form-group">
                                        <h5>Blog Category_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_en" class="form-control" value="{{ $blogcategory->blog_category_name_en}}" >
                                                @error('blog_category_name_en')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Blog Category_Name_Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_ar" class="form-control" value="{{ $blogcategory->blog_category_name_ar}}">
                                                @error('blog_category_name_ar')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">



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

                {{-- -----end Add Blog Category---- --}}
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
