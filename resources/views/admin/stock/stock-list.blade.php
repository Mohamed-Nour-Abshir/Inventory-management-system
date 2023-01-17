@extends('admin.layouts.app')
@section('title')
    Nitmag | Stock List
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
					<div>
						<h4 class="mb-3">Stock List</h4>
						<p class="mb-0"></p>
					</div>
					<a href="{{ route('stock.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Stock</a>
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
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach ($stock as $item)
							<tr>
								<td>{{ ++$i }}</td>
								<td>{{ $item->date }}</td>
								<td>{{ $item->purchaseproduct->product_name }}</td>
								<td>
									<div class="d-flex align-items-center list-action">
										<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
												href="{{ route('stock.show', $item->id) }}"><i class="ri-eye-line mr-0"></i></a>
										<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
												href="{{ route('stock.edit', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
										<form action="{{ route('stock.destroy', [$item->id]) }}" method="POST">
											@csrf
											@method('DELETE')
												<button type="submit" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" >
													<i class="ri-delete-bin-line mr-0"></i>
												</button>
										</form>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>
				<nav aria-label="Page navigation example">
				<div class="pagination justify-content-end">
					{{ $stock->render("pagination::bootstrap-4") }}
				</div>
			</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
