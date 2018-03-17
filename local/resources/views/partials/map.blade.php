<style type="text/css">
    #map {
        margin-left: 15px;
    }

    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
</style>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            initGeocodeAddress();
        }, 1000);

        $("#street_address, #postal_code").on('blur', function () {
            initGeocodeAddress();
        });

        $window.on('resize', initGeocodeAddress);
    });

    function initGeocodeAddress() {
        var address = "";

        var streetAddress = $('#street_address');

        if (!_.isUndefined(streetAddress) && !_.isEmpty(streetAddress.val())) {
            address += " " + streetAddress.val();
        }

        var postalCode = $('#postal_code');
        if (!_.isUndefined(postalCode) && !_.isEmpty(postalCode.val())) {
            address += " " + postalCode.val();
        }

        var cityName = $('#city_name');
        if (!_.isUndefined(cityName) && !_.isEmpty(cityName.val())) {
            address += " " + cityName.val();
        }

        var selectedCity = $('#city_id option:selected');
        if (!_.isUndefined(selectedCity) && !_.isEmpty(selectedCity.val())) {
            address += " " + selectedCity.text();
        }

        var countryName = $('#country_name');
        if (!_.isUndefined(countryName) && !_.isEmpty(countryName.val())) {
            address += " " + countryName.val();
        }

        var selectedCountry = $('#country_id option:selected');
        if (!_.isUndefined(selectedCountry) && !_.isEmpty(selectedCountry.val())) {
            address += " " + selectedCountry.text();
        }

        console.log(address, "address");

        if (address.length > 0) {

            var width = $("#map").width() - 15;
            var height = width * (2/3);

            console.log("width ::: " + width);
            console.log("height ::: " + height);

            var embed = "<iframe " +
                "width='" + width + "' " +
                "height='" + height + "' " +
                "frameborder='0'" +
                "scrolling = 'no'" +
                "marginheight = '0' " +
                "marginwidth = '0'" +
                "src = 'https://maps.google.com/maps?key=AIzaSyCTZ6MrDn00n_eQLrlqRcl5sB-GwnSZZk4&q=" +
                encodeURIComponent(address) +
                "&amp;output=embed'></iframe>";

            $('#map').html(embed);
        }
    }
</script>