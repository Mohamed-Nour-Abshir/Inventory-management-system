@extends('admin.layouts.app')
@section('title')
    Nitmag | Supplier Email
@endsection

@section('content')

        <div class="content-page">
            <div class="container-fluid add-form-list">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div class="header-title">
                                    <h4 class="mb-3 card-title">Supplier Email</h4>
                                    <p class="mb-0"></p>
                                </div>
                                <a href="{{ route('supplier-email.index') }}" class="btn btn-primary add-list">Back</a>
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
                                <form action="{{ route('supplier-email.store') }}" method="POST">
									@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Supplier Name *</label>
                                                <select name="supplier" class="form-control selectpicker" data-live-search="true" data-style="py-0" id="supplierID">
													<option>Select Supplier</option>
													@foreach($supplier as $item)
														<option value="{{ $item->id }}">
															{{ $item->name }}
														</option>
													@endforeach
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" id="supplieremail" class="form-control" value="" name="email" readonly>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input type="text" id="phone" class="form-control" value="" name="phone" readonly>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" placeholder="Enter Subject" name="subject">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" rows="4" name="supplier_message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Send Email</button>
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

	$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			$(document).ready(function () {

                $('#supplierID').change(function(e) {

                var supplierId = e.target.value;

                 $.ajax({

                       url:"{{ route('supplier-api') }}",
                       type:"POST",
                       data: {
                           supplierId: supplierId
                        },

                       success:function (data) {
							// console.log(data);
							$("#supplieremail").val(data.supplier[0].email);
							$("#phone").val(data.supplier[0].contact);

                       }
                   })
                });
            });


</script>

@endpush
