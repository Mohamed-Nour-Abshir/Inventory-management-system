<!-- Backend Bundle JavaScript -->
    <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('assets/js/table-treeview.js') }}"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('assets/js/chart-custom.js') }}"></script>
    
    <!-- app JavaScript -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- toastr js --}}
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>

<script>
        @if(Session::has('message'))
            var type= "{{Session::get('alert-type', 'info')}}"
            switch(type){
                    case 'info':
                            toastr.info("{{Session::get('message')}}");
                            break;
                    case 'success':
                            toastr.success("{{Session::get('message')}}");
                            break;
                    case 'warning':
                            toastr.warning("{{Session::get('message')}}");
                            break;
                    case 'error':
                            toastr.error("{{Session::get('message')}}");
                            break;
                }
        @endif
    </script>

@stack('script')