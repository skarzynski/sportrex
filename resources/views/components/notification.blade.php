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
    });

</script>
