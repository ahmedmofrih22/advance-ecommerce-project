@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product</h4>
                    {{-- <button id="test_ajax" class="btn btn-danger">test ajax</button> --}}
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row"> {{-- start last row --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control" aria-invalid="false" required="">
                                                            <option value="" selected="" disabled=""> Select
                                                                Brand
                                                            </option>
                                                            @foreach ($brand as $brands)
                                                                <option value="{{ $brands->id }}">
                                                                    {{ $brands->brand_name_en }}</option>
                                                            @endforeach



                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Categoryd Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select id="category_id"  name="category_id" class="form-control"
                                                            aria-invalid="false" required="">
                                                            <option value="" selected="" disabled=""> Select
                                                                Category
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
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>SubCategoryd Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select  class="form-control" id="subcategory_id" name="subcategory_id"
                                                        required=""    >





                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}

                                        </div> {{-- end last row --}}

                                        <div class="row"> {{-- start 2ast row --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>subsubcategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control"
                                                            aria-invalid="false" required="">
                                                            <option value="" selected="" disabled=""> Select
                                                                subsubcategory
                                                            </option>




                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_name_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control"
                                                            required>

                                                        @error('product_name_en')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_name_ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_ar" class="form-control"
                                                            required>

                                                        @error('product_name_ar')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}

                                        </div> {{-- end 2ast row --}}

                                        <div class="row"> {{-- start 3ast row --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control"
                                                            required>

                                                        @error('product_code')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_qty <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control"
                                                            required>

                                                        @error('product_qty')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_tags_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control"
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">

                                                        @error('product_tags_en')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}

                                        </div> {{-- end 3ast row --}}

                                        <div class="row"> {{-- start 4ast row --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_tags_ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_ar" class="form-control"
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">

                                                        @error('product_tags_ar')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_size_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control"
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">

                                                        @error('product_size_en')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_size_ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_ar" class="form-control"
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">

                                                        @error('product_size_ar')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}

                                        </div> {{-- end 4ast row --}}


                                        <div class="row"> {{-- start 5ast row --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_color_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en"
                                                            class="form-control" value="Lorem,Ipsum,Amet"
                                                            data-role="tagsinput">

                                                        @error('product_color_en')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_color_ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_ar"
                                                            class="form-control" value="Lorem,Ipsum,Amet"
                                                            data-role="tagsinput">

                                                        @error('product_color_ar')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_selling_price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control"
                                                            required>

                                                        @error('selling_price')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}

                                        </div> {{-- end 5ast row --}}

                                        <div class="row"> {{-- start 6ast row --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>product_discount_price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control"
                                                            required>

                                                        @error('discount_price')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thambnail"
                                                            class="form-control" onchange="mainThamUrl(this)">

                                                        @error('product_thambnail')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-4">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Multi_Img <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg"
                                                            required>

                                                        @error('multi_img')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}

                                        </div> {{-- end 6ast row --}}



                                        <div class="row"> {{-- start 7ast row --}}
                                            <div class="col-md-6">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Short_Description_En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-6">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Short_Description_Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_ar" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}


                                        </div> {{-- end 7ast row --}}



                                        <div class="row"> {{-- start 8ast row --}}
                                            <div class="col-md-6">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Long_Description_En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                            Long_Description_En                                                           </textarea>
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}
                                            <div class="col-md-6">{{-- start lastcol --}}
                                                <div class="form-group">
                                                    <h5>Long_Description_Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_descp_ar" rows="10" cols="80">
                                                            Long_Description_Ar                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>{{-- end last col --}}


                                        </div> {{-- end 7ast row --}}






                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1">
                                                    <label for="checkbox_2">Hot_Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="featured" id="checkbox_3"
                                                        value="1">

                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="special_offer" id="checkbox_4" 
                                                        value="1">
                                                    <label for="checkbox_4">Special_Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="special_deals" id="checkbox_5"
                                                        value="1">
                                                    <label for="checkbox_5">Special_Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-xs-right" style="    margin-left: 40%;">
                                    <input type="submit" value="submit" class="btn btn-primary mb-5">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {


            $('#test_ajax').click(function(){
                var category = 5;


              $.ajax({
                    url : 'ajax/5',
                    type: 'GET',
                    success: function(data){
                        alert(data);
                    }
                });
            });


            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();

                if (category_id) {
                    $.ajax({
                        url: "subcategory_ajax/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            $('select[name="subcategory_id"]').empty();
                            //console.log(data);
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(


                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                                // console.log(data );
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });

</script>

<script type="text/javascript">
        $(document).ready(function() {
        $('#subcategory_id').on('change', function() {
                var subcategory_id = $(this).val();

                if (subcategory_id) {
                    $.ajax({
                        url: "ajax/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {


                            $('select[name="subsubcategory_id"]').empty();
                        //console.log(data);
                        //alert(data);
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en + '</option>');
                            });
                         },
                    });
                } else {
                    alert('danger');
                }
            });

        });
            </script>
           <script type="text/javascript">


          function mainThamUrl(input){
              if (input.files && input.files[0] ) {
                var reader = new FileReader();
                reader.onload = function(e){

                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0])

              }
          }
            </script>


<script>

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>

@endsection
