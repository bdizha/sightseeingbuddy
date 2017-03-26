@extends('layouts.app')

@section('content')
    <section id="page" class="gray-block">

        @include('experience.partials.header')

        <div class="container experience-block gray-block" id='experience-info'>
            <div class="gray-bottom-border"></div>
            <h1 id="experiences" class="page-title page-title-center">
                Availability of local experience
            </h1>
            <div class="row">
                <?php $days = array_keys(Helper::days()) ?>
                <?php $inActiveDays = array_diff($days, $experience->days) ?>
                <div class="col-sm-6 col-xs-12">
                    <div id="datepicker" class="datepicker" data-days-inactive="{{ implode(",", $inActiveDays) }}"
                         data-days-active="{{ implode(",", $experience->days) }}"></div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <h3>This is bold copy</h3>
                    <div class="media-summary">
                        <p>Lorem ipsum dolor sit amet, vis saperet delectus eu, id vel recusabo facilisis.
                            Graece tibique periculis eu cum, at fabulas omittam nec, et vis vitae tantas
                            quaerendum. Pri inani platonem at, vix eu scaevola officiis luptatum. Iusto putent
                            consequat mel ut, dicit nonumes definitiones qui ad.</p>
                        <p>Ius in possim hendrerit, libris electram eos ei. Inani graece vel ei, ipsum melius no
                            mea. Ea usu ullum alterum. Vim ut bonorum efficiantur philosophia.</p>
                    </div>
                    <h2>Legend</h2>
                    <div class="legend">
                        <icon class="available"></icon>
                        Available on this day
                    </div>
                    <div class="legend">
                        <icon class="not-available"></icon>
                        Not available on this day
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value="{{ $experience->id }}" id="experience-id"/>
        @include('experience.partials.availability')
    </section>
@endsection