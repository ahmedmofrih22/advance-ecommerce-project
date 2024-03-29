@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">






                {{-- ----------  Edit Brand------- --}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit_SubSubCateogry</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('update.sub_subcategory') }}">
                                    @csrf


                                    <input type="hidden" name="id" value="{{ $sub_subcategory->id }}">

                                    <div class="form-group">
                                        <h5>Categoryd <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled=""> Select Category
                                                </option>
                                                @foreach ($category as $categorys)
                                                    <option value="{{ $categorys->id }}" {{$categorys->id== $sub_subcategory->category_id?'selected':''}}>
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

                                    <div class="form-group">
                                        <h5>subCategoryd <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled=""> Select subCategory
                                                </option>
                                                @foreach ($subcategory as $subcategorys)
                                                <option value="{{ $subcategorys->id }}" {{$subcategorys->id== $sub_subcategory->subcategory_id?'selected':''}}>
                                                    {{ $subcategorys->subcategory_name_en }}</option>
                                            @endforeach



                                            </select>
                                            @error('subcategory_id')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub_SubCategory English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{$sub_subcategory->subsubcategory_name_en }}" name="subsubcategory_name_en" class="form-control">
                                            @error('subsubcategory_name_en')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub_SubCategory Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{$sub_subcategory->subsubcategory_name_ar }}"  name="subsubcategory_name_ar" class="form-control">
                                            @error('subsubcategory_name_ar')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">

                                        <input type="submit" value="Updata" class="btn btn-primary mb-5">
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
