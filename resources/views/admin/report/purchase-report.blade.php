@extends('admin.layouts.app')
@section('title')
    Nitmag | Purchase Report
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
					<div class="">
						<h4 class="mb-4"><u>Purchase List</u></h4>
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
							<th>Date</th>
							<th>Order No</th>
							<th>Supplier</th>
							<th>Total Payment</th>
							<th>Due</th>
							<th>Payment Status</th>
							<th>Purchase Status</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
						@php
							$i = 0;
						@endphp
						@foreach($purchaseReport as $purchaseItem)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $purchaseItem->date }}</td>
							<td>{{ $purchaseItem->orderID }}</td>
							<td>{{ $purchaseItem['supplier']->name }}</td>
							<td>{{ $purchaseItem->total_payment }}</td>
							<td>{{ $purchaseItem->due }}</div></td>
							<td><div class="badge {{ ($purchaseItem->payment_status === 'Due' || $purchaseItem->payment_status === 'Paid')? 'badge-warning' : 'badge-success' }}">{{ $purchaseItem->payment_status }}</div></td>
							<td><div class="badge {{ ($purchaseItem->purchase_status === 'Panding' || $purchaseItem->purchase_status === 'Receive')? 'badge-warning' : 'badge-success' }}">{{ $purchaseItem->purchase_status }}</div></td>
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
