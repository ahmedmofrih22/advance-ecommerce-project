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
                            <h3 class="box-title">Cateogry List<span class="badge badge-pill badge-danger">{{count($cateogry)}}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Cateogry_Icon</th>
                                            <th>Cateogry_Name_En</th>
                                            <th>Cateogry_Name_En</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">cateogry

                                        @foreach ($cateogry as $cateogrys)
                                            <tr>
                                                <td><span><i class="{{ $cateogrys->category_icon }}"></i></span></td>
                                                <td>{{ $cateogrys->category_name_en }}</td>
                                                <td>{{ $cateogrys->category_name_ar }}</td>
                                                <td>
                                                    <a href="{{route('category.edit',$cateogrys->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                     <a href="{{route('category.delete',$cateogrys->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('category.store') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Category_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control"
                                                >
                                                @error('category_name_en')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category_Name_Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_ar" class="form-control"
                                                >
                                                @error('category_name_ar')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Categoryd_Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"
                                                >
                                                @error('category_icon')
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
