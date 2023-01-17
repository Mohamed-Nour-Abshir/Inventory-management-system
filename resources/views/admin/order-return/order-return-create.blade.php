@extends('admin.layouts.app')
@section('title')
    Nitmag | Sales Return Add
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
		<form action="{{ route('sales-return.store') }}" method="POST">
			@csrf
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
										<input type="date" class="form-control" name="date">
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
												<select name="orderdetails" class="form-control selectpicker" data-live-search="true" data-style="py-0" id="orderID">
													<option>Select Order ID</option>
													@foreach($order as $item)
														<option value="{{ $item->id }}">
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

						</div>
						<div class="card-body" id="productdetails">

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
										<textarea class="form-control" rows="4" placeholder="Damage Note" name="damage_note"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<div class="iq-todo-right" id="">
										<div><h6>Total Amount  (BDT): <input type="number" id="totalamount" name="total_amount" value="0" class="totalSell form-control mb-2" readonly/></h6></div>
										<div><h6>Received Amount  (BDT): <input type="number" id="receivedprice" value="0" name="received_amount" class="form-control mb-2" readonly/></h6></div>
										<div><h6>Due Amount (BDT): <input type="number" id="dueprice" value="0" name="due_amount" class="form-control mb-2" readonly/></h6></div>
										<div><h6>Total Return Amount  (BDT): <input type="number" id="returnprice" value="0" name="total_return_amount" class="form-control mb-2" /></h6></div>
										<div><h6>Return Current Amount  (BDT): <input type="number" id="currentbalance" value="0" name="current_return_amount" class="form-control mb-2" /></h6></div>
									</div>
								</div>
							</div>
							<div class="from-group pb-4">
								<button type="submit" class="btn btn-outline-secondary mt-2 btn-lg"><i class="ri-registered-fill"></i> Return</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@push('script')

<script>

	$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			$(document).ready(function () {

                $('#orderID').change(function(e) {

                var orderID = e.target.value;

				// console.log(orderID)

                 $.ajax({

                       url:"{{ route('order-return') }}",
                       type:"POST",
                       data: {
                           orderID: orderID
                        },

                       success:function (data) {

						console.log(data);

						$("#totalamount").val(data.salesreturn[0].order.total_amount);
						$("#dueprice").val(data.salesreturn[0].order.due);
						$("#receivedprice").val(data.salesreturn[0].order.received_amount);

						$("#customerdetails").empty();
						$("#productdetails").empty();

						$('#customerdetails').append(`
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
									<th scope="row">${data.salesreturn[0].order.invoice}</th>
									<td>${data.salesreturn[0].order.shipping.customer.name}</td>
									<td>${data.salesreturn[0].order.order_date}</td>
									<td>${data.salesreturn[0].order.order_status}</td>
								</tr>
								</tbody>
							</table>
						`);

							// const stockID = (data.salesreturn[0].id);

                            $.map(data.salesreturn,function(index,salesreturn){
							const stockQty = (index.id);

							     $('#productdetails').append(`
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
												<th></th>
											</tr>
										</thead>
										<tbody class="m-4">
											<tr>
												<td><input type="text" value="${index.product_name}" name="product_name[]" class="form-control" readonly/></td>
												<td><input type="text" id="sellprice-${index.id}" value="${index.sell_price}" name="sell_price[]" class="form-control" readonly/></td>
												<td><input type="text" value="${index.quantity}" name="quantity[]" class="form-control" readonly/></td>
												<td><input type="text" id="returnQty-${index.id}" value="" name="return_quantity[]" class="form-control" /></td>
												<td><input type="text" value="0" name="replace_product[]" class="form-control" /></td>
												<td><input type="text" id="returnAmount-${index.id}" value="0" name="return_amount[]" class="form-control returnTotalAmount" /></td>
												<td><input type="text" value="${index.total_price}" name="subtotal_amount[]" class="form-control" readonly/></td>
												<td><button type="button" class="btn btn-danger remove-table">Remove</button></td>
											</tr>
										</tbody>
									</table>
								`);

									// Calculation for Return Amount

									$(`#returnQty-${stockQty}`).change(function(){

										var returnQty = parseInt($(this).val());
										var sellprice = parseInt($(`#sellprice-${stockQty}`).val());
										var totalQty = returnQty * sellprice;
										var dueAmount = parseInt($('#dueprice').val());

										parseInt($(`#returnAmount-${stockQty}`).val(totalQty));

										var sum = 0;
										$(".returnTotalAmount").each(function() {
											sum += +$(this).val();
										});
										$("#returnprice").val(sum);
										$("#currentbalance").val(sum - dueAmount);
										// console.log(totalQty);

									});

                        		})

							$(document).on('click', '.remove-table', function(){
								$(this).parents('table').remove();
							});

                       }
                   })
                });
            });




</script>

@endpush
