@extends('admin.layouts.app')
@section('title')
    Nitmag | Product Add
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
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    <a href="{{ route('product.index') }}" class="btn btn-primary add-list">Back</a>
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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        <select name="purchaseproduct" class="form-control" data-style="py-0" id="purchaseProductID">
                                            <option>Select Product</option>
                                            @foreach($purchaseproduct as $item)
                                                <option value="{{ $item->id }}" >{{ $item->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="product_name" value="" id="productName">
                                <input type="hidden" name="products_id" value="" id="productID">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                       	<input type="text" class="form-control" id="supplierID" name="supplier_name" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                       	<input type="text" class="form-control" id="purchasepriceID" name="purchase_price" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sell Price</label>
                                       	<input type="text" class="form-control" id="sellpriceID" name="sell_price" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                       	<input type="text" class="form-control" id="quantityID" name="quantity" value="" readonly>
                                    </div>
                                </div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Product Image *</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="file">
											<label class="custom-file-label" for="customFile">Choose Image</label>
										</div>
									</div>
								</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Code</label>
                                       	<input type="text" class="form-control" name="product_code" placeholder="Enter Product Code">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <select name="category" class="form-control" data-style="py-0">
                                            <option>Select Category</option>
                                            @foreach($category as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand Name *</label>
                                        <select name="brand" class="form-control" data-style="py-0">
                                            <option>Select Brand</option>
                                            @foreach($brand as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Unit Name *</label>
                                        <select name="unit" class="form-control" data-style="py-0">
                                            <option>Select Unit</option>
                                            @foreach($unit as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Warehouse Name *</label>
                                        <select name="warehouse" class="form-control" data-style="py-0" id="warehouseID">
                                            <option>Select Warehouse</option>
                                            @foreach($warehouse as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->warehouse_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="form-control" data-style="py-0">
                                            <option>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group" id="warehouseQty">

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Product</button>
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

                $('#purchaseProductID').change(function(e) {

                	var purchaseProductID = e.target.value;

                 $.ajax({

                       url:"{{ route('product-details') }}",
                       type:"POST",
                       data: {
                           purchaseProductID: purchaseProductID
                        },

                       success:function (data) {
                           $('#supplierID').val(data.purchaseproduct[0].purchase.supplier.name);
                           $('#purchasepriceID').val(data.purchaseproduct[0].product_price);
                           $('#sellpriceID').val(data.purchaseproduct[0].sell_price);
                           $('#quantityID').val(data.purchaseproduct[0].quantity);
                           $('#productName').val(data.purchaseproduct[0].product_name);
                           $('#productID').val(data.purchaseproduct[0].products_id);
                       }
                   })
                });
            });

				$(document).ready(function(){

                        $('#warehouseID').change(function(e){

                            var warehouseID = e.target.value;
                            var table ="";
                            $.ajax({
                                url: "{{ route('warehouse-details') }}",
                                type:"POST",
                                data: {
                                    warehouseID: warehouseID
                                },
                                    success: function(data){

                                            table+=`<table class="table">`
                                            table+=`<thead class="table-primary">
                                                        <tr>
                                                            <th scope="col">Warehouse Name</th>
                                                            <th scope="col">Stock Quantity</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>`

                                            $.map(data.warehouseDetails,function(index,value){
                                                console.log(index);
                                                $('#warehouseQty').append(
                                                table+=`<tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control" value="${index.warehouse_name}" name="warehouse_name[]" readonly/></td>
                                                                <td><input type="text" id="" class="form-control" name="warehouse_stockqty[]"/></td>
                                                                <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                                            </tr>
                                                        </tbody>`
                                                );
                                            })

                                        table+=`</table>`
                                        $('#showOne')
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


</script>

@endpush



