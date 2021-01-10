<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<script>
    $(document).ready(function () {
        @if(Session::has('success'))
        $.notify({
            // options
            message: '{{ Session::get('success') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('success');
        @endphp
        @endif


        @if(Session::has('info'))
        $.notify({
            // options
            message: '{{ Session::get('info') }}'
        },{
            // settings
            element: 'body',
            type: 'info'
        });
        @php
            Session::forget('info');
        @endphp
        @endif


        @if(Session::has('warning'))
        $.notify({
            // options
            message: '{{ Session::get('warning') }}'
        },{
            // settings
            element: 'body',
            type: 'warning'
        });
        @php
            Session::forget('warning');
        @endphp
        @endif



        @if(Session::has('error'))
        $.notify({
            // options
            message: '{{ Session::get('error') }}'
        },{
            // settings
            element: 'body',
            type: 'danger'
        });
        @php
            Session::forget('error');
        @endphp
        @endif



        @if(Session::has('cartFailure'))
        $.notify({
            // options
            message: '{{ Session::get('cartFailure') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('cartFailure');
        @endphp
        @endif

        @if(Session::has('userFailure'))
        $.notify({
            // options
            message: '{{ Session::get('userFailure') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('userFailure');
        @endphp
        @endif

        @if(Session::has('OrderDone'))
        $.notify({
            // options
            message: '{{ Session::get('OrderDone') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('OrderDone');
        @endphp
        @endif


        @if(Session::has('changeAmountFailure'))
        $.notify({
            // options
            message: '{{ Session::get('changeAmountFailure') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('changeAmountFailure');
        @endphp
        @endif




        @if(Session::has('changeAmountSucces'))
        $.notify({
            // options
            message: '{{ Session::get('changeAmountSucces') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('changeAmountSucces');
        @endphp
        @endif


        @if(Session::has('checkOrderFailure'))
        $.notify({
            // options
            message: '{{ Session::get('checkOrderFailure') }}'
        },{
            // settings
            element: 'body',
            type: 'success'
        });
        @php
            Session::forget('checkOrderFailure');
        @endphp
        @endif


    });



</script>
