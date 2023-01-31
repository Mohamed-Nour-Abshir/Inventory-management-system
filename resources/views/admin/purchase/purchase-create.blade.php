@extends('admin.layouts.app')
@section('title')
    Nitmag | Purchase Add
@endsection

@push('css')
<style>
.table td{
padding: 15px 5px !important;
}
</style>
@endpush

@section('content')

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Purchase</h4>
                        </div>
                    <a href="{{ route('purchase.index') }}" class="btn btn-primary add-list">Back</a>
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
                        <form action="{{ route('purchase.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="dob">Date *</label>
                                        <input type="date" class="form-control" id="dob" name="date" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select name="supplier" class="form-control" data-style="py-0" id="productId">
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
                                        <label>Product Name</label>
                                        <select class="form-control" data-style="py-0" id="productName">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="showOne">

                                    </div>
                                </div>
                            </div>
                                <div class="row mt-8 mb-10">
                                    <div class="purchaseAmount offset-lg-7 col-lg-5">
                                        <div class="or-detail rounded">
                                                <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                    <h6>Subtotal Purchase Amount (BDT)</h6>
                                                    <h3 class="text-primary font-weight-700">
                                                        <input type="text" id="subtotalPurchaseAmount" value="0" class="form-control" name="subtotal_payment" readonly/>
                                                    </h3>
                                                </div>
                                                <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                    <h6>Previous Due Amount (BDT)</h6>
                                                    <h3 class="text-primary font-weight-700">
                                                        <input type="text" id="previousdueAmount" value="0" class="form-control" name="previousdueamount" readonly/>
                                                    </h3>
                                                </div>
                                                <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                    <h6>Total Purchase Amount (BDT)</h6>
                                                    <h3 class="text-primary font-weight-700">
                                                        <input type="text" id="totalPurchaseAmount" value="0" class="form-control" name="total_payment" readonly/>
                                                    </h3>
                                                </div>
                                                <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                    <h6>Due Amount (BDT): <input type="number" id="dueAmount" placeholder="Due Amount" class="form-control" name="due" readonly/></h6>
                                                    <h6>Paid Amount (BDT): <input type="number" id="paidAmount" placeholder="Paid Amount" class="form-control" name="total_payment" /></h6>
                                                </div>
                                                <div class="ttl-amt py-2 px-3">
                                                    <label>Payment Status</label>
                                                    <select name="payment_status" class="form-control" data-style="py-0">
                                                        <option value="0">Select Payment Status</option>
                                                        <option value="Paid">Paid</option>
                                                        <option value="Due">Due</option>
                                                    </select>
                                                </div>
                                                <div class="ttl-amt py-2 px-3">
                                                    <label>Purchase Status</label>
                                                    <select name="purchase_status" class="form-control" data-style="py-0" id="purchaseStatus">
                                                        <option value="0">Select Purchase Status</option>
                                                        <option value="Panding">Panding</option>
                                                        <option value="Complete">Receive</option>
                                                    </select>
                                                </div>
                                                <div id="panding" style="display: none;">
                                                    <div class="ttl-amt py-4 px-4 d-flex justify-content-between align-items-center">
                                                        <h6>
                                                            <label>Supplier Name</label>
                                                            <select class="form-control" data-style="py-0" id="supplierId">
                                                                <option>Select Supplier</option>
                                                                @foreach($supplier as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </h6>&nbsp;&nbsp;
                                                        <div class="form-group">
                                                            <h6>
                                                            <label>Product Name</label>
                                                            </h6>
                                                            <select name="product_name[]" class="form-control" data-style="py-0" id="productNameID">
                                                                <option>Select Product</option>
                                                                @foreach($supplier as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quantityAdd">

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Purchase</button>
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

                $('#productId').change(function(e) {

                var supplier_id = e.target.value;
                // var addOption = "";

                 $.ajax({

                       url:"{{ url('home/productname') }}",
                       type:"POST",
                       data: {
                           supplier_id: supplier_id
                        },

                       success:function (data) {
                            $('#productName').empty();

                           $('#productName').append('<option>Select Product Name</option>');

                            $.each(data.supplierproduct[0].supplierproduct,function(index,productName){
                                // console.log(productName.price);
                                $('#productName').append('<option value="'+productName.id+'">'+productName.product+'</option>');
                            })
                       }
                   })
                });
            });


                    $(document).ready(function(){
                        $('#productName').change(function(e){

                            var price_id = e.target.value;
                            var table ="";
                            // console.log(price_id);
                            $.ajax({
                                url: "{{ url('home/productprice') }}",
                                type:"POST",
                                data: {
                                    price_id: price_id
                                },
                                    success: function(data){

                                            table+=`<table class="table">`
                                            table+=`<thead class="table-primary">
                                                        <tr>
                                                            <th scope="col">Product ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Sell Price</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Color</th>
                                                            <th scope="col">Discount(%)</th>
                                                            <th scope="col">Total Amount</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>`

                                            $.map(data.supplierproduct,function(index,value){

                                                $('#showOne').append(
                                                table+=`<tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control" value="${index.products_id}" name="products_id[]" readonly/></td>
                                                                <td><input type="text" class="form-control" value="${index.product}" name="product_name[]" readonly/></td>
                                                                <td><input type="text" id="purchaseprice-${index.id}" class="form-control" value="${index.price}" name="product_price[]" readonly/></td>
                                                                <td><input type="number" class="form-control" id="saleprice" name="sell_price[]" /></td>
                                                                <td><input type="number" id="quantity-${index.id}" class="form-control" name="quantity[]" value="0" /></td>
                                                                <td><input type="text" class="form-control" name="color[]" /></td>
                                                                <td><input type="number" id="discount-${index.id}" class="form-control" name="discount[]" value="0" /></td>
                                                                <td><input type="text" id="totalAmount-${index.id}" class="total_amount form-control" name="total_amount[]"/></td>
                                                                <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                                            </tr>
                                                        </tbody>`
                                                );
                                            })

                                        table+=`</table>`
                                        $('#showOne')
                                        // console.log(data);
                                    },
                                        error: function(){
                                            console.log("Error Occurred");
                                        }
                                });

                            });

                        });

                    $(document).on('click', '.remove-tr', function(){
                            $(this).parents('table').remove();
                        });



    // Use for Subtotal Calculator

    $("#showOne").change(function(){

        let productName = $('#productName').val();
        // console.log(productName);
        let purchaseprice = $(`#saleprice`).val();
        let quantity = $(`#quantity-${productName}`).val();
        let discount = $(`#discount-${productName}`).val();
        let totalDiscount = (purchaseprice * quantity * discount) / 100;
        let totalAmount = (purchaseprice * quantity) - totalDiscount;
        $(`#totalAmount-${productName}`).val(totalAmount);

        var sum = 0;
        $(".total_amount").each(function() {
            sum += +$(this).val();
        });

        $("#subtotalPurchaseAmount").val(sum);

    })

    $("#paidAmount").change(function(){

        let totalAmount = $("#subtotalPurchaseAmount").val();

        let paidAmount = $('#paidAmount').val();
        let dueAmount = (totalAmount - paidAmount);
        $("#dueAmount").val(dueAmount);

    })

        // use For Due Product

        $(document).on("click", "#purchaseStatus", function() {

            var pandingId =  $(this).val()

                if(pandingId === 'Panding'){

                $("#panding").show()
            }
            else{
                $("#panding").hide()
        }
        });

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $(document).ready(function () {

                        $('#supplierId').on('change',function(e) {

                        var supplier_id = e.target.value;
                        $.ajax({

                            url:"{{ url('home/productname') }}",
                            type:"POST",
                            data: {
                                supplier_id: supplier_id
                                },

                            success:function (data) {
                                    $('#productNameID').empty();
                                    $.each(data.supplierproduct[0].supplierproduct,function(index,productName){
                                        // console.log(productName.price);
                                        $('#productNameID').append('<option value="'+productName.id+'">'+productName.product+'</option>');
                                    })
                            }
                        })
                        });
                    });

        $(document).ready(function(){
            $('#productNameID').change(function(e){

                var price_id = e.target.value;
                var table ="";
                // console.log(price_id);
                $.ajax({
                    url: "{{ url('home/productprice') }}",
                    type:"POST",
                    data: {
                        price_id: price_id
                    },
                        success: function(data){

                                $.map(data.supplierproduct,function(index,value){
                                    $('#quantityAdd').append(`
                                        <div class="remove-qt">
                                            <div class="ttl-amt py-4 px-4 d-flex justify-content-between align-items-center">
                                                <h6><input type="text" class="form-control" value="${index.product}" name="product_name[]" readonly/></h6>&nbsp;&nbsp;
                                                <h6><input type="number" placeholder="Quantity" class="form-control" name="qty[]" /></h6>&nbsp;&nbsp;
                                                <h6><button type="button" class="btn btn-danger" id="removeID">Remove</button></h6>
                                            </div>
                                        </div>
                                    `);
                                })
                            $('#quantityAdd')
                            // console.log(data);
                        },
                            error: function(){
                                console.log("Error Occurred");
                            }
                    });

                });

            });

        $(document).on('click', '#removeID', function(){
            $(this).parents('.remove-qt').remove();
        });



</script>

@endpush



