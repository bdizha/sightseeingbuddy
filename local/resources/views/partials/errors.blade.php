@if (count($errors) > 0)
<div class="jobErrors">
    <ul class="jobErrorsRow">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif