@extends('admin.layouts.app')
@section('title')
    Inventory Management | Invoice Update
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">                  
			<div class="col-lg-12">
			<div class="card card-block card-stretch card-height print rounded">
				<div class="card-header d-flex justify-content-between bg-primary header-invoice">
						<div class="iq-header-title">
						<h4 class="card-title mb-0">Invoice#{{ $orderDetails->invoice }}</h4>
						</div>
						<div class="invoice-btn">
						<button type="button" class="btn btn-primary-dark mr-2" onclick="window.print()"><i class="las la-print"></i> Print
							Print</button>
						{{-- <button type="button" class="btn btn-primary-dark"><i class="las la-file-download"></i>PDF</button> --}}
						<a href="{{ route('order.index') }}" class="btn btn-primary-dark add-list">Back</a>
						</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">                                  
							<img src="{{ asset('assets/images/kaizenit.png') }}" class="logo-invoice img-fluid mb-3">
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
					<div class="row mt-4 mb-3">
						<div class="offset-lg-8 col-lg-4">
							<div class="or-detail rounded">
								<form action="{{ route('order.update', $orderDetails->id) }}" method="POST">
                                    @csrf
                    		        @method('PATCH')
									<div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
										<h5>Total Amount</h5>
										<h3 class="text-primary font-weight-700">BDT. {{ $orderDetails->total_amount }}</h3>
									</div>
									<div class="p-3 ttl-amt font-weight-700">
										<h5 class="mb-3">Order Details</h5>
										<div>
											<h6>Discount</h6>
											<p><i>{{ $orderDetails->discount }} %</i></p>
										</div>
										<div>
											<h6>Vat</h6><i>{{ $orderDetails->vat }} %</i></p>
										</div>
										<div class="mb-2">
											<h6>Payment Method</h6>
											<p><i>{{ $orderDetails->paymentmethod }}</i></p>
										</div>
										<div class="mb-2">
											<h6>Received Amount</h6>
											<div class="from-group">
												<input type="number" id="recievedAmount" name="received_amount" class="form-control" value="{{ $orderDetails->received_amount }}" readonly>
											</div>
										</div>
										<div class="mb-2">
											<h6>Due Amount</h6>
											<div class="from-group">
												<input type="number" id="dueAmount" name="due" class="form-control" value="{{ $orderDetails->due }}" readonly>
											</div>
										</div>
										<div class="mb-2" id="requiredamount">
											<h6>Required Due Amount</h6>
											<div class="from-group">
												<input type="number" id="requiredAmount" class="form-control" placeholder="Required Amount">
											</div>
										</div>
										<div class="mb-2" id="orderstatus">
											<div class="form-group">
												<label>Order Status</label>
												<select name="order_status" class="form-control" data-style="py-0" id="paymentID">
													<option value="Paid">Paid</option>
													<option value="Due">Due</option>
												</select>
											</div>
										</div> 
										<div class="mb-2">
											<button type="submit" class="myButton mt-2 btn btn-dark"> <i class="ri-bill-fill"></i>Invoice Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>                            
				</div>
			</div>
			</div>                                    
		</div>
	</div>
</div>

@endsection

@push('script')
<script>

			$("#requiredAmount").change(function(){

				let dueAmount = parseInt($("#dueAmount").val());
				let recievedAmount = parseInt($("#recievedAmount").val());
				let requiredAmount = parseInt($("#requiredAmount").val());
				let totalDueamount = (dueAmount - requiredAmount);
				let totalReceivedamount = (recievedAmount+requiredAmount);
				parseInt($("#recievedAmount").val(totalReceivedamount));
				parseInt($("#dueAmount").val(totalDueamount));
    		});

			$(document).ready(function(){
				let dueAmount = parseInt($("#dueAmount").val());
				console.log(dueAmount);
				if(dueAmount <= 0){
					$('.myButton').hide();
					$('#requiredamount').hide();
					$('#orderstatus').hide();
				}
				else{
					$('.myButton').show();
					$('#requiredamount').show();
					$('#orderstatus').show();
				}

			});


</script>
@endpush