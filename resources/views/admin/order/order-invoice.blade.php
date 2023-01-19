@extends('admin.layouts.app')
@section('title')
    Nitmag | Invoice
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<div class="card card-block card-stretch card-height print rounded">
				<div class="card-header d-flex justify-content-between bg-danger header-invoice">
						<div class="iq-header-title">
							<h4 class="card-title mb-0">Invoice #{{ $orderDetails->invoice }}</h4>
						</div>
						<div class="invoice-btn">
						<button type="button" class="btn btn-primary-dark mr-2" onclick="window.print()"><i class="las la-print"></i> Print
							Print</button>
						{{-- <button type="button" class="btn btn-primary-dark"><i class="las la-file-download"></i>PDF</button> --}}
						<a href="{{ route('order.index') }}" class="btn btn-primary-dark add-list">Back</a>
						</div>
				</div>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-sm-12">
							<div class="float-left">
								{{-- <img src="{{ asset('logo') . '/' . $companysetting->company_logo }}" class="logo-invoice img-fluid mb-3"> --}}
							</div>
							<div class=" text-center d-flex justify-content-between">
								<h4 class="text-danger p-5"><i>{{ $companysetting->company_name }}</i></h4>
								<div class="border-left border-danger p-5">
                                    <div><small><b>Phone Number: {{ $companysetting->company_contact }} </b></small></div>
								    <div><small><b>Email: {{ $companysetting->company_email }} </b></small></div>
								    <div class="text-center"><small><b>Address: {{ $companysetting->company_address }} </b> </small></div>
                                </div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive-sm">
									<table class="table">
									<thead>
										<tr>
											<th scope="col">Order Date</th>
											<th scope="col">Order Status</th>
											<th scope="col">Order ID</th>
											<th scope="col">Customer Name</th>
											<th scope="col">Phone Number</th>
											<th scope="col">Shipping Address</th>
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
					<div class="row">
						<div class="col-sm-12">
							<h5 class="mb-3">Order Summary</h5>
							<div class="table-responsive-sm">
									<table class="table">
									<thead>
										<tr>
												<th class="text-center" scope="col">#</th>
												<th scope="col">Item</th>
												<th class="text-center" scope="col">Price</th>
												<th class="text-center" scope="col">Quantity</th>
												<th class="text-center" scope="col">Sub Total</th>
										</tr>
									</thead>
									<tbody>
										@php
											$i = 0;
										@endphp
										@foreach($orderproduct as $data)
										<tr>
											<th class="text-center" scope="row">{{ ++$i }}</th>
											<td>
											<h6 class="mb-0">{{ $data->product_name }}</h6>
											</td>
											<td class="text-center">{{ $data->sell_price }}</td>
											<td class="text-center">{{ $data->quantity }}</td>
											<td class="text-center">{{ $data->total_price }}</td>
										</tr>
										@endforeach
									</tbody>
									</table>
							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive-sm">
									<table class="table">
									<thead>
										<tr>
											<th scope="col">Total Amount</th>
											<th scope="col">payment Status</th>
											<th scope="col">Payment method</th>
											<th scope="col">Received amount</th>
											<th scope="col">Due amount</th>
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
</div>

@endsection
