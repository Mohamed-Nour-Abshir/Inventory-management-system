@extends('admin.layouts.app')
@section('title')
    Nitmag | Companay Settings Edit
@endsection

@section('content')

        <div class="content-page">
            <div class="container-fluid add-form-list">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Setting Edit</h4>
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
                                <form action="{{ route('company-setting.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Name *</label>
                                                <input type="text" class="form-control" placeholder="Enter Name" name="company_name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Email *</label>
                                                <input type="text" class="form-control" placeholder="Enter Email" name="company_email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Phone Number *</label>
                                                <input type="text" class="form-control" placeholder="Enter Phone Number" name="company_contact">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Logo *</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="company_logo">
                                                    <label class="custom-file-label" for="customFile">Choose Logo</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Address</label>
                                                <textarea class="form-control" rows="4" name="company_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Add Setting</button>
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
