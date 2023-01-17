@extends('admin.layouts.app')
@section('title')
    Inventory Management | Unit Add
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Add Unit</h4>
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
						<form action="{{ route('unit.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-12">                      
									<div class="form-group">
										<label>Unit Name *</label>
										<input type="text" name="name" class="form-control" placeholder="Enter Unit Name">
										<div class="help-block with-errors"></div>
									</div>
								</div>                                
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Add Unit</button>
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