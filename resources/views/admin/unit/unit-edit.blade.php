 @extends('admin.layouts.app')
@section('title')
    Inventory Management | Unit Update
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Update Unit</h4>
						</div>
					</div>
					<div class="card-body">
						<form action="{{ route('unit.update', $unit->id) }}" method="POST" data-toggle="validator">
							@csrf
							@method('PATCH')
							<div class="row">
								<div class="col-md-12">                      
									<div class="form-group">
										<label>Unit Name *</label>
										<input type="text" name="name" class="form-control" value="{{ $unit->name }}" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>                                
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Update Unit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Page end  -->
	</div>
</div>

@endsection