@extends('admin.layouts.app')
@section('title')
    Nitmag | Challan List
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
						<h4 class="mb-3">Challan List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Order Create'))
						<a href="{{ route('order.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>New Order</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Order ID</th>
							<th>Customer Name</th>
							<th>Total Amount</th>
							<th>Received Amount</th>
							<th>Due Amount</th>
							{{-- <th>Order Status</th> --}}
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($order as $data)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $data->order_id }}</td>
							<td>{{ $data->shipping->customer->name }}</td>
							<td>BDT. {{ $data->total_amount }}</td>
							<td>BDT. {{ $data->received_amount }}</td>
							<td><div class="badge badge-warning mr-2"><h5>BDT. {{ $data->due }}</h5></div></td>
							{{-- <td><div class="btn btn-danger mt-2"><h5>{{ $data->order_status }}</h5></div></td> --}}

							<td>
								<div class="d-flex align-items-center list-action">
									<a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Invoice"
										href="{{ route('challan.show', $data->id) }}"><i class="ri-eye-line mr-0"></i></a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
				<nav aria-label="Page navigation example">
					<div class="pagination justify-content-end">
						{{-- {{ $purchaseproduct->render("pagination::bootstrap-4") }} --}}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection

