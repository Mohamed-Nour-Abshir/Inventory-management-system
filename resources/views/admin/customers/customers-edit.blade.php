@extends('admin.layouts.app')
@section('title')
    Nitmag | Customers Edit
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
                            <div class="card-body">
                                <form action="{{ route('customer.update', $customer->id) }}" method="POST">
									@csrf
									@method('PATCH')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name *</label>
                                                <input type="text" class="form-control" value="{{ $customer->name }}" name="name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="text" class="form-control" value="{{ $customer->email }}" name="email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input type="text" class="form-control" value="{{ $customer->contact }}" name="contact">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" rows="4" name="address">{{ $customer->address }}</textarea>
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
