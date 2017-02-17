<div class="jobPost">
    <header class="jobPostHeader">
        <h1>Reset Password</h1>
    </header>
    <form id="jobSignForm" method="POST" class="jobForm jobGrey" action="{{ url('/password/reset') }}">
        {!! csrf_field() !!}
        @include('partials.errors')
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="jobWhite">
            <div class="inputRow inputTable">
                <input type="text" name="email" placeholder="Email" value="{{ $email or old('email') }}">
            </div>
            <div class="inputRow inputTable">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="inputRow inputTable">
                <input type="password" name="password_confirmation" placeholder="Password confirmation">
            </div>
            <div class="inputRow inputTable">
                <input type="submit" class="button greenButton" value="Reset Password" />
            </div>
        </div>
    </form>
</div>