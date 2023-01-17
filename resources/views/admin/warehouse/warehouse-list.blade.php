@extends('admin.layouts.app')
@section('title')
    Inventory Management | Warehouse List
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
						<h4 class="mb-3">Warehouse List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Warehouse Create'))
						<a href="{{ route('warehouse.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Warehouse</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>Sl.</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($warehouse as $item)
							<tr>
								<td>
									{{ ++$i }}
								</td>
								<td>{{ $item->warehouse_name }}</td>
								<td>
									<div class="d-flex align-items-center list-action">
										<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
											href="{{ route('warehouse.show', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
									@if($rolePermission->can('Warehouse Delete'))
										<form action="{{ route('warehouse.destroy', [$item->id]) }}" method="POST">
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
				</table>
			</div>
		</div>
	</div>
		<!-- Page end  -->
	</div>
</div>


@endsection
