@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('title')
 My Checkout
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->

    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">

				<!-- guest-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                    <form class="register-form" action="{{route('checkout.store')}}" method="POST">
                        @csrf
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b> Shipping Name </b><span>*</span></label>
					    <input type="text" name="shipping_name" value="{{Auth::user()->name}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Shipping Name"required="">
					  </div>
                      {{-- end from group --}}


						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b> Email Address </b><span>*</span></label>
					    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input"value="{{Auth::user()->email}}" id="exampleInputEmail1" placeholder="Email Address"required="">
					  </div>
                      {{-- end from group --}}


						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b> Phone </b><span>*</span></label>
					    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input"value="{{Auth::user()->phone}}" id="exampleInputEmail1" placeholder="Phone" required="">
					  </div>
                      {{-- end from group --}}

                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>	Post_Code </b><span>*</span></label>
					    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="post_code" required="">
					  </div>
                      {{-- end from group --}}


				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login" style="top: 30px">
					<div class="form-group">
                        <h5><b> Division Select </b><span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select id="division_id"  name="division_id" class="form-control"
                                aria-invalid="false" required="">
                                <option value="" selected="" disabled=""> Select
                                    Division
                                </option>
                                @foreach ($division as $itme)
                                    <option value="{{ $itme->id }}">
                                        {{ $itme->division_name }}</option>
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
                        <h5> <b>District Select </b><span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select id="district_id"  name="district_id" class="form-control"
                                aria-invalid="false" required="">
                                <option value="" selected="" disabled=""> Select
                                    District
                                </option>




                            </select>
                            @error('district_id')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <h5><b>State Select </b><span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select id="state_id"  name="state_id" class="form-control"
                                aria-invalid="false" required="">
                                <option value="" selected="" disabled=""> Select
                                    State
                                </option>




                            </select>
                            @error('state_id')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b>Notes</b>	<span>*</span></label>
                        <textarea class="form-control" placeholder="Notes" name="notes" id="" cols="30" rows="5"></textarea>

                    </div>
                      {{-- end from group --}}


				</div>
				<!-- already-registered-login -->

			</div>
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->


					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    @foreach ($carts as $item)


					<li>
                        <strong> Iamge :</strong>
                        <img src="{{asset($item->options->image)}}" alt="" style="height: 50px; width:50px">
                    </li>
                    <li>
                      <strong>Qty:</strong>
                     ( {{$item->qty}})
                      <strong>Color:</strong>
                      {{$item->options->color}}

                      <strong>Size:</strong>
                      {{$item->options->size}}

                    </li>
					<li>
                   @if (Session::has('coupon'))
                   <strong>Subtotal:</strong>({{$cartTotal}} )<hr>
                   <strong>Coupon Name:</strong>{{session()->get('coupon')['coupon_name']}}
                  ( {{session()->get('coupon')['coupon_discount']}}%)
                    <hr>

                    <strong>Coupon Discount:</strong>({{session()->get('coupon')['discount_amount']}})

                    <hr>
                    <strong>Grand Total:</strong>({{session()->get('coupon')['total_amount']}})

                    <hr>
                   @else
                   <strong>Subtotal:</strong>{{$cartTotal}}<hr>
                   <strong>Grand Total:</strong>{{$cartTotal}}<hr>
                   @endif

                    </li>

                    @endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- checkout-progress-sidebar -->				</div>

<div class="col-md-4">
    <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Select  Payment Method</h4>
</div>
        <div class="row">
            <div class="col-md-4">
       <label for=""> Stripe</label>
       <input type="radio" name="payment_method" value="stripe">
       <img src="{{asset('frontend/assets/images/payments/4.png')}}" alt="">
            </div>
            {{-- //end col md 4 --}}
            <div class="col-md-4">
                <label for=""> Card</label>
                <input type="radio" name="payment_method" value="card">
                <img src="{{asset('frontend/assets/images/payments/3.png')}}" alt="">

            </div>
            {{-- //end col md 4 --}}
            <div class="col-md-4">
                <label for=""> Cash</label>
                <input type="radio" name="payment_method" value="cash">
                <img src="{{asset('frontend/assets/images/payments/6.png')}}" alt="">

            </div>
            {{-- //end col md 4 --}}
        </div>
        {{-- edn row --}}
        <hr>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Peyment Step</button>

</div>
</div>
</div>
<!-- checkout-progress-sidebar -->				</div>



</form>


			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->





<script type="text/javascript">
 $(document).ready(function() {

$('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
               // console.log(division_id);
                if (division_id) {
                    $.ajax({
                        url: "district-get/ajax/" +division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="state_id"]').empty();
                            $('select[name="district_id"]').empty();
                           // console.log(data);
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(


                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                                // console.log(data );
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });



        $('#district_id').on('change', function() {
                var district_id = $(this).val();

                if (district_id) {
                    $.ajax({
                        url: "state-get/ajax/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            $('select[name="state_id"]').empty();

                            $.each(data, function(key, value) {
                                $('select[name="state_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .state_name + '</option>');
                            });
                         },
                    });
                } else {
                    alert('danger');
                }
            });

         });
</script>





@endsection
