@extends('admin.layouts.app')
@section('title')
    Nitmag | Expense Add
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Add Expense</h4>
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
						<form action="{{ route('expense.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Date *</label>
										<input type="date" class="form-control" name="date">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12" id="year">
									<label>Add Expense *</label>
									<div class="col-md-8">
										<table class="table" id="dynamicTable">
											<tr>
												<th>Name</th>
												<th>Price</th>
											</tr>
											<tr>
												<td><input type="text" name="name[]" placeholder="Enter Expense Name" class="form-control" /></td>
												<td><input type="number" name="price[]" placeholder="Enter Expense Price" class="form-control" /></td>
												<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
											</tr>
										</table>
									</div>
                        	</div>
							</div>
							<button type="submit" class="btn btn-primary mr-2">Add Expense</button>
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
var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append(`<tr>
				<td><input type="text" name="name[]" placeholder="Enter Expense Name" class="form-control" /></td>
				<td><input type="number" name="price[]" placeholder="Enter Expense Price" class="form-control" /></td>
				<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
			</tr>`);
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
</script>

@endpush
