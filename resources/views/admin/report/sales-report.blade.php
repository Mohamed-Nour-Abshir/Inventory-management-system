@extends('admin.layouts.app')
@section('title')
    Inventory Management | Sales Report
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
				<div class="col-lg-12">
					<form action="{{ route('salesReport') }}" method="post" class="d-flex flex-row bd-highlight mb-3">
						@csrf
						<div class="p-2 bd-highlight">
							<input type="date" name="from" class="form-control" value="{{ date('Y-m-d') }}">
						</div>
						<div class="p-2 bd-highlight">
							<input type="date" name="to" class="form-control" value="{{ date('Y-m-d') }}">
						</div>
						<div class="p-2 bd-highlight">
							<button type="submit" class="btn btn-primary add-list"><i class="las la-search"></i>Search</button>
						</div>
						<div class="p-2 bd-highlight float-right ml-5">
							<button type="button" class="btn btn-primary-dark mr-2" onclick="window.print()"><i class="las la-print"></i>PRINT</button>
						</div>
						<div class="p-2 bd-highlight float-right ml-5">
							<a href="{{ route('salesexcelsheet') }}" class="btn btn-primary-dark mr-2"><i class="lar la-file-excel"></i>Excel</a>
						</div>
					</form>
				</div>
			<div class="col-lg-12">
				<div class="text text-center">
					<div>
						<h4 class="mb-4"><u>Sales Report</u></h4>
						<p class="mb-0"></p>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Order Date</th>
							<th>Invoice ID</th>
							<th>Customer Name</th>
							<th>Quantity</th>
							<th>Purchase Price</th>
							<th>Sale Price</th>
							<th>Total Price</th>
							<th>Profit</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($salesReport as $data)
						{{-- @dump($data->order) --}}
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $data->order->order_date }}</td>
							<td>{{ $data->order->invoice }}</td>
							<td>{{ $data->order->shipping->customer->name }}</td>
							<td>{{ $data->quantity }}</td>
							<td>BDT. {{ $data->purchase_price }}</td>
							<td>BDT. {{ $data->sell_price }}</td>
							<td>BDT. {{ $data->total_price }}</td>
							<td>BDT. {{ $data->total_price - ($data->purchase_price * $data->quantity) }}</td>
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