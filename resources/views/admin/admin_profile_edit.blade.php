@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin profile Edite</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                            <div class=" col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $EditAdminDate->name }}" name="name"
                                                            class="form-control" required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end col 6 --}}

                                            <div class=" col-md-6">
                                                <div class="form-group">
                                                    <h5> Admin User Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" value="{{ $EditAdminDate->email }}" name="email"
                                                            class="form-control" required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end col 6 --}}
                                        </div>
                                        {{-- end row --}}

                                        <div class="row">

                                            <div class=" col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Iamge <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="hidden" name="old_image" class="form-control"
                                                        required=""   value="{{ !empty($EditAdminDate->profile_photo_path) ? url('upload/admin_image/' . $EditAdminDate->profile_photo_path) : url('upload/no_image.jpg') }}">

                                                        <input type="file" name="profile_photo_path" class="form-control"
                                                            required="" id="image" value="{{ !empty($EditAdminDate->profile_photo_path) ? url('upload/admin_image/' . $EditAdminDate->profile_photo_path) : url('upload/no_image.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end col 6 --}}

                                            <div class=" col-md-6">
                                                <img id="showImage"
                                                    src="{{ !empty($EditAdminDate->profile_photo_path) ? url('upload/admin_image/' . $EditAdminDate->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                    style="width: 100px;height:100px">
                                            </div>
                                            {{-- end col 6 --}}
                                        </div>
                                        {{-- end row --}}




                                    </div>
                                </div>

                                <div class="text-xs-right">

                                    <input type="submit" value="Update" class="btn btn-primary mb-5">
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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
