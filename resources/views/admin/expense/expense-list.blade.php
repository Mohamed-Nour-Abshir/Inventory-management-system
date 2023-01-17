@extends('admin.layouts.app')
@section('title')
    Nitmag | Expense List
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
						<h4 class="mb-3">Expense List</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Expense Create'))
						<a href="{{ route('expense.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Expense</a>
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
							<th>Price</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
					@php
						$i = 0;
					@endphp
					@foreach ($expense as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ $item->price }}</td>
							<td>{{ $item->date }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
								@if($rolePermission->can('Expense Delete'))
									<form action="{{ route('expense.destroy', [$item->id]) }}" method="POST">
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
					{{ $expense->render("pagination::bootstrap-4") }}
				</div>
			</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
