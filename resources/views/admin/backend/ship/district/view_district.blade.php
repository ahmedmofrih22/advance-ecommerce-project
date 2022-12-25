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
                            <h3 class="box-title">District List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Division Name</th>
                                            <th>District Name</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #fff">cateogry

                                        @foreach ($district as $districts)
                                            <tr>
                                                <td>{{ $districts->division->division_name }}</td>
                                                <td>{{ $districts->district_name }}</td>


                                                <td width="40%">
                                                    <a href="{{route('district.edit',$districts->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                     <a href="{{route('district.delete',$districts->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Districts List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST"  action="{{ route('district.store') }}">
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
                                        <h5>Districts_Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="district_name" class="form-control"
                                                >
                                                @error('district_name')
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
