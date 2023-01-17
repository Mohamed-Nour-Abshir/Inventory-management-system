@extends('admin.layouts.app')
@section('title')
    Nitmag | Customers Add
@endsection

@section('content')

        <div class="content-page">
            <div class="container-fluid add-form-list">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Add Customer</h4>
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
                                <form id="customerForm" action="{{ route('customer.store') }}" method="POST">
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
                                                <input type="text" class="form-control" placeholder="Enter Email" name="email">
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" rows="4" name="address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Add Customer</button>
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
        				$(document).ready(function () {

						$('#customerForm').validate({
                            alert(123);
							rules: {
								name: {
									required: true,
                                    minlength: 4,
								},
								email: {
									required: true
								},
								contact: {
									required: true,
                                    minlength: 11,
								},
								address: {
									required: true
								}
							}
						});

				});
    </script>

@endpush
