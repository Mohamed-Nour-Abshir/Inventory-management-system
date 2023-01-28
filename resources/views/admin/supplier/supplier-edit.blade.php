@extends('admin.layouts.app')
@section('title')
    Nitmag | Supplier Edit
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Add Supplier</h4>
						</div>
					</div>
					<div class="card-body">
						<form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
							@csrf
                    		@method('PATCH')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name *</label>
										<input type="text" class="form-control" value="{{ $supplier->name }}" name="name" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email *</label>
										<input type="email" class="form-control" value="{{ $supplier->email }}" name="email" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Company Name *</label>
										<input type="text" class="form-control" value="{{ $supplier->company_name }}" name="company_name" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone Number *</label>
										<input type="text" class="form-control" value="{{ $supplier->contact }}" name="contact" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Designation *</label>
										<input type="text" class="form-control" value="{{ $supplier->designation }}" name="designation" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Company Address</label>
										<textarea class="form-control" rows="4" name="address">{{ $supplier->address }}</textarea>
									</div>
								</div>
								<div class="col-md-12" id="year">
									<label>Product Name *</label>
									<div class="col-md-10">
										<table class="table" id="dynamicTable">
											<tr>
												<th></th>
												<th>Product ID</th>
												<th>Name</th>
												<th>Price</th>
											</tr>
											{{-- @dump($supplier->supplierproduct) --}}
											@if($supplier->supplierproduct)
												@foreach ($supplier->supplierproduct as $productprice)
												<tr>
													<td><input type="hidden" name="price_name[]" value="{{ $productprice->id }}"/></td>
													<td><input type="text" name="products_id[]" value="{{ $productprice->products_id }}" class="form-control" /></td>
													<td><input type="text" name="product[]" value="{{ $productprice->product }}" class="form-control" /></td>
													<td><input type="text" name="price[]" value="{{ $productprice->price }}" class="form-control" /></td>
													{{-- @dump($supplier->supplierproduct->last()) --}}
													@if($supplier->supplierproduct->first()->id == $productprice->id)
													<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
													@endif
													<td>
														{{-- <form action="{{ route('productdestroy', $productprice->id) }}" method="POST">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-danger">Remove</button>
														</form> --}}
													</td>
												</tr>
												@endforeach
											@endif
										</table>
									</div>
                        		</div>
							</div>
							<button type="submit" class="btn btn-primary mr-2">Update Supplier</button>
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
var i = 0;

    $("#add").click(function(){

        $("#dynamicTable").append(`
			<tr>
				<td></td>
				<td><input type="text" name="products_id[]" placeholder="Enter Product ID" class="form-control" /></td>
				<td><input type="text" name="product[]" placeholder="Enter Product Name" class="form-control" /></td>
				<td><input type="text" name="price[]" placeholder="Enter Product Price" class="form-control" /></td>
				<td><button type="submit" class="btn btn-danger remove-tr">Remove</button></td>
			</tr>`);

    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });


</script>

@endpush
