@extends('admin.layouts.app')
@section('title')
    Inventory Management | Product Update
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
                            <h4 class="card-title">Update Product</h4>
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
                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
							@method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        <select name="purchaseproduct" class="form-control" data-style="py-0" id="purchaseProductID">
                                            <option>Select Product</option>
                                            @foreach($purchaseproduct as $item)
                                                <option value="{{ $item->id }}" {{$product->purchaseproduct_id == $item->id ? 'selected' : ''}}>
                                                    {{ $item->product_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                       	<input type="text" class="form-control" id="supplierID" name="supplier_name" value="{{ $product->supplier_name }}" readonly>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                       	<input type="text" class="form-control" id="purchasepriceID" name="purchase_price" value="{{ $product->purchase_price }}" readonly>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sell Price</label>
                                       	<input type="text" class="form-control" id="sellpriceID" name="sell_price" value="{{ $product->sell_price }}" readonly>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                       	<input type="text" class="form-control" id="quantityID" name="quantity" value="{{ $product->quantity }}" readonly>
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
                                       	<input type="text" class="form-control" name="product_code" placeholder="Enter Product Code" value="{{ $product->product_code }}">
                                    </div>
                                </div> 
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <select name="category" class="form-control" data-style="py-0">
                                            <option>Select Category</option>
                                            @foreach($category as $item)
                                                <option value="{{ $item->id }}" {{$product->category_id == $item->id ? 'selected' : ''}}>
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
                                                <option value="{{ $item->id }}" {{$product->brand_id == $item->id ? 'selected' : ''}}>
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
                                                <option value="{{ $item->id }}" {{$product->unit_id == $item->id ? 'selected' : ''}}>
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
                                                <option value="{{ $item->id }}" {{$product->warehouse_id == $item->id ? 'selected' : ''}}>
                                                    {{ $item->warehouse_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
								<div class="col-md-8">
                                    <div class="form-group" id="warehouseQty">
										<table>
											<thead class="table-primary">
												<tr>
													<th scope="col">Warehouse Name</th>
													<th scope="col">Stock Quantity</th>
													<th scope="col"></th>
													<th scope="col"></th>
												</tr>
											</thead>
											<tbody>
                                                @if($product->warehousestockqty)
                                                    @foreach($product->warehousestockqty as $data)
                                                        <tr>
                                                            <td><input type="text" class="form-control" value="{{ $data->warehouse_name }}" name="warehouse_name[]" readonly/></td>
                                                            <td><input type="text" id="" class="form-control" name="warehouse_stockqty[]" value="{{ $data->warehouse_stockqty }}"/></td>
                                                            <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                                            <td><input type="hidden" name="warehousestock_name[]" value="{{ $data->id }}"/></td>
                                                        </tr>
                                                    @endforeach 
                                                @endif
											</tbody>
										</table>
                                    </div>
                                </div> 
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Update Product</button>
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
