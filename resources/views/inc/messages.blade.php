@if(count($errors) >0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> {{ session('error') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> {{ session('warning') }}
    </div>
@endif

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
</script>
