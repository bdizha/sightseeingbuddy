<div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">PROFILE ACTIVATION</div>
            <div class="panel-body">
                @if($user->type == 'local')
                    <p>Hi {{ $user->first_name }},</p>
                    <p>
                        Thank you for signing up to Sightseeing Buddy to become a host in your city. We are busy reviewing your profile and will be in contact with you in order to complete the verification process.
                    </p>
                @else
                    <p>An email has been sent to the address provided containing a link to verify your email
                        address. Activate your profile on Sightseeing Buddy by clicking the button below.</p>
                    <p><a href="{{ url('/local/auth/again', $userId) }}">Click here to resend verification link.</a></p>
                @endif
            </div>
        </div>
    </div>
</div>