@extends('admin.layouts.app')
@section('title')
    Nitmag | Purchase Return Show
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
							<div class="text text-right">
								<a href="{{ route('purchase-return.index') }}" class="btn btn-primary add-list"></i>Back</a>
							</div>
						<ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" data-toggle="pill" href="#profile1" role="tab" aria-selected="false">Product Return Details</a>
							</li>
						</ul>
						<div class="profile-content tab-content">
							<div id="profile2" class="tab-pane fade active show">
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-dark">
											<thead>
											<tr>
												<th scope="col">Date</th>
												<th scope="col">Product Name</th>
												<th scope="col">Supplier Name</th>
												<th scope="col">Quantity</th>
												<th scope="col">Warehouse Name</th>
												<th scope="col">Warehouse Quantity</th>
												<th scope="col">Damage Quantity</th>
												<th scope="col">Damage Note</th>
											</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{ $purchasereturn->date }}</td>
													<td>{{ $purchasereturn->product->purchaseproduct->product_name }}</td>
													<td>{{ $purchasereturn->supplier_name }}</td>
													<td>{{ $purchasereturn->quantity }}</td>
													<td>
														@foreach($purchasereturns as $data)
															<div class="d-flex position-relative">{{	$data->warehouse_name }}</div>
														@endforeach
													</td>
													<td>
														@foreach($purchasereturns as $data)
															<div class="d-flex position-relative">{{	$data->warehouse_quantity }}</div>
														@endforeach
													</td>
													<td>
														@foreach($purchasereturns as $data)
															<div class="d-flex position-relative">{{	$data->damage_quantity }}</div>
														@endforeach
													</td>
													<td>{{ $purchasereturn->damage_note }}</td>
												</tr>
											</tbody>
										</table>
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
