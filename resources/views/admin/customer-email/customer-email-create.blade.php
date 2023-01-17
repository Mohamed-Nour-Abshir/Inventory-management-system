@extends('admin.layouts.app')
@section('title')
    Nitmag | Customers Email
@endsection

@section('content')

        <div class="content-page">
            <div class="container-fluid add-form-list">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Send Customer Email</h4>
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
                                <form id="customerForm" action="{{ route('customer-email.store') }}" method="POST">
									@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Customer Name *</label>
                                                <select name="customer" class="form-control selectpicker formText" data-live-search="true" data-style="py-0" id="customerID">
													<option>Select Customer</option>
													@foreach($customer as $item)
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
                                                <input type="email" id="emailId" class="form-control" value="" name="email" readonly>
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
                                                <input type="text" class="form-control formSub" placeholder="Enter Subject" name="subject">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control formMsg" rows="4" name="customer_message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2 sendEmail">Send Email</button>
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

                $('#customerID').change(function(e) {

                var customerId = e.target.value;

                 $.ajax({

                       url:"{{ route('customer-api') }}",
                       type:"POST",
                       data: {
                           customerId: customerId
                        },

                       success:function (data) {
							// console.log(data);
							$("#emailId").val(data.customer[0].email);
							$("#phone").val(data.customer[0].contact);

                       }
                   })
                });
            });

        // Validation
            let input = document.querySelector(".formText");
            let formSub = document.querySelector(".formSub");
            let formMsg = document.querySelector(".formMsg");

            let button = document.querySelector(".sendEmail");
            button.disabled = true;

            input.addEventListener("change", stateHandle);
            formSub.addEventListener("change", stateHandle);
            formMsg.addEventListener("change", stateHandle);

            function stateHandle() {
                if(document.querySelector(".formText").value === "") {
                    button.disabled = true;
                }else if(document.querySelector(".formSub").value === ""){
                    button.disabled = true;
                } else if(document.querySelector(".formMsg").value === ""){
                     button.disabled = true;
                } else {
                    button.disabled = false;
                }
            }


</script>

@endpush
