@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">


                @include('frontend.commons.user_sidebar')

                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                    <div class="table-responsive">

                        <table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for="">Date</label>

                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Total</label>

                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Payment</label>

                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Invoice </label>

                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Order</label>

                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Action</label>

                                    </td>



                                </tr>


                                @foreach ($orders as $itam)
                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for="">{{ $itam->order_date}}</label>

                                    </td>
                                    <td class="col-md-3">
                                        <label for="">$ {{ $itam->amount}}</label>

                                    </td>
                                    <td class="col-md-1">
                                        <label for="">{{ $itam->payment_method}}</label>

                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{ $itam->invoice_no}} </label>

                                    </td>
                                    <td class="col-md-2">
                                        <label for="">
                                            @if($itam->status == 'pending')
                                            <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
                                            @elseif($itam->status == 'confirm')
                                             <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>


                                              @elseif($itam->status == 'processing')
                                             <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>

                                              @elseif($itam->status == 'picked')
                                             <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>

                                              @elseif($itam->status == 'shipped')
                                             <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>

                                              @elseif($itam->status == 'delivered')
                                             <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>
                                                    @if($itam->return_order == 1)
                                                    <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>

                                                    @endif
                                             @else
                                      <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>

                                          @endif

                                        </label>

                                    </td>
                                    <td class="col-md-1">
                                        <a href="{{url('user/order_details/'.$itam->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                                         <a target="_blank"  href="{{url('user/invoice_download/'.$itam->id)}}" class="btn btn-sm btn-danger" style="margin-top:5px"><i class="fa fa-download" style="color: white;"></i> Invoice </a>

                                    </td>



                                </tr>
                                @endforeach



                            </tbody>

                        </table>
                         {{-- /*// table/ --}}
                    </div>
                    {{-- /*// table-responsive/ --}}

                </div>
                {{-- /*// end col 8 / --}}



            </div>
            {{-- /*// end row  / --}}

        </div>
        {{-- /*// end continer  / --}}

    </div>
    {{-- /*// end content  / --}}
@endsection
