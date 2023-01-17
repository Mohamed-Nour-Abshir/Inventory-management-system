@extends('admin.layouts.app')
@section('title')
    Inventory Management | Supplier List
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
						<h4 class="mb-3">Suppliers List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Supplier Create'))
						<a href="{{ route('supplier.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Supplier</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Company Name</th>
							<th>Name</th>
							<th>Designation</th>
							<th>Phone No.</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
					@php
						$i = 0;
					@endphp
					@foreach ($supplier as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $item->company_name }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ $item->designation }}</td>
							<td>{{ $item->contact }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
									<a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
										href="{{ route('supplier.show', $item->id) }}"><i class="ri-eye-line mr-0"></i></a>
								@if($rolePermission->can('Supplier Edit'))
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('supplier.edit', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@endif
								@if($rolePermission->can('Supplier Delete'))
									<form action="{{ route('supplier.destroy', [$item->id]) }}" method="POST">
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
						{{ $supplier->render("pagination::bootstrap-4") }}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection