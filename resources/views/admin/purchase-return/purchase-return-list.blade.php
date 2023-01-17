@extends('admin.layouts.app')
@section('title')
    Nitmag | Purchase Return List
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
						<h4 class="mb-3">Purchase Return List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Purchase Return Create'))
						<a href="{{ route('purchase-return.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Purchase Return</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Date</th>
							<th>Product Name</th>
							<th>Supplier Name</th>
							<th>Quantity</th>
							<th>Damage Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($purchasereturn as $data)
						{{-- @dump($data->stockquantity->storage_name) --}}
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $data->date }}</td>
							<td>{{ $data->product->purchaseproduct->product_name }}</td>
							<td>{{ $data->supplier_name }}</td>
							<td>{{ $data->quantity }}</td>
							<td>{{ $data->damage_note }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
									<a class="badge bg-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"
										href="{{ route('purchase-return.show', $data->id) }}"><i class="ri-eye-line mr-0"></i></a>
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('purchase-return.edit', $data->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@if($rolePermission->can('Purchase Return Delete'))
									<form action="{{ route('purchase-return.destroy', [$data->id]) }}" method="POST">
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
						{{ $purchasereturn->render("pagination::bootstrap-4") }}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
