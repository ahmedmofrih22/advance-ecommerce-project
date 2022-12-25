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
                        <h3 class="text-center"> <span class="text-danger"> Change Password</span>

                        </h3>


                        <div class="card-body">
                            <form action="{{ route('user.password.update') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current_Password
                                        <span>*</span></label>

                                    <input type="password" name="oldpassword"id="current_password" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">New Password <span>*</span></label>
                                    <input type="password" name="password" id="password" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password 
                                        <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control">

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
