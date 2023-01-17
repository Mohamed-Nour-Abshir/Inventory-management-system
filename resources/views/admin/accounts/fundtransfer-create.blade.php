@extends('admin.layouts.app')
@section('title')
    Inventory Management | Fund Transfer
@endsection

@section('content')

<div class="content-page">
	<div class="container-fluid add-form-list">
		<div class="row">
			 <div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4">
						<div class="card card-block card-stretch card-height">
							<div class="card-body bg-light text-center rounded">
								<div class="d-flex align-items-center card-total-sale">
									<div class="icon iq-icon-box-2 bg-info-light">
										<img src="{{ asset('assets/images/product/sales.png') }}" class="img-fluid" alt="image">
									</div>
									<div class="d-block">
										<h4 class="mb-2">Total Sale Amount</h4>
										<h5>BDT. {{ $totalOrder }}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-block card-stretch card-height">
							<div class="card-body bg-light text-center rounded">
								<div class="d-flex align-items-center card-total-sale">
									<div class="icon iq-icon-box-2 bg-info-light">
										<img src="{{ asset('assets/images/product/money.png') }}" class="img-fluid" alt="image">
									</div>
									<div class="d-block">
										<h4 class="mb-2">Available Balance</h4>
										<h5>BDT. {{ $availableBalance }}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-block card-stretch card-height">
							<div class="card-body bg-light text-center rounded">
								<div class="d-flex align-items-center card-total-sale">
									<div class="icon iq-icon-box-2 bg-info-light">
										<img src="{{ asset('assets/images/product/cash-back.png') }}" class="img-fluid" alt="image">
									</div>
									<div class="d-block">
										<h4 class="mb-2">Total Transfer Amount</h4>
										<h5>BDT. {{ $totalfundtransfer }}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Fund Transfer</h4>
						</div>
						<div class="header-title">
							<a href="{{ route('fundtransfer.index') }}" class="btn btn-primary add-list">Check List</a>
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
						<form action="{{ route('fundtransfer.store') }}" method="POST">
							@csrf
							<div class="row"> 
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Date</label>
										<input type="date" class="form-control" name="date">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Accounts Number *</label>
											<select name="account_number" id="accountNumber" class="form-control selectpicker" data-live-search="true" data-style="py-0">
												<option value="">Select Account Number</option>
												@foreach($accounts as $item)
												<option value="{{ $item->id }}">
													{{ $item->account_number }}
												</option>
                                                @endforeach
											</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">                      
									<div class="form-group">
										<label>Accounts Name *</label>
										<input type="text" id="accountName" class="form-control" name="account_name" value="" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Accounts Holder Name *</label>
										<input type="text" id="accountHoldName" class="form-control" name="account_holder_name" value="" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Branch Name *</label>
										<input type="text" id="branchName" class="form-control" name="branch_name" value="" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Balance Transfer*</label>
										<input type="text" class="form-control" placeholder="Enter Account Balance" name="balance_transfer">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>                            
							<button type="submit" class="btn btn-primary mr-2">Transfer Send</button>
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
             
                $('#accountNumber').change(function(e) {

                var accountID = e.target.value;

                 $.ajax({
                       
                       url:"{{ route('account-info') }}",
                       type:"POST",
                       data: {
                           accountID: accountID
                        },
                      
                       success:function (data) {
							// console.log(data.account[0].account_name);
							$("#accountName").val(data.account[0].account_name);
							$("#accountHoldName").val(data.account[0].account_holder_name);
							$("#branchName").val(data.account[0].branch_name);

                       }
                   })
                });
            });


</script>

@endpush
