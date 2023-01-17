@extends('admin.layouts.app')
@section('title')
    Nitmag | Purchase Show
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<div class="card car-transparent">
				<div class="card-body p-0">
					<div class="profile-image position-relative">
						<img src="{{ asset('assets/images/background/supplier.jpg') }}" class="img-fluid rounded w-100" alt="profile-image">
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="row m-sm-0 px-3">
			<div class="col-lg-12 card-profile">
				<div class="card card-block card-stretch card-height">
					<div class="card-body">
						<ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" data-toggle="pill" href="#profile1" role="tab" aria-selected="false">Purchase Supplier Information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#profile2" role="tab" aria-selected="false">Purchase Products</a>
							</li>
						</ul>
						<div class="profile-content tab-content">

							<div id="profile1" class="tab-pane fade active show">
							<div class="d-flex align-items-center mb-3">
								<div class="ml-3">
									<h4 class="mb-1">{{ $purchase['supplier']->name }}</h4>
									<span>{{ $purchase['supplier']->designation }}</span>
								</div>
							</div>
							<p></p>
							<div class="row">

							<ul class="list-inline p-0 m-0">
								<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
									</svg>
									<p class="mb-0"><h6>Address: &nbsp;</h6> {{ $purchase['supplier']->address }}</p>
								</div>
								</li>
								<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
									</svg>
									<p class="mb-0"><h6>Company Name: &nbsp;</h6> {{ $purchase['supplier']->company_name }}</p>
								</div>
								</li>
								<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
									</svg>
									<p class="mb-0"><h6>Phone No: &nbsp;</h6> {{ $purchase['supplier']->contact }}</p>
								</div>
								</li>
							</ul>
							</div>
							</div>
							<div id="profile2" class="tab-pane fade">
							<div class="row">
								<div class="col-lg-12">
									<table class="table text-center">
										<thead>
										<tr>
											<th scope="col">Product Name</th>
											<th scope="col">Product Price</th>
											<th scope="col">Sell Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Discount</th>
											<th scope="col">Total Amount</th>
										</tr>
										</thead>
										<tbody>
										{{-- @dump($purchaseProduct); --}}
										@foreach($purchaseProduct as $item)
										{{-- @dump($item->purchaseproduct[0]->product_name) --}}
											<tr>
												<td>
													<div class="inner-shadow p-4 shadow-showcase text-center">
														<h6>{{ $item->purchaseproduct[0]->product_name }}</h6>
													</div>
												</td>
												<td>
													<div class="inner-shadow p-4 shadow-showcase text-center">
														<h6>BDT. {{ $item->purchaseproduct[0]->product_price }}</h6>
													</div>
												</td>
												<td>
													<div class="inner-shadow p-4 shadow-showcase text-center">
														<h6>BDT. {{ $item->purchaseproduct[0]->sell_price }}</h6>
													</div>
												</td>
												<td>
													<div class="inner-shadow p-4 shadow-showcase text-center">
														<h6>{{ $item->purchaseproduct[0]->quantity }}</h6>
													</div>
												</td>
												<td>
													<div class="inner-shadow p-4 shadow-showcase text-center">
														<h6>{{ $item->purchaseproduct[0]->discount }}%</h6>
													</div>
												</td>
												<td>
													<div class="inner-shadow p-4 shadow-showcase text-center">
														<h6>BDT. {{ $item->purchaseproduct[0]->total_amount }}</h6>
													</div>
												</td>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									 <div class="row mt-8 mb-10">
										<div class="offset-lg-7 col-lg-5">
											<div class="or-detail rounded">
												<div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                        <h5>Total Purchase Amount: </h5>
                                                        <h3 class="text-primary font-weight-700">
                                                            BDT. {{ $purchase->total_payment }}
                                                        </h3>
                                                </div>
												<div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
													<h5>Total Due Amount:</h5>
													<h3 class="text-primary font-weight-700">
														BDT. {{ $purchase->due }}
													</h3>
                                                </div>
												 <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
													<h5>Payment: </h5>
													<h6 class="blur-shadow p-4 shadow-showcase text-center">{{ $purchase->payment_status }}</h6>
													<h5>Purchase: </h5>
													<h6 class="blur-shadow p-4 shadow-showcase text-center">{{ $purchase->purchase_status }}</h6>
												</div>
												@if($purchase->purchase_status == 'Panding')
												<h4 class="text-center p-2">Panding Product</h4>
												<table class="table text-center">
													<thead>
													<tr>
														<th scope="col">Product Name</th>
														<th scope="col">Quantity</th>
													</tr>
													</thead>
													<tbody>
													@foreach($purchaseProduct as $item)
														<tr>
															<td>
																<div class="basic-drop-shadow p-4 shadow-showcase text-center">
																	<h6>{{ $item->purchasepanding[0]->product_name }}</h6>
																</div>
															</td>
															<td>
																<div class="basic-drop-shadow p-4 shadow-showcase text-center">
																	<h6>{{ $item->purchasepanding[0]->qty }}</h6>
																</div>
															</td>
														</tr>
													@endforeach
													</tbody>
												</table>
												@else
													<h4 class="text-center p-2">No Panding Product</h4>
												@endif
											</div>
										</div>
									</div>
								</div>
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
