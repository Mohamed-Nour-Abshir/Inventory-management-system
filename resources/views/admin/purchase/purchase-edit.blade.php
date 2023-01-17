@extends('admin.layouts.app')
@section('title')
    Inventory Management | Purchase Update
@endsection

@section('content')

<div class="content-page">
            <div class="container-fluid add-form-list">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Update Purchase</h4>
                                </div>
                            <a href="{{ route('purchase.index') }}" class="btn btn-primary add-list">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('purchase.update', $purchase->id) }}" method="post">
                                    @csrf
                    		        @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="dob">Date *</label>
                                                <input type="date" class="form-control" value="{{ $purchase->date }}" name="date" />
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <select name="supplier" class="form-control" data-style="py-0" id="productId">
                                                    @foreach($supplier as $item)
                                                        <option value="{{ $item->id }}" {{$purchase->supplier_id == $item->id ? 'selected' : ''}}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                {{-- @dump($purchaseproductName) --}}
                                                <select class="form-control" data-style="py-0" id="productName">
                                                    @foreach($purchaseproductName as $item)
                                                        <option value="{{ $item->id }}" {{$purchaseproductName->first()->id === $item->id ? 'selected' : ''}}>
                                                            {{ $item->product_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-12"> 
                                            <div class="form-group" id="showOne">
                                                @if($purchase->purchaseproduct)
                                                    {{-- @dump($purchase->purchaseproduct) --}}
                                                    @foreach($purchase->purchaseproduct as $data)
                                                    {{-- @dump($data); --}}
                                                        <table class="table">
                                                            <thead class="table-primary">
                                                                <tr>
                                                                    <th scope="col"></th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Sell Price</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Color</th>
                                                                    <th scope="col">Discount</th>
                                                                    <th scope="col">Total Amount</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="hidden" name="purchase_name[]" value="{{ $data->id }}"/></td>  
                                                                    <td><input type="text" class="form-control" value="{{ $data->product_name }}" name="product_name[]" readonly/></td>
                                                                    <td><input type="text" id="purchaseprice" class="cal form-control" value="{{ $data->product_price }}" name="product_price[]" readonly/></td>
                                                                    <td><input type="number" class="form-control" value="{{ $data->sell_price }}" name="sell_price[]" /></td>
                                                                    <td><input type="number" id="quantity" class="cal form-control" value="{{ $data->quantity }}" name="quantity[]" value="0" /></td>
                                                                    <td><input type="text" class="form-control" value="{{ $data->color }}" name="color[]" /></td>
                                                                    <td><input type="number" id="discount" class="cal form-control" value="{{ $data->discount }}" name="discount[]" value="0" /></td>
                                                                    <td><input type="text" id="totalAmount" class="form-control" value="{{ $data->total_amount }}" name="total_amount[]"/></td>
                                                                    <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div> 
                                    </div>
                                        <div class="row mt-8 mb-10">
                                            <div class="offset-lg-7 col-lg-5">
                                                <div class="or-detail rounded">
                                                        <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                        <h5>Total Purchase Amount</h5>
                                                        <h3 class="text-primary font-weight-700">
                                                            <input type="text" id="totalAmount" class="form-control" value="{{ $purchaseproductPrice }}" name="total_payment" />
                                                        </h3>
                                                        </div>
                                                        <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                                            <h6><input type="number" id="dueAmount" placeholder="Due Amount" value="{{ $purchase->due }}" class="form-control" name="due" /></h6>
                                                            <h6><input type="number" id="paidAmount" placeholder="Paid Amount" value="{{ $purchase->total_payment }}" class="form-control" name="total_payment" readonly/></h6>
                                                        </div>
                                                        <div class="ttl-amt py-2 px-3">
                                                           <label>Payment Status</label>
                                                            <select name="payment_status" class="form-control" data-style="py-0">
                                                                <option value="0">Select Payment Status</option>
                                                                <option value="Paid" {{$purchase->payment_status === 'Paid' ? 'selected' : ''}}>Paid</option>
                                                                <option value="Due" {{$purchase->payment_status === 'Due' ? 'selected' : ''}}>Due</option>
                                                            </select>
                                                        </div>
                                                        <div class="ttl-amt py-2 px-3">
                                                           <label>Purchase Status</label>
                                                            <select name="purchase_status" class="form-control" data-style="py-0" id="purchaseStatus">
                                                                <option value="0">Select Purchase Status</option>
                                                                <option value="Panding" {{$purchase->purchase_status === 'Panding' ? 'selected' : ''}}>Panding</option>
                                                                <option value="Complete" {{$purchase->purchase_status === 'Complete' ? 'selected' : ''}}>Receive</option>
                                                            </select>
                                                        </div>
                                                        <div id="panding" style="display: none;">
                                                            <div class="ttl-amt py-4 px-4 d-flex justify-content-between align-items-center">
                                                                <h6>
                                                                    <label>Supplier Name</label>
                                                                    <select class="form-control" data-style="py-0" id="supplierId" name="">
                                                                        <option>Select Supplier</option>
                                                                        @foreach($supplier as $item)
                                                                            <option value="{{ $item->id }}" {{$purchase->supplier_id == $item->id ? 'selected' : ''}}>
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
                                                                        <option>Select Product Name</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="quantityAdd">
                                                            <div class="ttl-amt py-4 px-4 d-flex justify-content-between align-items-center">
                                                            @if($purchase->purchasepanding)
                                                                @foreach($purchase->purchasepanding as $data)
                                                                <h6><input type="hidden" name="purchaseqty_name[]" value="{{ $data->id }}"/></h6>
                                                                <h6><input type="text" class="form-control" value="{{ $data->product_name }}" name="product_name[]" readonly/></h6>&nbsp;&nbsp;
                                                                <h6><input type="number" placeholder="Quantity" value="{{ $data->qty }}" class="form-control" name="qty[]" /></h6>&nbsp;&nbsp;
                                                                <h6><button type="button" class="btn btn-danger" id="removeID">Remove</button></h6>
                                                                @endforeach 
                                                            @endif
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>                             
                                    <button type="submit" class="btn btn-primary mr-2">Update Purchase</button>
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
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Sell Price</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Color</th>
                                                            <th scope="col">Discount</th>
                                                            <th scope="col">Total Amount</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>`
                                        
                                            $.map(data.supplierproduct,function(index,value){
                                                $('#showOne').append(
                                                table+=`<tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" value="${index.product}" name="product_name[]" readonly/></td>
                                                                    <td><input type="text" id="purchaseprice" class="cal form-control" value="${index.price}" name="product_price[]" readonly/></td>
                                                                    <td><input type="number" class="form-control" name="sell_price[]" /></td>
                                                                    <td><input type="number" id="quantity" class="cal form-control" name="quantity[]" value="0" /></td>
                                                                    <td><input type="text" class="form-control" name="color[]" /></td>
                                                                    <td><input type="number" id="discount" class="cal form-control" name="discount[]" value="0" /></td>
                                                                    <td><input type="text" id="totalAmount" class="form-control" name="total_amount[]"/></td>
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



    // Use for Calculator

    $("body").on('change', function(){

        // var purchaseprice = parseFloat(document.getElementById('purchaseprice').value);
        var purchaseprice = parseFloat($('#purchaseprice').val());

        var quantity = parseFloat(document.getElementById('quantity').value);

        var discount = parseFloat(document.getElementById('discount').value);

        var totalDiscount = (purchaseprice * quantity * discount) / 100;


        var total = document.getElementById('totalAmount').value = (purchaseprice * quantity) - totalDiscount;
        // var purchaseAmount = parseFloat(document.getElementById('purchaseAmount').value = (total));

        // Total Purchase Amount

        // var totalPurchaseAmount = parseFloat(document.getElementById('purchaseAmount').value);

        var dueAmount = parseFloat(document.getElementById('dueAmount').value);

        document.getElementById('paidAmount').value = (purchaseAmount - total);
        
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



  