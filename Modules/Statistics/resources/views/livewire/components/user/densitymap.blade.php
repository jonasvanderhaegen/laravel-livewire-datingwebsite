<div wire:ignore>
    <div id="map" style="height: 500px"></div>
</div>

@push('scripts')
    <!-- Leaflet JS -->
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""
    ></script>

    <script src="https://leaflet.github.io/Leaflet.heat/dist/leaflet-heat.js"></script>

    <script src="https://leaflet.github.io/Leaflet.markercluster/example/realworld.388.js"></script>

    <script>
        // 1) Pull your PHP $cells into JS once
        const cells = {!! json_encode($this->mapCells) !!};

        console.log(cells);

        document.addEventListener('livewire:navigated', () => {
            var map = L.map('map').setView([51.184185, 4.444946], 16);

            var tiles = L.tileLayer(
                'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                {
                    attribution:
                        '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
                },
            ).addTo(map);

            addressPoints = addressPoints.map(function (p) {
                return [p[0], p[1]];
            });

            let addressPoints2 = cells.map((p) => {
                return [p.lng, p.lat];
            });

            var heat = L.heatLayer(addressPoints2).addTo(map),
                draw = true;

            /*

            // 2) Initialize the map
            const map = L.map('map').setView([51.184185, 4.444946], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const bounds = cells.map(({lat, lng}) => [
                [lat, lng],
                [lat + 0.1, lng + 0.1]
            ]);
            map.fitBounds(bounds.flat(), {padding: [20, 20]});

            // 2) Plain JS loop
            cells.forEach(({lat, lng, count}) => {
                L.rectangle(
                    [[lat, lng], [lat + 0.1, lng + 0.1]],
                    {
                        weight: 0,
                        fillColor: 'red',
                        fillOpacity: Math.min(0.8, 0.3 + count / 10)
                        //fillOpacity: Math.min(0.8, 0.1 + count / 50)
                    }
                ).addTo(map);
            });

            map.on('click', e => {
                L.popup()
                    .setLatLng(e.latlng)
                    .setContent(`You clicked at ${e.latlng.toString()}`)
                    .openOn(map);
            });

             */
        });
    </script>
@endpush