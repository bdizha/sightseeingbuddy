<div class="modal fade message-modal in" id="booking-modal-{{ $booking->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Booking - {{ ucfirst($booking->status) }}
                </h3>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        <div class="booking-row">
                            <h4>Experience:</h4>
                            <h3>{{ $experience->teaser }}</h3>
                        </div>
                    </div>
                </div>
                <div class="gray-bottom-border mb-1"></div>
                <div class='row'>
                    <div class="col-sm-6 col-xs-12">
                        <div class="booking-row">
                            <h4>Date:</h4>
                            <h3>{{ \Carbon\Carbon::parse($booking->date)->format("d/m/Y") }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Status:</h4>
                            <h3>{{ ucfirst($booking->status) }}</h3>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="booking-row">
                            <h4>Location:</h4>
                            <h3>{{ $experience->street_address }}, {{ $experience->city->name }}, {{ $experience->postal_code }}, {{ $experience->country->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="gray-bottom-border mb-1"></div>
                <div class='row'>
                    <div class="col-sm-6 col-xs-12">
                        @if($booking->user->id == Auth::user()->id)
                            <h3>Your local's details</h3>
                            <div class="booking-row">
                                <h4>Name:</h4>
                                <h3>{{ $booking->local->first_name }}</h3>
                            </div>
                            <div class="booking-row">
                                <h4>Surname:</h4>
                                <h3>{{ $booking->local->last_name }}</h3>
                            </div>
                            <div class="booking-row">
                                <h4>Email:</h4>
                                <h3>{{ $booking->local->email }}</h3>
                            </div>
                        @else
                            <h3>Your guest's details</h3>
                            <div class="booking-row">
                                <h4>Name:</h4>
                                <h3>{{ $booking->user->first_name }}</h3>
                            </div>
                            <div class="booking-row">
                                <h4>Surname:</h4>
                                <h3>{{ $booking->user->last_name }}</h3>
                            </div>
                            <div class="booking-row">
                                <h4>Email:</h4>
                                <h3>{{ $booking->user->email }}</h3>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <h3>Your experience details</h3>
                        <div class="booking-row">
                            <h4>Number of guests:</h4>
                            <h3>{{ $experience->pricing->guests }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Price per guest:</h4>
                            <h3>R{{ str_replace("R", "", $experience->pricing->per_person) }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Grand total:</h4>
                            <h3>
                                <span class="currency-name" currency-name="ZAR">R</span>
                                <span class="currency-value"
                                      currency-value="{{ $booking->amount }}">{{ $booking->amount }}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>