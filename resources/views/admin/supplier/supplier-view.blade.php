@extends('admin.layouts.app')
@section('title')
    Nitmag | Supplier View
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<div class="card car-transparent">
				<div class="card-body p-0">
					<div class="profile-image position-relative">
						<img src="{{ asset('assets/images/background/supplier.jpg') }}" class="img-fluid rounded w-100" alt="profile-image">
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="row m-sm-0 px-3">
			<div class="col-lg-8 card-profile">
				<div class="card card-block card-stretch card-height">
					<div class="card-body">
						<ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" data-toggle="pill" href="#profile1" role="tab" aria-selected="false">Supplier Personal Information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#profile2" role="tab" aria-selected="false">Supplier Products</a>
							</li>
						</ul>
						<div class="profile-content tab-content">

							<div id="profile1" class="tab-pane fade active show">
							<div class="d-flex align-items-center mb-3">
								<div class="ml-3">
									<h4 class="mb-1">{{ $supplier->name }}</h4>
									<span>{{ $supplier->designation }}</span>
								</div>
							</div>
							<p></p>
							<div class="row">

							<ul class="list-inline p-0 m-0">
								<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
									</svg>
									<p class="mb-0"><h6>Address: &nbsp;</h6> {{ $supplier->address }}</p>
								</div>
								</li>
								<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
									</svg>
									<p class="mb-0"><h6>Company Name: &nbsp;</h6> {{ $supplier->company_name }}</p>
								</div>
								</li>
								<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
									</svg>
									<p class="mb-0"><h6>Phone No: &nbsp;</h6> {{ $supplier->contact }}</p>
								</div>
								</li>
							</ul>
							</div>
							</div>
							<div id="profile2" class="tab-pane fade">
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-dark">
											<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Products ID</th>
												<th scope="col">Product Name</th>
												<th scope="col">Product Price</th>
											</tr>
											</thead>
											<tbody>
											@php
												$i = 0;
											@endphp
											@foreach($supplierProduct as $item)
												<tr>
													<th scope="row">{{ ++$i }}</th>
													<td>{{ $item->products_id }}</td>
													<td>{{ $item->product }}</td>
													<td>{{ $item->price }}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="profile3" class="tab-pane fade">
							<div class="profile-line m-0 d-flex align-items-center justify-content-between position-relative">
								<ul class="list-inline p-0 m-0 w-100">
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
											<h6 class="mb-2">October, 2018</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">PhD of Science in computer Science</h6>
													<p class="mb-0 font-size-14">South Kellergrove University</p>
												</div>
											</div>
										</div>
										</div>
									</li>
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
											<h6 class="mb-2">June, 2017</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Master of Science in Computer Science</h6>
													<p class="mb-0 font-size-14">Milchuer College</p>
												</div>
											</div>
										</div>
										</div>
									</li>
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
										<h6 class="mb-2">August, 2014</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Bachelor of Science in Computer Science</h6>
													<p class="mb-0 font-size-14">Beechtown Universityy</p>
												</div>
											</div>
										</div>
										</div>
									</li>
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
											<h6 class="mb-2">June, 2010</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media pb-0 align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Senior High School</h6>
													<p class="mb-0 font-size-14">South Kellergrove High</p>
												</div>
											</div>
										</div>
										</div>
									</li>
								</ul>
							</div>
							</div>
							<div id="profile4" class="tab-pane fade">
							<div class="profile-line m-0 d-flex align-items-center justify-content-between position-relative">
								<ul class="list-inline p-0 m-0 w-100">
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
											<h6 class="mb-2">2020 - present</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Software Engineer at Mathica Labs</h6>
													<p class="mb-0 font-size-14">Total : 02 + years of experience</p>
												</div>
											</div>
										</div>
										</div>
									</li>
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
											<h6 class="mb-2">2018 - 2019</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Junior Software Engineer at Zimcore Solutions</h6>
													<p class="mb-0 font-size-14">Total : 1.5 + years of experience</p>
												</div>
											</div>
										</div>
										</div>
									</li>
									<li>
										<div class="row align-items-top">
										<div class="col-md-3">
										<h6 class="mb-2">2017 - 2018</h6>
										</div>
										<div class="col-md-9">
											<div class="media profile-media align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Junior Software Engineer at Skycare Ptv. Ltd</h6>
													<p class="mb-0 font-size-14">Total : 0.5 + years of experience</p>
												</div>
											</div>
										</div>
										</div>
									</li>
									<li>
										<div class="row align-items-top">
										<div class="col-3">
											<h6 class="mb-2">06 Months</h6>
										</div>
										<div class="col-9">
											<div class="media profile-media pb-0 align-items-top">
												<div class="profile-dots border-primary mt-1"></div>
												<div class="ml-4">
													<h6 class=" mb-1">Junior Software Engineer at Infosys Solutions</h6>
													<p class="mb-0 font-size-14">Total : Freshers</p>
												</div>
											</div>
										</div>
										</div>
									</li>
								</ul>
							</div>
							</div>
							<div id="profile5" class="tab-pane fade">
							<p>I'm Web Developer from California. I code and design websites worldwide. Mauris variustellus vitae
								tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus
								erat ac nulla.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Iaculis mattis nam ipsum pharetra porttitor eu
								orci, nisi. Magnis elementum vitae eu, dui et. Tempus etiam feugiat sem augue sed sed. Tristique
								feugiat mi feugiat integer consectetur sit enim penatibus. Quis sagittis proin fermentum tempus
								uspendisse ultricies. Tellus sapien, convallis proin pretium.</p>
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Iaculis mattis nam ipsum pharetra porttitor eu.
								Tristique feugiat mi feugiat integer consectetur sit enim penatibus. Quis sagittis proin fermentum tempus
								uspendisse ultricies. Tellus sapien, convallis proin pretium.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

