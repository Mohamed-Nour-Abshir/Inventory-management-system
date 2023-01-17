@extends('admin.layouts.app')
@section('title')
    Nitmag | Inventory Report
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
				<div class="col-lg-12">
					<form action="{{ route('purchaseReport') }}" method="post" class="d-flex flex-row bd-highlight mb-3">
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
							<button type="button" class="btn btn-primary-dark mr-2" onclick="window.print()"><i class="las la-print"></i>Print</button>
						</div>
						<div class="p-2 bd-highlight float-right ml-5">
							<a href="{{ route('purchaseExcelsheet') }}" class="btn btn-primary-dark mr-2"><i class="lar la-file-excel"></i>Excel</a>
						</div>
						<div class="p-2 bd-highlight float-right ml-5">
							<button type="button" class="btn btn-primary-dark mr-2"><i class="las la-file-csv"></i>CSV</button>
						</div>
					</form>
				</div>
			<div class="col-lg-12">
				<div class="text text-center">
					<div>
						<h4 class="mb-4"><u>Inventory Report</u></h4>
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
							{{-- <th>Product Code</th> --}}
							<th>Product Name</th>
							{{-- <th>Purchase Quantity</th> --}}
							<th>Product Cost</th>
							<th>Product Sales Price</th>
							<th>Sold Quantity</th>
							<th>Sub Total Amount</th>
							{{-- <th>Available Quantity</th> --}}
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($inventoryProduct as $item)
						{{-- @dump($item->product) --}}
						<tr>
							<td>{{ ++$i }}</td>
							{{-- <td>{{ $item->product_code }}</td> --}}
							<td>{{ $item->product_name }}</td>
							{{-- <td>{{ $item->quantity }}</td> --}}
							<td>BDT. {{ $item->purchase_price }}</td>
							<td>BDT. {{ $item->sell_price }}</td>
							<td>{{ $item->qty }}</td>
							<td>BDT. {{ $item->sell_price * $item->qty }}</td>
							{{-- <td>{{ $item->product->purchase_price }}</td> --}}
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
				<nav aria-label="Page navigation example">
					<div class="pagination justify-content-end">
						{{-- {{ $purchase->render("pagination::bootstrap-4") }} --}}
					</div>
				</nav>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection
