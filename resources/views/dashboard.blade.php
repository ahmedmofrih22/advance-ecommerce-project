@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top" style="border-radius: 50%; "
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_image/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                        width="80%" height="80%"><br><br>
                        <ul class="list-group  list-group-flush ">
                            <a href="{{route('dashboard')}}"  class="btn btn-primary btn-sm btn-block">Home</a>
                            <a href="{{route('user.profile')}}"  class="btn btn-primary btn-sm btn-block">Profile Update</a>
                            <a href="{{route('change.password')}}"  class="btn btn-primary btn-sm btn-block">Change Password</a>
                            <a href="{{route('my.orders')}}"  class="btn btn-primary btn-sm btn-block">Orders</a>
                            <a href="{{route('user.logout')}}"  class="btn btn-danger btn-sm btn-block">Logout</a>

                        </ul>
                </div>
                {{-- /*// end col2  / --}}

                <div class="col-md-2">

                </div>
                {{-- /*// end col2  / --}}
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"> <span class="text-danger"> Hi...</span> <strong>{{Auth::user()->name}}</strong>Welcom To Easy Onlin Shop</h3>

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
