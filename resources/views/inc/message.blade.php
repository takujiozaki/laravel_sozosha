@if(session('message'))
<div class="alert alert-info">
    <p>{{session('message')}}</p>
</div>
@endif