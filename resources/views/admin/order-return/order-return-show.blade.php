@extends('admin.layouts.app')
@section('title')
    Nitmag | Sales Return Show
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		@if ($errors->any())
			<div class="alert alert-danger d-inline">
				<strong>Whoops!</strong> There were some problems with your input.
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
			<div class="row">
				<div class="col-lg-12">
					<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
						<div>
							<h4 class="mb-3">Order Return Create</h4>
							<p class="mb-0"></p>
						</div>
						<a href="{{ route('sales-return.index') }}" class="btn btn-primary add-list">Back</a>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="iq-todo-page">
								<div class="form-group mb-0">
									<div class="form-group">
										<label>Date</label>
										<input type="date" class="form-control" name="date" value="{{ $sellreturn->date }}" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="todo-date d-flex mr-8 col-sm-6">
											<div class="form-group">
												<label>Order ID</label>
												<select name="orderdetails" class="form-control selectpicker" data-live-search="true" data-style="py-0" disabled="disabled">
													<option>Select Order ID</option>
													@foreach($order as $item)
														<option value="{{ $item->id }}" {{$sellreturn->order_id == $item->id ? 'selected' : ''}}>
															{{ $item->order_id }}
														</option>
													@endforeach
												</select>
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" id="saleproductID">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<div class="header-title">
								<h4 class="card-title">Sales Return Product</h4>
							</div>
						</div>
						<div class="card-body" id="customerdetails">

							<table class="table">
								<thead>
								<tr class="bg-info">
									<th scope="col">Invoice No</th>
									<th scope="col">Customer Name</th>
									<th scope="col">Order Date</th>
									<th scope="col">Order Status</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<th scope="row">{{ $sellreturn->order->invoice }}</th>
									<td>{{ $sellreturn->order->shipping->customer->name }}</td>
									<td>{{ $sellreturn->order->order_date }}</td>
									<td>{{ $sellreturn->order->order_status }}</td>
								</tr>
								</tbody>
							</table>

						</div>
						<div class="card-body" id="productdetails">
							<table class="col-lg-12 mb-2" id="returnTable">
								<thead class="mb-2">
									<tr class="bg-warning">
										<th>Product Name</th>
										<th>Sell Price</th>
										<th>Quantity</th>
										<th>Return Quantity</th>
										<th>Replace Product</th>
										<th>Return Amount</th>
										<th>Total Amount</th>
									</tr>
								</thead>
								<tbody class="m-4">
									@if($sellreturn->sellreturnproduct)
										@foreach($sellreturn->sellreturnproduct as $data)
											<tr>
												<td><input type="text" value="{{ $data->product_name }}" name="product_name[]" class="form-control" readonly/></td>
												<td><input type="text" value="{{ $data->sell_price }}" id="sellprice-${index.id}" name="sell_price[]" class="form-control" readonly/></td>
												<td><input type="text" value="{{ $data->quantity }}" name="quantity[]" class="form-control" readonly/></td>
												<td><input type="text" value="{{ $data->return_quantity }}" id="returnQty-${index.id}" name="return_quantity[]" class="form-control" readonly/></td>
												<td><input type="text" value="{{ $data->replace_product }}" name="replace_product[]" class="form-control" readonly/></td>
												<td><input type="text" value="{{ $data->return_amount }}" id="returnAmount-${index.id}" name="return_amount[]" class="form-control returnTotalAmount" readonly/></td>
												<td><input type="text" value="{{ $data->subtotal_amount }}" name="subtotal_amount[]" class="form-control" readonly/></td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-body p-4">
									<div class="form-group">
										<label>Return Product Note</label>
										<textarea class="form-control" rows="4" placeholder="Damage Note" name="damage_note" readonly>{{ $sellreturn->damage_note }}</textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<div class="iq-todo-right" id="">
										<div><h6>Total Amount  (BDT): <input type="number" id="totalamount" name="total_amount" value="{{ $sellreturn->total_amount }}" class="totalSell form-control mb-2" readonly/></h6></div>
										<div><h6>Received Amount  (BDT): <input type="number" id="receivedprice" value="{{ $sellreturn->received_amount }}" name="received_amount" class="form-control mb-2" readonly/></h6></div>
										<div><h6>Due Amount (BDT): <input type="number" id="dueprice" value="{{ $sellreturn->due_amount }}" name="due_amount" class="form-control mb-2" readonly/></h6></div>
										<div><h6>Total Return Amount  (BDT): <input type="number" id="returnprice" value="{{ $sellreturn->total_return_amount }}" name="total_return_amount" class="form-control mb-2" readonly/></h6></div>
										<div><h6>Return Current Amount  (BDT): <input type="number" id="currentbalance" value="{{ $sellreturn->current_return_amount }}" name="current_return_amount" class="form-control mb-2" readonly/></h6></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@endsection
