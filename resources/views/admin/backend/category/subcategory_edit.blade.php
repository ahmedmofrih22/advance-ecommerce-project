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
                                <form method="POST" action="{{ route('update.subcategory') }}">
                                    @csrf


                                    <input type="hidden" value="{{ $subcategory->id }}" name="id">
                                    <div class="form-group">
                                        <h5>SubCategory_Name_En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control"
                                                value="{{ $subcategory->subcategory_name_en }}">
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
                                            <input type="text" name="subcategory_name_ar" class="form-control"
                                                value="{{ $subcategory->subcategory_name_ar }}">
                                            @error('subcategory_name_ar')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled=""> Select Category
                                                </option>
                                                @foreach ($category as $categorys)
                                                    <option value="{{ $categorys->id }} "
                                                        {{ $categorys->id == $subcategory->category_id ? 'selected' : '' }}>
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

                {{-- -----end Add Brand---- --}}
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
