<div class="jobPost">
    <header class="jobPostHeader">
        <h1>Reset Password</h1>
    </header>
    <form id="jobSignForm" method="POST" class="jobForm jobGrey" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}
        @include('partials.errors')

        <div class="inputLabel">Enter the email address used to register with to be sent an email containing instructions on resetting your password</div>
        @if (session('status'))
        <div class="jobAlertSuccess">
            {{ session('status') }}
        </div>
        @endif

        <div class="jobWhite">
            <div class="inputRow inputTable">
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="inputRow inputTable">
                <input type="submit" class="button greenButton" value="Send Password" />
            </div>
        </div>
    </form>
    <div class="formSubHeader">
        <div class="jobRow">            
            <span>Already signed up?</span>
            <a href="{{ url('/login') }}">Sign In</a>
        </div>
    </div>
</div>