
@if ($message = session()->get('success'))
    <script>
        $.notify('{{ $message }}','success');
    </script>
@endif

@if ($message =  session()->get('error'))
    <script>
        $.notify('{{ $message }}','error');
    </script>
@endif

@if ($message =  session()->get('warning'))
    <script>
        $.notify('{{ $message }}','warn');
    </script>
@endif

@if ($message =  session()->get('info'))
    <script>
        $.notify('{{ $message }}','info');
    </script>
@endif


@if($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    $.notify('{{ $error }}','error');
                </script>
            @endforeach
@endif

