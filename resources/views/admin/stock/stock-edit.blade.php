@extends('admin.layouts.app')
@section('title')
    Inventory Management | Stock Update
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Manage Stock</h4>
						</div>
					</div>
					<div class="bodySelect card-body">
						<form action="{{ route('stock.update', $stockquantity->id) }}" method="POST">
							@csrf
                    		@method('PATCH')
							<div class="row"> 
								<div class="col-md-12">                      
									<div class="form-group">
										<label for="dob">Date *</label>
										<input type="date" class="form-control" id="dob" name="date" value="{{ $stockquantity->date }}"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Product Name</label>
										{{-- @dump($purchase->purchase) --}}
										<select name="purchaseproduct" class="cal form-control" data-style="py-0" id="purchaseProductId">
											<option>Select Product</option>
											@foreach($purchaseProduct as $item)
												<option value="{{ $item->id }}" {{$stockquantity->purchaseproduct_id === $item->id ? 'selected' : ''}}>
													{{ $item->product_name }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group" id="showQuantity">
										<label for="dob">Available Quantity *</label>
										<input type="text" name="available_quantity" value="{{ $stockquantity->available_quantity }}" class="form-control" readonly/>
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group">
										<label for="dob">In Stock *</label>
										<input type="text" id="inStockId" class="inStock form-control" value="{{ $totalQty }}" readonly/>
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group">
										<label for="dob">Remaining Quantity *</label>
										<input type="text" id="remaningStock" value="{{ $totalQuantity }}" class="form-control" readonly/>
									</div>
								</div>
								<div class="col-md-12" id="year">
									<label>Storage Details*</label>
									<div class="col-md-8">
										<table class="table" id="dynamicTable">  
											<tr>
												<th></th>
												<th>Storage Name</th>
												<th>Quantity</th>
											</tr>
										{{-- @dump($stockquantity->stockquantity); --}}
										@if($stockquantity->stockquantity)
											@foreach ($stockquantity->stockquantity as $data)
											<tr>
												<td><input type="hidden" name="qty_name[]" value="{{ $data->id }}"/></td>
												<td><input type="text" name="storage_name[]" value="{{ $data->storage_name }}" class="form-control" /></td> 
												<td><input type="number" name="quantity[]" value="{{ $data->quantity }}" class="form-control" /></td>
												@if($stockquantity->stockquantity->first()->id == $data->id)
												<td><button type="button" name="add" id="storageAdd" class="btn btn-success">Add More</button></td> 
												@endif
											</tr> 
											@endforeach
										@endif
										</table> 
									</div>
                        	    </div>
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Update Stock</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Page end  -->
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
             
                $('#purchaseProductId').change(function(e) {

                var purchaseproduct_id = e.target.value;

                 $.ajax({
                       
                       url:"{{ route('purchase-name') }}",
                       type:"POST",
                       data: {
                           purchaseproduct_id: purchaseproduct_id
                        },
                      
                       success:function (data) {
						// console.log(data)
                            $('#showQuantity').empty();

                           $('#showQuantity').append('<label for="dob">Available Quantity *</label>');

                            $.map(data.purchaseproduct,function(index,purchaseProductName){
                                // console.log(index);
                                $('#showQuantity').append(`<input type="text" id="availableQuantity" name="available_quantity" value="${index.quantity}" class="form-control" readonly/>`);
                            })
							let availableQuantity = $('#availableQuantity').val();
							// $('#remaningStock').val(availableQuantity);
                       }
                   })
                });
            });

		$("#storageAdd").click(function(){
	
			$("#dynamicTable").append(
				`<tr>
					<td><input type="text" name="storage_name[]" placeholder="Enter Storage Name" class="form-control" /></td>
					<td><input type="number" name="quantity[]" placeholder="Enter Quantity" class="form-control" /></td>
					<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
				</tr>
					`);
		});
	
		$(document).on('click', '.remove-tr', function(){  
			$(this).parents('tr').remove();
		});

		$(document).ready(function () {
             
                $('#purchaseProductId').change(function(e) {

                var stockquantity_id = e.target.value;

                 $.ajax({
                       
                       url:"{{ route('in-stock') }}",
                       type:"POST",
                       data: {
                           stockquantity_id: stockquantity_id
                        },
                      
                       success:function (data) {
                            $("#inStockId").val(data.totalQty);

                            $.map(data.purchaseproduct,function(index,purchaseproduct){
								// console.log(data.totalQty)
								// $('#remaningStock').val(index.available_quantity);
								$('#remaningStock').val(index.available_quantity - data.totalQty);
                            })
                       }
                   })
                });
            });


</script>

@endpush