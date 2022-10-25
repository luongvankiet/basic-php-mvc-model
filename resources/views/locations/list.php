<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h4>Locations</h4>
                                <hr />
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($locations as $key => $location) { ?>
                                        <li class="list-group-item list-group-item-action locations" data-lat="<?php echo $location->lat ?>" data-lng="<?php echo $location->lng ?>">
                                            <h6><?php echo $location->name ?></h6>
                                            <p><i class="fa fa-map-marker-alt pr-2"></i> <?php echo $location->address ?></p>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-12 col-md-9">
                                <h4>Map</h4>
                                <hr />
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // function focusLocation(this) {
    //     this.getAttribute
    // }

    function initMap(location) {
        const myLatLng = location ? location : {
            lat: -33.872761,
            lng: 151.205338
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: myLatLng,
        });
        <?php foreach ($locations as $key => $location) { ?>
            new google.maps.Marker({
                position: {
                    lat: <?php echo $location->lat ?>,
                    lng: <?php echo $location->lng ?>
                },
                map
            });
        <?php } ?>
    }

    window.initMap = initMap;
</script>
