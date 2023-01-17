@extends('admin.layouts.app')
@section('title')
    Nitmag | User Create List
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
						<h4 class="mb-3">User Create List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('User Create'))
						<a href="{{ route('user-create.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add User</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>User Name</th>
							<th>User Role</th>
							<th>Designation</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
					@php
						$i = 0;
					@endphp
					@foreach ($user as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $item->name }}</td>
							<td>
								@foreach ($item->roles as $role)
									<span class="mt-2 badge badge-dark">
										{{ $role->name }}
									</span>
								@endforeach
							</td>
							<td>{{ $item->designation }}</td>
							<td>{{ $item->email }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
									{{-- <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
										href="{{ route('supplier.show', $item->id) }}"><i class="ri-eye-line mr-0"></i></a> --}}
									@if($rolePermission->can('User Edit'))
										<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
											href="{{ route('user-create.edit', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
									@endif
									@if($rolePermission->can('User Delete'))
										<form action="{{ route('user-create.destroy', [$item->id]) }}" method="POST">
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
						{{ $user->render("pagination::bootstrap-4") }}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
