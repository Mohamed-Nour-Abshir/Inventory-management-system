 @extends('admin.layouts.app')
@section('title')
    Inventory Management | Brand Update
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Update Brand</h4>
						</div>
					</div>
					<div class="card-body">
						<form action="{{ route('brand.update', $brand->id) }}" method="POST" data-toggle="validator">
							@csrf
							@method('PATCH')
							<div class="row">
								<div class="col-md-12">                      
									<div class="form-group">
										<label>Brand Name *</label>
										<input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>   
								<div class="col-md-12">
									<div class="form-group">
										<label>Brand summery</label>
										<textarea class="form-control" rows="4" name="summery">{{ $brand->summery }}</textarea>
									</div>
								</div>   
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Update Brand</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection