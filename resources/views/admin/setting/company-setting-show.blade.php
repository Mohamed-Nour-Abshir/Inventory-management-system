@extends('admin.layouts.app')
@section('title')
    Nitmag | Companay Settings Update
@endsection

@section('content')

        <div class="content-page">
            <div class="container-fluid add-form-list">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Setting Update</h4>
                                </div>
					            <a href="{{ route('company-setting.index') }}" class="btn btn-primary add-list">Back</a>
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
                                <form action="{{ route('company-setting.update', $companysetting->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Name *</label>
                                                <input type="text" class="form-control" value="{{ $companysetting->company_name }}" name="company_name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Email *</label>
                                                <input type="email" class="form-control" value="{{ $companysetting->company_email }}" name="company_email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Phone Number *</label>
                                                <input type="text" class="form-control" value="{{ $companysetting->company_contact }}" name="company_contact">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Logo *</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="company_logo">
                                                    <label class="custom-file-label" for="customFile">{{ $companysetting->company_logo }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Address</label>
                                                <textarea class="form-control" rows="4" name="company_address">{{ $companysetting->company_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Update Setting</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page end  -->
            </div>
        </div>

@endsection
