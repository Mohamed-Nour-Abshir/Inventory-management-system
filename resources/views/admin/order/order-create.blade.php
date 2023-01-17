@extends('admin.layouts.app')
@section('title')
    Inventory Management | New Order
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
		<form id="orderForm" action="{{ route('order.store') }}" method="POST">
			@csrf
			<div class="row">
				<div class="col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="iq-todo-page">
								<div class="form-group mb-0">
									<div class="form-group">
										<label>Date</label>
										<input type="date" class="form-control formDate" name="order_date">
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
												<label>Customer Name</label>
												<select name="customer" class="form-control selectpicker formCustomer" data-live-search="true" data-style="py-0" id="customerID">
													<option>Select Customer</option>
													@foreach($customer as $item)
														<option value="{{ $item->id }}">
															{{ $item->name }}
														</option>
													@endforeach
												</select>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										 <div class="col-sm-4" id="customerdetails">
												
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-body p-0">
									<div class="col-md-12">
										<div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
										<h5>Product Details</h5>
						{{-- @foreach($product as $item)
							@dump($item)
						@endforeach --}}
										<div class="form-group p-2">
											<h6>Product</h6>
											<select name="product" class="form-control selectpicker formProduct" data-live-search="true" data-style="py-0" id="productID">
												<option>Select Product</option>
												@foreach($product as $item)
													<option value="{{ $item->id }}">
														{{ $item->product_name }}
													</option>
												@endforeach
											</select>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									</div>
								{{-- </div> --}}
									<div class="form-group">
										<div class="col-md-12" id="sellID">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<div class="iq-todo-right" id="amountcalculate">
										<div><h6>Previous Due Amount (BDT): <input type="number" id="previousdue" value="0" class="previousDue form-control mb-2" readonly/></h6></div>
										<div><h6>Subtotal Amount (BDT): <input type="number" id="subtotalSellamount" value="0" name="total_amount" class="totalSell form-control mb-2" readonly/></h6></div>
										<div><h6>Total Amount (BDT): <input type="number" id="totalSellamount" value="0" name="total_amount" class="totalSell form-control mb-2" readonly/></h6></div>
										<div class="d-flex justify-content-between">
											<h6>
												Discount (%): 
												<input type="number" id="discount" value="0" name="discount" class="form-control" />&nbsp;
											</h6>
											<h6>
												Discount (BDT):
												<input type="number" id="discountTk" value="0" name="discount_tk" class="form-control" />
											</h6>
										</div>
										<div class="d-flex justify-content-between">
											<h6>
												Vat (%): 
												<input type="number" id="vatprice" value="0" name="vat" class="form-control mb-2" />
											</h6>
											<h6>
												Vat (BDT): 
												<input type="number" id="vatpriceTk" value="0" name="vat_tk" class="form-control mb-2" />
											</h6>
										</div>
										<div class="mb-2">
											<h6>Payment Method</h6>
											<select name="paymentmethod" class="form-control formPayment" data-style="py-0" id="paymentID">
												<option>Select Payment Method</option>
												<option value="Cash">Cash</option>
												<option value="Card">Card</option>
											</select>
										</div>
										<div class="mb-2" id="cash" style="display: none;">
											<h6>Received Cash</h6>
											<input type="number" id="receivedAmount" value="0" name="received_amount" class="form-control mb-2" />
											<h6>Due Amount</h6>
											<input type="number" id="dueAmount" value="0" name="due" class="form-control" readonly/>
										</div>
										<div class="mb-2" id="card" style="display: none;">
											<h6>Card Details</h6>
											<input type="number" placeholder="Card Number" name="card_number" class="form-control mb-2" />
											<input type="number" placeholder="Amount" name="card_amount" class="form-control" />
										</div>
										<div>
											<h6>Order Status</h6>
											<select name="order_status" class="form-control formStatus" data-style="py-0" id="paymentID">
												<option>Select Order Status</option>
												<option value="Paid">Paid</option>
												<option value="Due">Due</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="from-group pb-4">
								<button type="submit" class="btn btn-outline-secondary mt-2 btn-lg invoice"><i class="ri-bill-fill"></i> Invoice</button>
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
             
                $('#customerID').change(function(e) {

                var customerID = e.target.value;
				// console.log(customerID);
                 $.ajax({
                       
                       url:"{{ route('customer-details') }}",
                       type:"POST",
                       data: {
                           customerID: customerID
                        },
                      
                       success:function (data) {
                                // console.log(data.previousDue[0].order[0].due);
						$('#customerdetails').empty();

                            $.map(data.customerdetails,function(index,customerdetails){
                              
							     $('#customerdetails').append(`
															<h6 class="block">Name:</h6><span>${index.name}</span>
															<h6 class="block">Phone:</h6><span>${index.contact}</span>
															<h6 class="block">Address:</h6><span>${index.address}</span>`);
                            })
								// console.log(data.previousDue.order[0].due);
								$('#previousdue').val(data.previousDue.order[0].due);

                       }
                   })
                });
            });

	// Use for previous due amount view

		

		$(document).ready(function () {
             
                $('#productID').on('change', function(e) {

                var orderpurchaseID = e.target.value;
                var stockID = e.target.value;
                var table ="";
				
                 $.ajax({
                       
                       url:"{{ route('order-purchaseproduct') }}",
                       type:"POST",
                       data: {
                           orderpurchaseID: orderpurchaseID,
                           stockID: stockID
                        },
                      
                       success:function (data) {
                                // console.log(data);

                            $.map(data.orderpurchaseproduct,function(index){
							
								const warehousestockqty = index.warehousestockqty;
								const orderQty = index.orderdetail;
								// console.log(index);

								$('#sellID').append(table+=
									`<table class="media-support-info p-6">
									<thead class="table-primary">
										<tr>
											<th></th>
											<th>Product</th>
											<th>Purchase Price</th>
											<th>Sell Price</th>
											<th>Storage Name</th>
											<th>Storage Quantity</th>
											<th>Quantity</th>
											<th>Total Price</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="hidden" value="${index.id}" name="productId[]" class="form-control" readonly/></td> 
											<td><input type="text" value="${index.purchaseproduct.product_name}" name="product_name[]" class="form-control" readonly/></td> 
											<td><input type="number" value="${index.purchase_price}" name="purchase_price[]" class="form-control" readonly/></td> 
											<td><input type="number" id="sellprice-${index.id}" value="${index.sell_price}" name="sell_price[]" class="form-control" readonly/></td> 
											<td>
												<select name="warehousestock[]" class="form-control" data-style="py-0" id="warehouseName-${index.id}">
													<option>Select Storage</option>
												</select>
											</td>
											<td><input type="number" id="warehouseQuantity-${index.id}" name="warehouse_quantity[]" value="" class="form-control" readonly/></td> 
											<td><input type="number" id="totalqty-${index.id}" name="quantity[]" placeholder="Quantity" class="form-control" /></td> 
											<td><input type="number" id="totalprice-${index.id}" name="total_price[]" class="total_amount form-control" readonly/></td>
											<td><button type="button" class="btn btn-danger remove-table">Remove</button></td> 
										</tr>
									</tbody>`);
								 table+=`</table>`
                                        $('#sellID')

								// Storage data Show

								$.map(warehousestockqty, function(stock){
									$(`#warehouseName-${index.id}`).append(`<option value="${stock.id}">${stock.warehouse_name} - ${stock.warehouse_stockqty}</option>`);
								});									
							
								// Use for Stock quantity calculation
								$(`#warehouseName-${index.id}`).on('change', function(e) {
								
									const showID = $(this).val();
									const warehousQty = warehousestockqty;
									// const sales = orderQty;

									

									var warehouseDetails = warehousQty.filter(warehouseName);
										
									var subQty = parseInt(warehouseDetails[0].warehouse_stockqty);

									const order = orderQty;
			
									var totalQty = 0;

									console.log(showID);
									console.log(order);

									// console.log(showID);
									$.each(order, function(index, value){
										console.log(value.warehousestockqty_id);
										if(value.warehousestockqty_id == showID){
										
										totalQty += parseInt(value.quantity);

										}
										
									})

									// const orderDetails = order.filter(orderDetail);
									// const orderqtys = parseInt(orderDetails[0].warehousestockqty_id);

									const subOrder = totalQty;

									$(`#warehouseQuantity-${index.id}`).val(subQty - subOrder);

									// console.log(orderqtys);

									// if(order[0].warehousestockqty_id == showID){

									// 	$(`#warehouseQuantity-${index.id}`).val(subQty - subOrder);
									// }else{
									// 	$(`#warehouseQuantity-${index.id}`).val(subQty);
									// }

									function warehouseName(warehouseID) {

										return warehouseID.id == showID;
									}

									function warehousefilter(warehouseId) {

											return warehouseId.id == showID;

									}

									function orderDetail(orderId) {

											return orderId.id == showID;

									}
								});
							     
                            })

                       }
                   })
                });
            });

			$(document).on('click', '.remove-table', function(){  
         		$(this).parents('table').remove();
    		});

		// Calculator for Order Page

		$("#sellID").change(function(){

			let productName = parseInt($('#productID').val());
			let sellprice = parseInt($(`#sellprice-${productName}`).val());
			let totalqty = parseInt($(`#totalqty-${productName}`).val());  
			let totalprice = parseInt((sellprice * totalqty));
			parseInt($(`#totalprice-${productName}`).val(totalprice));

			// Subtotal amount sum calculate
			var sum = 0;
			$(".total_amount").each(function() {
				sum += +$(this).val();
			});
			$("#subtotalSellamount").val(sum);

			// Total amount calculate
			let previoueDue = parseInt($('#previousdue').val());
			let subTotalamount = parseInt($("#subtotalSellamount").val());
			let totalamount = parseInt(previoueDue + subTotalamount);
			$("#totalSellamount").val(totalamount);
                
    	});

		// Discount Calculate in %

		$("#discount").change(function(){

			let subtotalSellamount = parseInt($("#subtotalSellamount").val());
 
			let discount = parseInt($('#discount').val());
			let totalDiscount = parseInt((subtotalSellamount * discount) / 100);
			let subAmount = (subtotalSellamount - totalDiscount);			

			$("#subtotalSellamount").val(subAmount);

			let totalSellamount = parseInt($("#subtotalSellamount").val());
			let previousdue = parseInt($("#previousdue").val());
			let totalAmountTk = parseInt(totalSellamount + previousdue);
			$('#totalSellamount').val(totalAmountTk);
                
    	});

		// Discount Calculate in BDT

		$("#discountTk").change(function(){

			let subtotalSellamount = parseInt($("#subtotalSellamount").val());
 
			let discountTk = parseInt($('#discountTk').val());
			let totalDiscountTK = parseInt(subtotalSellamount - discountTk);

			$("#subtotalSellamount").val(totalDiscountTK);

			let totalSellamount = parseInt($("#subtotalSellamount").val());
			let previousdue = parseInt($("#previousdue").val());
			let totalAmountTk = parseInt(totalSellamount + previousdue);
			$('#totalSellamount').val(totalAmountTk);
                
    	});

		// Vat Calculate in %

		$("#vatprice").change(function(){

			let subtotalSellamount = parseInt($("#subtotalSellamount").val());

			let vat = parseInt($("#vatprice").val());
			let totalVat = parseInt((subtotalSellamount * vat) / 100);
			let totalAmount = parseInt(subtotalSellamount+totalVat);

			$("#subtotalSellamount").val(totalAmount);

			
			let totalSellamount = parseInt($("#subtotalSellamount").val());
			let previousdue = parseInt($("#previousdue").val());
			let totalAmountTk = parseInt(totalSellamount + previousdue);
			$('#totalSellamount').val(totalAmountTk);
                
    	});

		// Vat Calculate in BDT

		$("#vatpriceTk").change(function(){

			let subtotalSellamount = parseInt($("#subtotalSellamount").val());

			let vatTk = parseInt($("#vatpriceTk").val());
			let totalVatTk = parseInt(subtotalSellamount + vatTk);

			$("#subtotalSellamount").val(totalVatTk);

			
			let totalSellamount = parseInt($("#subtotalSellamount").val());
			let previousdue = parseInt($("#previousdue").val());
			let totalAmountTk = parseInt(totalSellamount + previousdue);
			$('#totalSellamount').val(totalAmountTk);
                
    	});

		// end Calculator

		$("#paymentID").on('click', function() {
  
			var paymentID =  $(this).val();
			// alert(paymentID);
				if(paymentID === 'Cash'){

				$("#cash").show()
				$("#card").hide()
				
			}
			else if(paymentID === 'Card'){

				$("#card").show()
				$("#cash").hide()
			}
			else{
				$("#card").hide()
				$("#cash").hide()
			}

		});

		// Calculator for due amount

		$("#receivedAmount").change(function(){

			let totalSellamount = parseInt($("#totalSellamount").val());

			let recivedamount = parseInt($("#receivedAmount").val());
			let totalrecivedamount = parseInt(totalSellamount - recivedamount);
			parseInt($("#dueAmount").val(totalrecivedamount));
                
    	});


		// Validation
            let formDate = document.querySelector(".formDate");
            let formCustomer = document.querySelector(".formCustomer");
            let formProduct = document.querySelector(".formProduct");
            let formPayment = document.querySelector(".formPayment");
            let formStatus = document.querySelector(".formStatus");

            let button = document.querySelector(".invoice");
            button.disabled = true;

            formDate.addEventListener("change", stateHandle);
            formCustomer.addEventListener("change", stateHandle);
            formProduct.addEventListener("change", stateHandle);
            formPayment.addEventListener("change", stateHandle);
            formStatus.addEventListener("change", stateHandle);

            function stateHandle() {
                if(document.querySelector(".formDate").value === "") {
                    button.disabled = true;
                } else if(document.querySelector(".formCustomer").value === ""){
                    button.disabled = true;
                } else if(document.querySelector(".formProduct").value === ""){
                     button.disabled = true;
                } else if(document.querySelector(".formPayment").value === ""){
                     button.disabled = true;
                } else if(document.querySelector(".formStatus").value === ""){
                     button.disabled = true;
                } else {
                    button.disabled = false;
                }
            }

	

</script>

@endpush