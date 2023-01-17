@extends('admin.layouts.app')
@section('title')
    Nitmag | Purchase List
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
						<h4 class="mb-3">Purchase List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Purchase Create'))
						<a href="{{ route('purchase.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Purchase</a>
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
							<th>Order No</th>
							<th>Supplier</th>
							<th>Total Payment</th>
							<th>Due</th>
							<th>Payment Status</th>
							<th>Purchase Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($purchase as $purchaseItem)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $purchaseItem->date }}</td>
							<td>{{ $purchaseItem->orderID }}</td>
							<td>{{ $purchaseItem['supplier']->name }}</td>
							<td>{{ $purchaseItem->total_payment }}</td>
							<td>{{ $purchaseItem->due }}</div></td>
							<td><div class="badge {{ ($purchaseItem->payment_status === 'Due' || $purchaseItem->payment_status === 'Paid')? 'badge-warning' : 'badge-success' }}">{{ $purchaseItem->payment_status }}</div></td>
							<td><div class="badge {{ ($purchaseItem->purchase_status === 'Panding' || $purchaseItem->purchase_status === 'Receive')? 'badge-warning' : 'badge-success' }}">{{ $purchaseItem->purchase_status }}</div></td>
							<td>
								<div class="d-flex align-items-center list-action">
									<a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
										href="{{ route('purchase.show', $purchaseItem->id) }}"><i class="ri-eye-line mr-0"></i></a>
								@if($rolePermission->can('Purchase Edit'))
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('purchase.edit', $purchaseItem->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@endif
								@if($rolePermission->can('Purchase Delete'))
									<form action="{{ route('purchase.destroy', [$purchaseItem->id]) }}" method="POST">
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
						{{ $purchase->render("pagination::bootstrap-4") }}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
