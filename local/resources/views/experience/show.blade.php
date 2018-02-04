@extends('layouts.app')

@section('content')
    <section id="page" class="gray-block">

        @include('experience.partials.header')

        <?php $score = 3.52 ?>
        <?php $ratings = ['Excellent', 'Very good', 'Average', 'Poor', 'Terrible'] ?>

        <div class="index-slider">
            @include('experience.partials.carousel')
        </div>

        <div class="container profile experience-block gray-block mt-1" id='experience-info'>

            <h1 id="experiences">
                Local experience information
            </h1>

            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <article class="media media-responsive">
                        <div class="media-body">
                            <h3>
                                {{ $experience->teaser }}
                            </h3>
                            <div class="media-summary">
                                {!! nl2br($experience->description) !!}
                            </div>
                        </div>
                    </article>
                    {!! $experience->cover_image !!}
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="gray-bottom-border mt-1 mb-1"></div>
                    <div class="exp-item">
                        <h3>
                            Offered languages
                        </h3>
                        <ul>
                            @foreach($experience->languages as $key => $language)
                                <li>{{ $language->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="exp-item">
                        <h3>
                            Experience highlights
                        </h3>
                        <ul>
                            @foreach($experience->highlights as $key => $highlight)
                                <li>{{ $highlight->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @if($experience->activities->count())
                        <div class="exp-item">
                            <h3>
                                Experience activities
                            </h3>
                            <ul>
                                @foreach($experience->activities as $key => $activity)
                                    <li>{{ $activity->description }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="gray-bottom-border mt-1 mb-1"></div>
                    <h3>
                        Experience details
                    </h3>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <label>{{ "Type:" }}</label>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            {{ $experience->category->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <label>{{ "Duration:" }}</label>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            {{ $experience->duration }}
                            {{ $experience->units }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <label>{{ "Meeting point:" }}</label>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            {{ $experience->city->name }},
                            {{ $experience->country->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <label>{{ "No. of guests:" }}</label>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            @if($experience->pricing->guests > 1){{ 1 }} - @endif{{ $experience->pricing->guests }}
                            person(s)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <label>Price per guest:</label>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                        <span class="data-currency"
                              data-currency-base="{{ str_replace("R", "", $experience->pricing->per_person) }}">
                            {{ $experience->pricing->per_person }}
                        </span>
                        </div>
                    </div>
                    @foreach($extras as $extra)
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <label>{{ $extra['label'] . ":" }}</label>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                {{ $experience[$extra['name']] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <h1 id="experiences">
                Reviews
            </h1>

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-xs-4 text-left">
                            <span class="overall-rating">Overall Rating</span>
                            <div class="rating-box">
                                @foreach($ratings as $key => $rating)
                                    <div class="rating star<?php echo ($key + 1 <= ceil($average)) ? ' star-filled' : '' ?>"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-4 overall-score text-center">
                            <strong>{{ number_format($average, 1) }}</strong>
                            out of <strong>5 stars</strong>
                            from <strong>{{ count($reviews) }}</strong> reviews
                        </div>
                        <div class="col-xs-4 block-review-new text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Write a review
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gray-bottom-border mt-1 mb-1"></div>

            <div class="row" id="reviews">
                @foreach($reviews as $review)
                    <div class="col-xs-12 col-sm-6">
                        <article class="media media-responsive">
                            <div class="media-top pull-top">
                                <div class="rating-box">
                                    @foreach($ratings as $key => $rating)
                                        <div class="rating star<?php echo ($key + 1 <= $review->vote) ? ' star-filled' : '' ?>"></div>
                                    @endforeach
                                </div>
                                <h3 class="review-title">
                                    {{ $review->title }}
                                </h3>
                                <div class="review-meta">
                                    {{ Carbon\Carbon::parse($review->created_at)->format('d/m/Y') }}
                                    , {{ 'By ' . $review->nickname }}
                                </div>
                            </div>
                            <div class="media-footer">
                                {{ $review->content }}
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            @if($reviews->count() === 0)
                <div>No reviews found.</div>
            @endif

        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                You're Reviewing "{{ $experience->teaser }}"
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div id="thank-you" class="alert-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Thank you for submitting your review.
                            </div>
                            {!! Form::open(['route' => 'review.store','id' => 'review-form']) !!}
                            <input type="hidden" id="review-vote" name="vote"/>
                            <input type="hidden" id="review-experience-id" name="experience_id"
                                   value="{{ $experience->id }}"/>
                            <div class="gray-bottom-border mb-1 mt-1"></div>
                            <div class='row'>
                                <div class="col-xs-12">
                                    <div class="form-group" id="error-vote">
                                        <label class="control-label" for="inputError1">How do you rate this
                                            experience?</label>
                                        <div class="rating-box rating-input">
                                            @foreach(array_reverse($ratings) as $key => $rating)
                                                <div class="rating star" data-value="{{ $key + 1 }}"
                                                     data-text="{{ $rating }}"></div>
                                            @endforeach
                                        </div>
                                        <div class="flagged" id="ratingFlag">
                                            <span>&nbsp;</span>
                                            <span id="rating-text">Click to rate</span>
                                        </div>
                                        <div class="error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group" id="error-is_recommended">
                                        <label class="control-label" for="inputError1">Would you recommend this product
                                            to a friend?</label>
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-4">
                                                <div class="row">
                                                    <label class="checkbox-inline">
                                                        <input id="is_recommended_yes" checked="checked" name="is_recommended"
                                                               type="radio"
                                                               value="1">
                                                        <label for="is_recommended_yes">
                                                            <span></span>
                                                            Yes
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-4">
                                                <div class="row">
                                                    <label class="checkbox-inline">
                                                        <input id="is_recommended_no" name="is_recommended" type="radio"
                                                               value="0">
                                                        <label for="is_recommended_no">
                                                            <span></span>
                                                            No
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group" id="error-title">
                                        <label class="control-label" for="inputError1">Title of your review</label>
                                        <input class="form-control fullwidth" type="text" id="review-title"
                                               name="title"
                                               value="" autocomplete="off" required
                                               placeholder="Summarize your visit or highlight an interesting detail"/>
                                        <div class="error"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group" id="error-content">
                                        <label class="control-label" for="inputError1">Your review</label>
                                        <textarea class="form-control fullwidth" id="review-content"
                                                  placeholder="Tell people about your experience:location, amenities?"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group" id="error-nickname">
                                        <label class="control-label" for="inputError1">What's your nickname?</label>
                                        <input class="form-control fullwidth" type="text" id="review-nickname"
                                               name="nickname"
                                               value="" autocomplete="off" required
                                               placeholder="E.g John Smith"/>
                                        <div class="error"></div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="submit-review" class="btn btn-primary">Submit your review</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .reviews {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .reviews > * {
            flex: 0 0 60%;
        }

        .overall-score,
        .block-review-new {
            display: inline-block;
            padding-top: 0;
        }

        #thank-you {
            display: none;
        }

        #thank-you.active {
            display: block;
        }

        .rating-box {
            width: 150px;
            display: table;
        }

        .overall-rating {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .star {
            display: table-cell;
            vert-align: middle;
            width: 30px;
            height: 24px;
            padding-right: 5px;
            background: url(/images/star.svg);
            background-repeat: no-repeat;
        }

        .star-filled {
            background-image: url(/images/star-filled.svg);
        }

        #ratingFlag {
            position: absolute;
            left: 160px;
            top: 0px;
        }

        #rating-text {
            background: #1a75bb;
            color: #FFFFFF;
            display: block;
            font-size: 1.167em;
            font-weight: bold;
            line-height: 24px;
            margin: 0;
            padding: 6px 17px;
            position: relative;
            text-align: center;
            top: 1px;
        }

        #rating-text:before {
            content: "";
            border-style: solid;
            border-width: 14px 14px 14px 0;
            border-color: transparent #1a75bb transparent transparent;
            width: 0;
            height: 0;
            position: absolute;
            left: -10px;
            top: 4px;
        }

        #review-content {
            height: 120px;
        }

        .error {
            color: #CC0000;
        }

        .form-group {
            position: relative;
        }

        #reviews article {
            padding: 20px;
            color: #3F3F3F;
        }

        #reviews .rating-box {
            margin-bottom: 10px;
        }

        #reviews article .media-top h3 {
            margin-bottom: 5px;
        }

        #reviews article .media-top .review-meta {
            margin-bottom: 10px;
            color: rgba(63, 63, 63, 0.65)
        }
    </style>
    <script type="text/javascript">
        $('#reviews').masonry({
            itemSelector: '.col-sm-6'
        });

        var handleVote = function () {
            var dataValue = $(this).attr("data-value");
            var dataText = $(this).attr("data-text");
            $("#review-vote").val(dataValue);

            $(".rating-input .star").removeClass("star-filled");
            $("#rating-text").html(dataText);

            $(".rating-input .star").each(function (index) {
                if (parseInt(dataValue) >= index) {
                    $(this).addClass("star-filled");
                }
            });
        };

        var submitReview = function (event) {
            event.preventDefault();

            var vote = $("#review-vote").val();
            var isRecommended = $("input[name='is_recommended']").val();
            var title = $("#review-title").val();
            var content = $("#review-content").val();
            var experienceId = $("#review-experience-id").val();
            var nickname = $("#review-nickname").val();

            var data = {
                'experience_id': experienceId,
                'vote': vote,
                'title': title,
                'content': content,
                'is_recommended': isRecommended,
                'nickname': nickname
            };

            var settings = {};
            settings.url = "/local/review";
            settings.type = "POST";
            settings.data = data;
            settings.dataType = 'json';
            settings.success = function () {
                $("#review-form").hide();
                $("#thank-you").addClass('active');

                setTimeout(function () {
                    location.reload();
                }, 3000);
                console.log("done");
            };
            settings.error = function (data) {
                $(".error").hide();

                if (data.responseJSON) {
                    $.each(data.responseJSON, function (key, error) {
                        $("#error-" + key + " .error").html(error[0]).show();
                    });
                }

                console.log(data.responseJSON, "errors");
            };
            settings.headers = {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            };

            $.ajax(settings);
        };

        $("#review-form").submit(submitReview);
        $("#submit-review").click(function () {
            $("#review-form").submit();
        });

        $(".rating-input .star").hover(handleVote).click(handleVote);
    </script>
@endsection