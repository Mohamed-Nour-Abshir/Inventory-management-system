@extends('admin.layouts.app')
@section('title')
    Inventory Management | Account Add
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Add Account</h4>
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
						<form action="{{ route('accounts.store') }}" method="POST">
							@csrf
							<div class="row"> 
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Accounts Name *</label>
										<input type="text" class="form-control" placeholder="Enter Accounts Name" name="account_name">
										<div class="help-block with-errors"></div>
									</div>
								</div>    
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Accounts Number *</label>
										<input type="text" class="form-control" placeholder="Enter Accounts Number" name="account_number">
										<div class="help-block with-errors"></div>
									</div>
								</div>    
								<div class="col-md-6">
									<div class="form-group">
										<label>Accounts Holder Name *</label>
										<input type="text" class="form-control" placeholder="Enter Accounts Holder Name" name="account_holder_name">
										<div class="help-block with-errors"></div>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Branch Name *</label>
										<input type="text" class="form-control" placeholder="Enter Branch Name" name="branch_name">
										<div class="help-block with-errors"></div>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Account Balance *</label>
										<input type="text" class="form-control" placeholder="Enter Account Balance" name="account_balance">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Status *</label>
											<select name="account_status" class="form-control" data-style="py-0">
												<option>Select Status</option>
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
											</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Add Account</button>
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
