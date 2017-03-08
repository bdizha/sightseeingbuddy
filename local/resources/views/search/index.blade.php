@extends('layouts.app')

@section('content')
<section id="page" class="booking-block">
    @include('profile.partials.header', ['user' => $user, 'title' => 'LET\'S FIND YOU A LOCAL EXPERIENCE'])
</section>

<section id="page" class="white-block booking-block">
    <div class="container mt-1">

        @include('profile.partials.tabs', ['user' => $user, 'title' => 'WELCOME TO YOUR DASHBOARD'])

        <div class="gray-bottom-border mb-1"></div>
    </div>
    <div class="container mt-1 pb-3">
        <form class="search-form">
            <div class='row'>
                <div class="col-sm-4 col-xs-12">
                    <?php $category_ids = [] ?>
                    @foreach($categories as $category)
                    <div class="search-item">
                        <label class="checkbox-inline">
                            {{ Form::checkbox('category_id[' . $category->id . ']', $category->id, in_array($category->id, $category_ids), ['id' => 'category_' . $category->id]) }}
                            <label for="{{ 'category_' . $category->id }}">
                                <span></span>
                                <icon class="category-{{ $category->id }}"></icon>
                                {{ $category->name }}
                            </label>
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-5 col-xs-12">
                    <div class="form-group" id="destination"> 
                        <div class="input-group-addon"></div>
                        <input class="text form-control input-lg fullwidth" type="text" id="fields-destination" name="fields[destination]" value="" data-show-chars-left="" autocomplete="off" placeholder="Your destination">
                    </div>
                    <div class="form-group" id="guests"> 
                        <div class="input-group-addon"></div>
                        <select class="form-control input-lg" id="fields-guests" name="fields[guests]" value="" data-show-chars-left="" autocomplete="off" placeholder="Amount of guests">
                            <option>Amount of guests</option>
                        </select>
                    </div>
                    <div class="form-group" id="duration"> 
                        <div class="input-group-addon"></div>
                        <select class="form-control input-lg" id="fields-duration" name="fields[duration]" value="" data-show-chars-left="" autocomplete="off" placeholder="Length of stay">
                            <option>Length of stay</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <button type="submit" class="btn btn-default btn-lg btn-block">Go</button>
                    <a href="/experiences" class="btn btn-primary btn-lg btn-block">BROWSE ALL</a>
                    <a href="#" class="btn btn-primary btn-lg btn-block" id="advanced-search">ADVANCED SEARCH</a>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
@endsection