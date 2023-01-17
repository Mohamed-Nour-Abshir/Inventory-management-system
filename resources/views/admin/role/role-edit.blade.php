@extends('admin.layouts.app')
@section('title')
    Nitmag | Role Edit
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Edit Role</h4>
						</div>
					</div>
					 @if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="card-body">
						<form action="{{ route('role-permission.update', $role->id) }}" method="POST">
							@csrf
                    		@method('PATCH')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name *</label>
										<input type="text" name="name" class="form-control" value="{{ $role->name }}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="name"> <b>Permissions</b></label>

										<div class="custom-control custom-checkbox custom-checkbox-color-check">
											<input type="checkbox" class="custom-control-input bg-success" id="customCheckAll" value="1" {{ App\Models\User::roleHasPermissions($role, $permissionsAll) ? 'checked' : '' }}>
											<label class="custom-control-label" for="customCheckAll">All Permission</label>
										</div>
										<hr>

										@php $i = 1; @endphp
										@foreach ($permissionsGroup as $group)
											<div class="row">
												@php
													$permissions = App\Models\User::getpermissionByGroupName($group->group_name);
													$j = 1;
												@endphp
												<div class="col-3">
													<div class="custom-control custom-checkbox custom-checkbox-color-check">
														<input type="checkbox" class="custom-control-input bg-success" id="{{ $i }}customgroup" value="{{ $group->group_name }}" onclick="checkPermissionByGroup('role-{{ $i }}-checkbox-manage', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
														<label class="custom-control-label" for="{{ $i }}customgroup">{{ $group->group_name }}</label>
													</div>
												</div>
												<div class="col-9 role-{{ $i }}-checkbox-manage">
													@foreach($permissions as $permission)
													{{-- @dd($permission); --}}
														<div class="custom-control custom-checkbox custom-checkbox-color-check">
															<input type="checkbox" class="custom-control-input bg-primary" name="permissions[]" onclick="checkSinglePermission('role-{{ $i }}-checkbox-manage', '{{ $i }}customgroup', {{ count($permissions ) }})" id="customCheck-{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} value="{{ $permission->name }}">
															<label class="custom-control-label" for="customCheck-{{ $permission->id }}"> {{ $permission->name }}</label>
														</div>
														@php $j++; @endphp
													@endforeach
												</div>
											</div>
											<br>
											@php $i++; @endphp
										@endforeach
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary mr-2">Update Role</button>
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
	@include('admin.components.checkbox-script')
@endpush
