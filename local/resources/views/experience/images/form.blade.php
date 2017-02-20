<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-xs-12'>
                <h1 class="page-title page-title-left">
                    Add your images
                </h1>
                {!! csrf_field() !!}
                <p>
                    Lorem ipsum dolor sit amet, vis saperet delectus eu, id vel recusabo facilisis. Graece tibique periculis
                    eu cum, at fabulas omittam nec, et vis vitae tantas quaerendum. Pri inani platonem at, vix eu scaevola
                    officiis luptatum. Iusto putent consequat mel ut, dicit nonumes definitiones qui ad.
                </p>
                <p>
                    Ius in possim hendrerit, libris electram eos ei. Inani graece vel ei, ipsum melius no mea. Ea usu ullum
                    alterum. Vim ut bonorum efficiantur philosophia
                </p>
            </div>
        </div>
    </article>

    <div class="mt-3 text-center">
        <div class='row'>
            <div class="col-sm-6 col-xs-6">
                <input type="submit" class="btn btn-yellow full-width" value="UPLOAD COVER IMAGE" />
                <div class='mb-2'><small>This photo will show up in search results</small></div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <input type="submit" class="btn btn-yellow full-width" value="UPLOAD 3 GALLERY IMAGES" />
                <div class='mb-2'><small>These 3 images will show up in your local experience gallery.</small></div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12 col-xs-12">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save" />
                <a href="{{ route('wallet.create') }}" class="btn btn-primary pull-right">Back</a>
                <span class='inline pull-right'>&nbsp;&nbsp;</span>
                <input type="submit" class="btn btn-primary pull-right" value="Next" />
            </div>
        </div>
    </div>
</div>