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
                            <h3 class="box-title">SubCateogry List
                                <span class="badge badge-pill badge-danger">{{count($subcateogry)}}</span>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Cateogry</th>
                                            <th>SubCateogry_Name_En</th>
                                            <th>SubCateogry_Name_En</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">cateogry

                                        @foreach ($subcateogry as $subcateogrys)
                                            <tr>
                                                <td>{{ $subcateogrys->Category->category_name_en }}</td>
                                                <td>{{ $subcateogrys->subcategory_name_en }}</td>
                                                <td>{{ $subcateogrys->subcategory_name_ar }}</td>

                                                <td>
                                                    <a href="{{ route('edit.subcategory', $subcateogrys->id) }}"
                                                        class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('delete.subcategory', $subcateogrys->id) }}"
                                                        class="btn btn-danger" id="delete"><i title="Delete"
                                                            class="fa fa-trash"></i></a>
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
                            <h3 class="box-title"> Add SubCateogry  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('store.subcategory') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>SubCategory_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control">
                                            @error('subcategory_name_en')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory_Name_Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_ar" class="form-control">
                                            @error('subcategory_name_ar')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Categoryd <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled=""> Select Category
                                                </option>
                                                @foreach ($category as $categorys)
                                                    <option value="{{ $categorys->id }}">
                                                        {{ $categorys->category_name_en }}</option>
                                                @endforeach



                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">
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
