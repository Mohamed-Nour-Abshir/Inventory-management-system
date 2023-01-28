@extends('admin.layouts.base')
@section('title')
    Nitmag | Invoice
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="invoice-btn">
			<button type="button" class="btn btn-primary-dark btn-sm mr-2" onclick="window.print()"><i class="las la-print"></i>
				Print</button>
			</div>
		<div class="row">
			<div class="col-lg-12">
			<div class="card card-block card-stretch card-height print rounded">
				<div class="card-header d-flex justify-content-center bg-danger header-invoice">
						<div class="iq-header-title">
							<h4 class="card-title mb-0">Invoice #{{ $orderDetails->invoice }}</h4>
						</div>

				</div>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-sm-12">
							<div class=" text-center d-flex justify-content-between">
								{{-- <h4 class="text-danger"><i>{{ $companysetting->company_name }}</i></h4> --}}
								<div class="float-left mr-5">
									<img src="{{ asset('logo/NitmagLogoPng.png')}}" class="logo-invoice img-fluid mb-3">
								</div>
								<div class="border-left border-danger px-5 pb-5 pt-0 text-left">
                                    <div class="text-right"><small><b>Address: {{ $companysetting->company_address }} </b> </small></div>
                                    <div><small><b>Email: {{ $companysetting->company_email }} </b></small></div>
                                    <div><small><b>Website: <a href="http://nitmagbd.com/" target="_blank">nitmagbd.com</a> </b></small></div>
                                    <div><small><b>Phone Number: {{ $companysetting->company_contact }} </b></small></div>
                                </div>
							</div>
						</div>
					</div>
                    <hr>
					<div class="row mb-5">
						<div class="col-lg-12">
							<div class="table-responsive-sm">
									<table class="table table-stripped">
									<thead>
										<tr>
											<th>Order Date</th>
											<th>Order Status</th>
											<th>Order ID</th>
											<th>Customer Name</th>
											<th>Phone Number</th>
											<th>Shipping Address</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{{ $orderDetails->order_date }}</td>
											<td><span class="badge badge-danger">{{ $orderDetails->order_status }}</span></td>
											<td>{{ $orderDetails->order_id }}</td>
											<td>{{ $orderDetails->shipping->customer->name }}</td>
											<td>{{ $orderDetails->shipping->customer->contact }}</td>
											<td>
											<p class="mb-0">{{ $orderDetails->shipping->customer->address }}</p>
											</td>
										</tr>
									</tbody>
									</table>
							</div>
						</div>
					</div>
                    <hr>
					<div class="row mb-5">
						<div class="col-sm-12">
							<h5 class="mb-3">Order Summary</h5>
							<div class="table-responsive-sm">
									<table class="table table-bordered">
									<thead>
										<tr>
												<th>SL</th>
												<th>Item</th>
												<th>Unit Price</th>
												<th>Quantity</th>
												<th>Sub Total</th>
										</tr>
									</thead>
									<tbody>
										@php
											$i = 0;
										@endphp
										@foreach($orderproduct as $data)
										<tr>
											<th>{{ ++$i }}</th>
											<td>
											<h6 class="mb-0">{{ $data->product_name }}</h6>
											</td>
											<td>{{ $data->sell_price }}</td>
											<td>{{ $data->quantity }}</td>
											<td>{{ $data->total_price }}</td>
										</tr>
										@endforeach
									</tbody>
									</table>
                                    <hr>
							</div>
						</div>
					</div>


<hr>

					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive-sm">
									<table class="table table-bordered">
									<thead>
										<tr>
											<th>Total Amount</th>
											<th>payment Status</th>
											<th>Payment method</th>
											<th>Received amount</th>
											<th>Due amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>BDT. {{ $orderDetails->total_amount }}</td>
											<td><span class="badge badge-danger">{{ $orderDetails->order_status }}</span></td>
											<td>{{ $orderDetails->paymentmethod }}</td>
											<td>BDT. {{ $orderDetails->received_amount }}</td>
											<td>BDT. {{ $orderDetails->due }}</td>
										</tr>
									</tbody>
									</table>
							</div>
						</div>
					</div>





					{{-- <div class="row mt-4 mb-3">
						<div class="offset-lg-8 col-lg-4">
							<div class="or-detail rounded">
								<div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
									<h5>Total Amount</h5>
									<h3 class="text-primary font-weight-700">BDT. {{ $orderDetails->total_amount }}</h3>
								</div>
								<div class="p-3 ttl-amt font-weight-700">
									<h5 class="mb-3">Order Details</h5>
									<div>
										<h6>Discount</h6>

										@if($orderDetails->discount > 0)
											<p><i>{{ $orderDetails->discount }} %</i></p>
										@elseif($orderDetails->discount_tk > 0)
											<p><i>BDT. {{ $orderDetails->discount_tk}}</i></p>
										@else
											<p><i>No discount use</i></p>
										@endif
									</div>
									<div>
										<h6>Vat</h6>

										@if($orderDetails->vat > 0)
											<p><i>{{ $orderDetails->vat }} %</i></p>
										@elseif($orderDetails->vat_tk > 0)
											<p><i>BDT. {{ $orderDetails->vat_tk}}</i></p>
										@else
											<p><i>No vat use</i></p>
										@endif
									</div>
									<div class="mb-2">
										<h6>Payment Method</h6>
										<p><i>{{ $orderDetails->paymentmethod }}</i></p>
									</div>
									<div class="mb-2">
										<h6>Received Amount</h6>
										<p class="text-success"><i>BDT. {{ $orderDetails->received_amount }}</i></p>
									</div>
									<div class="mb-2">
										<h6>Due Amount</h6>
										<p class="text-secondary"><i>BDT. {{ $orderDetails->due }}</i></p>
									</div>
								</div>
							</div>
						</div>
					</div> --}}


				</div>

			</div>
			</div>
		</div>
	</div>


    <div class="container">
        <div class="d-flex justify-content-between">
            <p>Authority Signature</p>
            <p>Customer Signature</p>
        </div>
    </div>


</div>

@endsection
