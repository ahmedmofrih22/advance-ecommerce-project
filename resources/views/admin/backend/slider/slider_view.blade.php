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
                            <h3 class="box-title">Slider List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th>Slider_img</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($Slider as $Sliders)
                                            <tr>
                                                <td><img src="{{ asset($Sliders->slider_img)  }}" width="70px" height="40px" alt=""> </td>

                                                <td>
                                                            @if ($Sliders->title == null)
                                                            <span class="badge badge-pill badge-danger">No Title</span>
                                                            @else
                                                            {{ $Sliders->title }}
                                                            @endif
                                                   </td>
                                                <td>{{ $Sliders->description }}</td>
                                                <td>
                                                    @if ($Sliders->status == 1)

                                                    <span class="badge badge-pill badge-success">Active</span>

                                                    @else
                                                    <span class="badge badge-pill badge-danger">InActive</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{route('slider.edit',$Sliders->id)}}" class="btn btn-info"><i title="Edit" class="fa fa-pencil"></i></a>
                                                    <a href="{{route('slider.delete',$Sliders->id)}}"  class="btn btn-danger" id="delete"><i title="Delete" class="fa fa-trash"></i></a>
                                                    @if ($Sliders->status == 1)

                                                    <a href="{{route('slider.inactive',$Sliders->id)}}" class="btn btn-danger"><i title="InActive Now" class="fa fa-arrow-down"></i></a>


                                                    @else
                                                    <a href="{{route('slider.active',$Sliders->id)}}" class="btn btn-success"><i title="Active Now" class="fa fa-arrow-up"></i></a>

                                                    @endif


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
                            <h3 class="box-title">Slider List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('slider.store') }}">
                                    @csrf



                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control"
                                                >
                                                @error('title')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control"
                                                >
                                                @error('description')
                                                <span class="text-danger" >
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider_img <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control"
                                                >
                                                @error('slider_img')
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

                {{-- -----end Add Brand---- --}}
            </div>
            <!-- /.row -->
        </section>


          <!-- /.content -->

    </div>
@endsection
