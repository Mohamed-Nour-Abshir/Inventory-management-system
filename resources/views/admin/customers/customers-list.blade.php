@extends('admin.layouts.app')
@section('title')
    Nitmag | Customers List
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
						<h4 class="mb-3">Customer List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Customer Create'))
						<a href="{{ route('customer.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Customer</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone No.</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
					@php
						$i = 0;
					@endphp
					@foreach ($customer as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ $item->email }}</td>
							<td>{{ $item->contact }}</td>
							<td>{{ $item->address }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
								@if($rolePermission->can('Customer Edit'))
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('customer.show', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@endif
								@if($rolePermission->can('Customer Delete'))
									<form action="{{ route('customer.destroy', [$item->id]) }}" method="POST">
									@csrf
									@method('DELETE')
										<button type="submit" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
										<i class="ri-delete-bin-line mr-0"></i></button>
                                    </form>
								@endif
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
					{{-- {{ $customer->links() }} --}}

					{{-- @dump($customer->links()) --}}
				</table>
				</div>
			</div>
			<nav aria-label="Page navigation example">
				<div class="pagination justify-content-end">
					{{ $customer->render("pagination::bootstrap-4") }}
				</div>
			</nav>
		</div>
		<!-- Page end  -->
	</div>
</div>


@endsection
