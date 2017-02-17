<!-- end search form here -->    
<div class="jobWelcomeRow">
    <form id="promo" action="/jobs" class="section searchForm promoSection jobBlock">
        <div class="searchRow jobTable jobSearchTable">            
            <div class="jobSearchColumn jobSearchWhat">
                {!! Form::text('what', session()->get('what'), ['placeholder' => 'Find your job']) !!}
            </div>                
            <div class="jobSearchColumn jobSearchProvince">
                {!! Form::select('province_id', Helper::formProvinces(), session()->get('province_id'), ['placeholder' => 'Select region']) !!}
            </div>
            <div class="jobSearchColumn jobSearchGo">
                <input type="submit" class="button greenButton" value="Go">
            </div>            
        </div>
    </form>
</div>