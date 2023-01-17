@extends('admin.layouts.app')
@section('title')
    Inventory Management | Purchase Return Add
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Return Product</h4>
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
					<div class="card-body">
						<form action="{{ route('purchase-return.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Date</label>
										<input type="date" class="form-control" name="date">
										<div class="help-block with-errors"></div>
									</div>
								</div>    
								<div class="col-md-6">
									<div class="form-group">
										<label>Product Name</label>
										<select name="product" class="form-control selectpicker" data-live-search="true" data-style="py-0" id="productName">
											<option>Select Product</option>
											@foreach($product as $item)
												<option value="{{ $item->id }}">
													{{ $item->purchaseproduct->product_name }}
												</option>
											@endforeach
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Supplier Name</label>
										<input type="text" id="supplier_name" name="supplier_name" value="" class="form-control" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Quantity</label>
										<input type="number" id="qty" name="quantity" value="0" class="form-control" readonly>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group" id="warehouseDetails">
										<label>Storage Details</label>
									
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Damage Note</label>
										<textarea class="form-control" rows="4" placeholder="Damage Details" name="damage_note"></textarea>
									</div>
								</div>
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Add Return Product</button>
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

	// Use for Stock Details

			$(document).ready(function () {
             
                $('#productName').change(function(e) {

                var product_id = e.target.value;
                // var table = "";

                 $.ajax({
                       
                       url:"{{ route('purchase-productreturn') }}",
                       type:"POST",
                       data: {
                           product_id: product_id
                        },
                      
                       success:function (data) {
						// console.log(data);
						$('#supplier_name').val(data.product[0].supplier_name);
						$('#qty').val(data.product[0].quantity);
						
							$.map(data.product[0].warehousestockqty,function(index){
								console.log(index);
								$('#warehouseDetails').append(
								`<table class="table">
										<thead class="table-primary">
											<tr>
												<th>Warehouse Name</th>
												<th>Warehouse Quantity</th>
												<th>Damage Quantity</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><input type="text" name="warehouse_name[]" value="${index.warehouse_name}" class="form-control" readonly></td>
												<td><input type="text" name="warehouse_quantity[]" value="${index.warehouse_stockqty}" class="form-control" readonly></td>
												<td><input type="text" name="damage_quantity[]" class="form-control" value="0"></td>
												<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
											</tr>
										</tbody>`
								);
							})

                       }
                   })
                });
            });

				$(document).on('click', '.remove-tr', function(){  
                            $(this).parents('table').remove();
                });

           
</script>

@endpush