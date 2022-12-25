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
                            <h3 class="box-title">State List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>State Name</th>
                                            <th>Division Name</th>
                                            <th>District Name</th>



                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">cateogry

                                        @foreach ($state as $states)
                                            <tr>

                                                <td>{{ $states->state_name }}</td>
                                                <td>{{ $states->division->division_name }}</td>
                                                <td>{{ $states->district->district_name }}</td>
                                             


                                                <td width="40%">
                                                    <a href="{{route('state.edit',$states->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                     <a href="{{route('state.delete',$states->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">State List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('state.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Division Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled=""> Select Division
                                                </option>
                                                @foreach ($divisions as $div)
                                                    <option value="{{ $div->id }}">
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
                                                    <option value="{{ $div->id }}">
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
                                        <h5>State_Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="state_name" class="form-control"
                                                >
                                                @error('state_name')
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
