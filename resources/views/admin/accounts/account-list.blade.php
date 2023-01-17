@extends('admin.layouts.app')
@section('title')
    Nitmag | Account List
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
						<h4 class="mb-3">Account List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Account Create'))
						<a href="{{ route('accounts.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Account</a>
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Account Name</th>
							<th>Account Number</th>
							<th>Account Holder Name</th>
							<th>Branch Name</th>
							<th>Account Balance</th>
							<th>Account Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body text-center">
					@php
						$i = 0;
					@endphp
					@foreach ($account as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $item->account_name }}</td>
							<td>{{ $item->account_number }}</td>
							<td>{{ $item->account_holder_name }}</td>
							<td>{{ $item->branch_name }}</td>
							<td>{{ $item->account_balance }}</td>
							<td><span class="{{ ($item->account_status == 'Active')? 'mt-2 badge border border-secondary text-secondary mt-2': 'mt-2 badge border border-info text-info mt-2' }}">{{ $item->account_status }}</span></td>
							<td>
								<div class="d-flex align-items-center list-action">
								@if($rolePermission->can('Account Edit'))
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('accounts.edit', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@endif
								@if($rolePermission->can('Account Delete'))
									<form action="{{ route('accounts.destroy', [$item->id]) }}" method="POST">
										@csrf
										@method('DELETE')
											<button type="submit" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
						{{ $account->render("pagination::bootstrap-4") }}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
