@extends('admin.layouts.base')
@section('title')
    Nitmag | Challan
@endsection

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<div class="content-page">
<div class="container-fluid">
    <div class="invoice-btn">
        <button type="button" class="btn btn-primary-dark btn-sm mr-2" onclick="window.print()"><i class="las la-print"></i>
            Print</button>
        </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
    			<div class="panel-heading text-center">
    				<div class="invoice-title">
                        <h2 class="text-right" style="text-decoration: underline;">Challan</h2>
                    </div>
    			</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                            <strong>Shipped To:</strong><br>
                            {{ $orderDetails->shipping->customer->address }}
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <h4><strong>{{ $orderDetails->shipping->customer->name }}</strong></h4>
                            <address>
                                {{ date('d-M-Y', strtotime($orderDetails->order_date)) }}
                                <br><br>
                            </address>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                            <strong>Bill To:</strong><br>
                                Nitmag<br>
                                {{ $companysetting->company_address }}
                            </address>
                        </div>

                    </div>
                </div>
            </div>

    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed table-bordered">
    						<thead>
                                <tr>
        							<th><strong>SL No.</strong></th>
        							<th class="text-center"><strong>HS Code</strong></th>
        							<th class="text-center"><strong>Itam description</strong></th>
        							<th class="text-right"><strong>Qty</strong></th>
        							<th class="text-right"><strong>Subtotal</strong></th>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($orderproduct as $data)
    							<tr>
    								<td>{{ ++$i }}</td>
                                    <td class="text-center">{{ $orderDetails->order_id }}</td>
    								<td class="text-center">{{ $data->product_name }}</td>
    								<td class="text-center">{{ $data->quantity }}</td>
    								<td class="text-right">{{ $data->total_price }}</td>
    							</tr>
                                @endforeach
    						</tbody>
    					</table>


                        <div class="row table table-bordered pb-5 mb-5">
                            <div class="col-xs-6">
                                <h6>Reciver signature and seal</h6>
                            </div>
                            <div class="col-xs-6">
                                <h6>For AYZO Bangladesh</h6>
                            </div>
                        </div>

    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</div>
