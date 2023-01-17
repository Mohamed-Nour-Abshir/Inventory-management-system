@extends('admin.layouts.app')
@section('title')
    Inventory Management | Product Details
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
								<a href="{{ route('product.index') }}" class="btn btn-primary add-list"></i>Back</a>
							</div>
						<ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" data-toggle="pill" href="#profile1" role="tab" aria-selected="false">Stock Details</a>
							</li>
						</ul>
						<div class="profile-content tab-content">
							<div id="profile2" class="tab-pane fade active show">
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-dark">
											<thead>
											<tr>
												<th scope="col">Image</th>
												<th scope="col">Product Code</th>
												<th scope="col">Product Name</th>
												<th scope="col">Supplier Name</th>
												<th scope="col">Purchase Price</th>
												<th scope="col">Sell Price</th>
												<th scope="col">Quantity</th>
												<th scope="col">Sell Quantity</th>
												<th scope="col">Category</th>
												<th scope="col">Brand</th>
												{{-- <th scope="col">Unit</th> --}}
											</tr>
											</thead>
											<tbody>
												<tr>
													<td><img src="{{ asset('products') . '/' . $product->image }}" alt="" width="50px"></td>
													<td>{{ $product->product_code }}</td>
													<td>{{ $product->purchaseproduct->product_name }}</td>
													<td>{{ $product->supplier_name }}</td>
													<td>{{ $product->purchase_price }}</td>
													<td>{{ $product->sell_price }}</td>
													<td>{{ $product->quantity }}</td>
													<td>{{ $product->orderdetail[0]->quantity }}</td>
													<td>{{ $product->category->name }}</td>
													<td>{{ $product->brand->name }}</td>
													{{-- <td>{{ $product->units->name }}</td> --}}
												</tr>
											</tbody>
											<thead>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th scope="col">Warehouse Name</th>
												<th scope="col">Quantity</th>
												{{-- <th scope="col">Product Available Quantity</th> --}}
											</tr>
											</thead>
											@foreach($products as $data)
												@foreach ($data->warehousestockqty as $item)
													<tfoot>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td>{{ $item->warehouse_name }}</td>
															<td>{{ $item->warehouse_stockqty }}</td>
													</tfoot>
												@endforeach
											@endforeach
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