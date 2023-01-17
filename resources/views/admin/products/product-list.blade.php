@extends('admin.layouts.app')
@section('title')
    Inventory Management | Product List
@endsection

@section('content')
 @php
     $rolePermission = Auth::guard('web')->user();
 @endphp

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
					<div>
						<h4 class="mb-3">Product List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Product Create'))
						<a href="{{ route('product.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Product</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Supplier Name</th>
							<th>Purchase Price</th>
							<th>Sell Price</th>
							<th>Quantity</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($product as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td><img src="{{ asset('products') . '/' . $item->image }}" alt="" width="50px"></td>
							<td>{{ $item->purchaseproduct->product_name }}</td>
							<td>{{ $item->supplier_name }}</td>
							<td>{{ $item->purchase_price }}</td>
							<td>{{ $item->sell_price }}</td>
							<td>{{ $item->quantity }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
									<a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
										href="{{ route('product.show', $item->id) }}"><i class="ri-eye-line mr-0"></i></a>
								@if($rolePermission->can('Product Edit'))
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('product.edit', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@endif
								@if($rolePermission->can('Product Delete'))
									<form action="{{ route('product.destroy', [$item->id]) }}" method="POST">
										@csrf
										@method('DELETE')
											<button type="submit" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" >
												<i class="ri-delete-bin-line mr-0"></i>
											</button>
									</form>
								@endif
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
				<nav aria-label="Page navigation example">
					<div class="pagination justify-content-end">
						{{ $product->render("pagination::bootstrap-4") }}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection