@extends('admin.layouts.app')
@section('title')
    Nitmag | Company Settings Information
@endsection

@push('css')
	<style>

			a.disabled {
			pointer-events: none;
			cursor: default;
			}

	</style>
@endpush

@section('content')
 @php
     $rolePermission = Auth::guard('web')->user();
 @endphp

 <div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
					<div>
						<h4 class="mb-3">Company Settings Information</h4>
						<p class="mb-0"></p>
					</div>
					@if($rolePermission->can('Company Settings Information'))
						@if ($companysetting)
							<a href="{{ route('company-setting.create') }}" class="btn btn-primary add-list disabled"><i class="las la-plus mr-3"></i>Add Company Settings</a>
						@else
							<a href="{{ route('company-setting.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Company Settings</a>
						@endif
					@endif
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive rounded mb-3">
				<table class="table mb-0 tbl-server-info">
					<thead class="bg-white text-uppercase">
						<tr class="ligth ligth-data">
							<th>SL.</th>
							<th>Company Logo</th>
							<th>Company Name</th>
							<th>Company Email</th>
							<th>Company Phone No.</th>
							<th>Company Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="ligth-body">
					@php
						$i = 0;
					@endphp
					@foreach ($companysetting as $item)
						<tr>
							<td>{{ ++$i }}</td>
							<td><img src="{{ asset('logo/nitmaglogo.png')}}" alt="" width="50px"></td>
							{{-- <td><img src="{{ asset('logo') . '/' . $item->company_logo }}" alt="" width="50px"></td> --}}
							<td>{{ $item->company_name }}</td>
							<td>{{ $item->company_contact }}</td>
							<td>{{ $item->company_email }}</td>
							<td>{{ $item->company_address }}</td>
							<td>
								<div class="d-flex align-items-center list-action">
									<a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
										href="{{ route('company-setting.show', $item->id) }}"><i class="ri-pencil-line mr-0"></i></a>
								@if($rolePermission->can('Company Settings Delete'))
									<form action="{{ route('company-setting.destroy', [$item->id]) }}" method="POST">
									@csrf
									@method('DELETE')
										<button type="submit" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
										<i class="ri-delete-bin-line mr-0"></i></button>
                                    </form>
								@endif
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				</div>
			</div>
			<nav aria-label="Page navigation example">
				<div class="pagination justify-content-end">
					{{-- {{ $companysetting->render("pagination::bootstrap-4") }} --}}
				</div>
			</nav>
		</div>
		<!-- Page end  -->
	</div>
</div>


@endsection
