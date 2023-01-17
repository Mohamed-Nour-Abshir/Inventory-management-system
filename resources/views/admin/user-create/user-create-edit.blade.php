@extends('admin.layouts.app')
@section('title')
    Inventory Management | User Update
@endsection

@section('content')
@push('css')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Update User</h4>
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
						<form action="{{ route('user-create.update', $user->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							<div class="row"> 
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Name *</label>
										<input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $user->name }}">
										<div class="help-block with-errors"></div>
									</div>
								</div>    
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Email *</label>
										<input type="email" class="form-control" name="email" value="{{ $user->email }}">
										<div class="help-block with-errors"></div>
									</div>
								</div>    
								<div class="col-md-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" id="pwd1" class="form-control" placeholder="Enter Password" name="password">
										<div class="help-block with-errors"></div>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone Number *</label>
										<input type="number" class="form-control" placeholder="Enter Phone Number" name="contact" value="{{ $user->contact }}">
										<div class="help-block with-errors"></div>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Image</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="image">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
										{{-- <div class="help-block with-errors"></div> --}}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Assign Role For User</label>
											<select name="roles[]" class="form-control selectRole" data-style="py-0" multiple>
												<option>Select Role</option>
												@foreach($roles as $item)
													<option value="{{ $item->name }}" {{ $user->hasRole($item->name) ? 'selected' : '' }}>
														{{ $item->name }}
													</option>
												@endforeach
											</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" rows="4" placeholder="User Address" name="address">{{ $user->address }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Designation *</label>
										<input type="text" class="form-control" placeholder="Enter User Designation" name="designation" value="{{ $user->designation }}">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Update User</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Page end  -->
	</div>

@endsection

@push('script')
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.selectRole').select2();
			});
		</script>
@endpush