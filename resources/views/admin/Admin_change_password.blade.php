@extends('admin.admin_master')

@section('admin')

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
                    <h4 class="box-title">Admin Change Password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST"  action="{{ route('updata.change.password') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                            <div class=" col-md-6">
                                                <div class="form-group">
                                                    <h5>Current_Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password"  name="oldpassword"id="current_password"
                                                            class="form-control" required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>New Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password"  name="password" id="password"
                                                            class="form-control" required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password"  name="password_confirmation" id="password_confirmation"
                                                            class="form-control" required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
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



@endsection
