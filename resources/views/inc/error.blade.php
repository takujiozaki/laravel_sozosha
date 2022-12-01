@if($errors->any())
<div class="alert alert-danger">
    <ul class="error">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif