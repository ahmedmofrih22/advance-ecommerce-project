@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">




                {{-- ----------  Add Brand------- --}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">State Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('state.updata',$state->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Division Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled=""> Select Division
                                                </option>
                                                @foreach ($divisions as $div)
                                                    <option value="{{ $div->id }}" {{$div->id == $state->division_id ?'selected':''  }}  >
                                                        {{ $div->division_name }}</option>
                                                @endforeach



                                            </select>
                                            @error('division_id')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>District Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled=""> Select District
                                                </option>
                                                @foreach ($district as $div)
                                                    <option value="{{ $div->id }}" {{$div->id == $state->district_id ?'selected':''  }}  >
                                                        {{ $div->district_name }}</option>
                                                @endforeach



                                            </select>
                                            @error('district_id')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Districts_Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $state->state_name}}" name="state_name" class="form-control"
                                                >
                                                @error('state_name')
                                                <span class="text-danger" >
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
