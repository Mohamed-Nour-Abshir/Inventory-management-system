@extends('admin.layouts.app')
@section('title')
    Nitmag | Role Lists
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
						<h4 class="mb-3">Role List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Role Create'))
						<a href="{{ route('role-permission.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Role</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>Sl.</th>
							<th>Role Name</th>
							<th>Permission</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($role as $item)
							<tr>
								<td>
									{{ ++$i }}
								</td>
								<td>{{ $item->name }}</td>
								<td>
									@foreach ($item->permissions as $per)
										<span class="mt-2 badge border border-primary text-primary mt-2">
											{{ $per->name }}
										</span>
									@endforeach
								</td>
								<td>
									<div class="d-flex align-items-center list-action">
									@if($rolePermission->can('Role Edit'))
										<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
											href="{{ route('role-permission.edit', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
									@endif
									@if($rolePermission->can('Role Delete'))
										<form action="{{ route('role-permission.destroy', [$item->id]) }}" method="POST">
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
