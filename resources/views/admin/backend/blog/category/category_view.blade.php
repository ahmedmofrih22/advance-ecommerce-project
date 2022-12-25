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
                            <h3 class="box-title">Blog Cateogry List <span class="badge badge-pill badge-danger">{{count($blogcategory)}}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>

                                            <th>Blog Cateogry_Name_En</th>
                                            <th>Blog Cateogry_Name_ar</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">cateogry

                                        @foreach ($blogcategory as $cateogrys)
                                            <tr>

                                                <td>{{ $cateogrys->blog_category_name_en }}</td>
                                                <td>{{ $cateogrys->blog_category_name_ar }}</td>
                                                <td>
                                                    <a href="{{route('blogcategory.edit',$cateogrys->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                     <a href="{{route('blogcategory.delete',$cateogrys->id)}}"  class="btn btn-danger" ><i title="Delete" class="fa fa-trash"></i></a>
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


                {{-- ----------  Add Blog Category------- --}}
                <div class="col-3">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Blog Category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('blogcategory.store') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Blog Category_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_en" class="form-control"
                                                >
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
                                            <input type="text" name="blog_category_name_ar" class="form-control"
                                                >
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
