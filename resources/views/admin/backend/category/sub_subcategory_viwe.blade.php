@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-9">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub_SubCateogry List<span class="badge badge-pill badge-danger">{{count($sub_subcateogry)}}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Cateogry</th>
                                            <th>Sub_SubCateogry English</th>
                                            <th>Sub_SubCateogry Name</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">

                                        @foreach ($sub_subcateogry as $sub_subcateogrys)
                                            <tr>
                                                <td>{{ $sub_subcateogrys->Category->category_name_en }}</td>
                                                <td>{{ $sub_subcateogrys->subsubcategory_name_en }}</td>
                                                <td>{{ $sub_subcateogrys->subsubcategory_name_ar }}</td>

                                                <td>
                                                    <a href="{{ route('edit.sub_subcateogrys', $sub_subcateogrys->id) }}"
                                                        class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('delete.sub_subcateogrys', $sub_subcateogrys->id) }}"
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
                            <h3 class="box-title">SubSubCateogry</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('store.sub_subcategory') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Sub_SubCategory English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control">
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
                                            <input type="text" name="subsubcategory_name_ar" class="form-control">
                                            @error('subsubcategory_name_ar')
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

                                    <div class="form-group">
                                        <h5>subCategoryd <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled=""> Select subCategory
                                                </option>




                                            </select>
                                            @error('subcategory_id')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "subcategory_ajax/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            // console.log(data);
                            $.each(data,function(key,value){
                                $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>

    {{-- <script>
    let log = console.log;
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                log(category_id);
                $.ajax({
                    url: "{{ URL::to('Get_subcategory') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script> --}}
@endsection
