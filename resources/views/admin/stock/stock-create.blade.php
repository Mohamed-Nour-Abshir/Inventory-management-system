@extends('admin.layouts.app')
@section('title')
    Inventory Management | Stock Add
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
					<div class="bodySelect card-body">
						<form action="{{ route('stock.store') }}" method="POST">
							@csrf
							<div class="row"> 
								<div class="col-md-6">                      
									<div class="form-group">
										<label for="dob">Date *</label>
										<input type="date" class="form-control" id="dob" name="date" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Product Name</label>
										<select name="purchaseproduct" class="cal form-control" data-style="py-0" id="purchaseProductId">
											<option>Select Product</option>
											@foreach($purchase as $item)
												<option value="{{ $item->id }}">
													{{ $item->product_name }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group">
										<label for="dob">Available Quantity *</label>
										<input type="text" id="showQuantity" name="available_quantity" class="inStock form-control" value="" readonly/>
									</div>
								</div>
								<div class="col-md-12" id="year">
									<label>Storage Details*</label>
									<div class="col-md-8">
										<table class="table" id="dynamicTable">  
											<tr>
												<th>Storage Name</th>
												<th>Quantity</th>
											</tr>
											<tr>
												<td><input type="text" name="storage_name[]" placeholder="Enter Storage Name" class="form-control" /></td> 
												<td><input type="number" name="quantity[]" placeholder="Enter quantity" class="form-control" /></td> 
												<td><button type="button" name="add" id="storageAdd" class="btn btn-success">Add More</button></td>  
											</tr>  
										</table> 
									</div>
                        	    </div>
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Add Stock</button>
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

													// $('#showQuantity').val(data.totalQty);
													$('#showQuantity').val(data.purchaseproduct[0].quantity);
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


</script>

@endpush