@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                
                @include('frontend.commons.user_sidebar')

                <div class="col-md-2">

                </div>
                {{-- /*// end col2  / --}}
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"> <span class="text-danger"> Hi...</span>
                            <strong>{{ Auth::user()->name }}</strong>Welcom To Easy Onlin Shop
                        </h3>


                        <div class="card-body">
                            <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $user->name }}">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $user->email }}">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        value="{{ $user->phone }}">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Image <span>*</span></label>
                                    <input type="file" name="profile_photo_path" class="form-control">

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                        Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                {{-- /*// end col8  / --}}

            </div>
            {{-- /*// end row  / --}}

        </div>
        {{-- /*// end continer  / --}}

    </div>
    {{-- /*// end content  / --}}
@endsection
