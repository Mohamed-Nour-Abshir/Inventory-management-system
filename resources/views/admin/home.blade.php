@extends('admin.layouts.app')

@section('content')     
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/user.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('customer.create') }}"><h3>Customer Add</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/supplier.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('supplier.create') }}"><h3>Supplier Add</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/purchase.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('purchase.create') }}"><h3>Purchase Product</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/sell.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('order.create') }}"><h3>New Order</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/purchase-return.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('purchase-return.create') }}"><h3>Purchase Return</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/sell-return.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('sales-return.create') }}"><h3>Sell Return</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/stock.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('stock.create') }}"><h3>Stock Add</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/expense.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('expense.create') }}"><h3>Expense Add</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/user2.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('user-create.create') }}"><h3>Create Users</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/settings.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('company-setting.index') }}"><h3>Company Settings</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/email.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('customer-email.create') }}"><h3>Email for Customer</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body bg-light text-center rounded">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-info-light">
                                            <img src="{{ asset('assets/images/product/email1.png') }}" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <a href="{{ route('supplier-email.create') }}"><h3>Email for Supplier</h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
@endsection
