<div id="newsletter-group" class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    @if ($errors->has('category_id'))
        <label class="control-label" for="newsletter_email">{{ $errors->first('email') }}</label>
    @endif
    @if (!empty($isSuccess))
        <div class="alert alert-success">
            You've successfully subscribed to our newsletter!
        </div>
    @else
        <input class="text form-control fullwidth" type="text" id="newsletter_email"
               name="newsletter_email" value="" required autocomplete="off"
               placeholder="Please enter your email address...">
    @endif
</div>