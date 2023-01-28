@extends('admin.layouts.app')
@section('title')
    Nitmag | Supplier Add
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
						<form action="{{ route('supplier.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name *</label>
										<input type="text" class="form-control" placeholder="Enter Name" name="name">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email *</label>
										<input type="email" class="form-control" placeholder="Enter Email" name="email">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Company Name *</label>
										<input type="text" class="form-control" placeholder="Enter Company Name" name="company_name">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone Number *</label>
										<input type="text" class="form-control" placeholder="Enter Phone Number" name="contact">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Designation *</label>
										<input type="text" class="form-control" placeholder="Enter Supplier Designation" name="designation">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Company Address</label>
										<textarea class="form-control" rows="4" placeholder="Company Address" name="address"></textarea>
									</div>
								</div>
								<div class="col-md-12" id="year">
									<label>Product Name *</label>
									<div class="col-md-10">
										<table class="table" id="dynamicTable">
											<tr>
												<th>Product ID</th>
												<th>Name</th>
												<th>Price</th>
											</tr>
											<tr>
												<td><input type="number" name="products_id[]" placeholder="Enter Product ID" class="form-control" /></td>
												<td><input type="text" name="product[]" placeholder="Enter Product Name" class="form-control" /></td>
												<td><input type="text" name="price[]" placeholder="Enter Product Price" class="form-control" /></td>
												<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
											</tr>
										</table>
									</div>
                        	    </div>
							</div>
							<button type="submit" class="btn btn-primary mr-2">Add Supplier</button>
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

    $("#add").click(function(){

        $("#dynamicTable").append(
			`<tr>
				<td><input type="number" name="products_id[]" placeholder="Enter Product ID" class="form-control" /></td>
				<td><input type="text" name="product[]" placeholder="Enter Product Name" class="form-control" /></td>
				<td><input type="text" name="price[]" placeholder="Enter Product Price" class="form-control" /></td>
				<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
			</tr>
				`);
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });


</script>

@endpush
