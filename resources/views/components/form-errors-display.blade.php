@if ($errors->any())
<div class="alert alert-danger text-white">
    <ul class="m-0 {{count($errors->all()) == 1 ? 'list-unstyled' :''}}">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
