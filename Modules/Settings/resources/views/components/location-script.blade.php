@script
    <script>
        document.addEventListener("livewire:navigated", () => {

            Livewire.on('requestLocation', async function () {

                if (!navigator.geolocation) {
                    return alert('Your browser does not support geolocation.');
                }

                navigator.geolocation.getCurrentPosition(
                    ({coords}) => {
                        @this.call('GeolocationPosition', coords)
                    },
                    error => {
                        console.log(error);

                        if (error.code === error.POSITION_UNAVAILABLE) {
                            alert('Location currently unavailable. Please move to an open area or try again in a moment.');
                        } else if (error.code === error.PERMISSION_DENIED) {
                            alert('Location permission was denied.');
                        } else if (error.code === error.TIMEOUT) {
                            alert('Location request timed out. Trying again in 5 seconds...');
                            setTimeout(() => Livewire.emit('requestLocation'), 5000);
                        } else {
                            console.error('Unexpected geolocation error:', error);
                        }
                        @this.call('GeolocationPositionError', error.message);
                    },
                    {enableHighAccuracy: true, timeout: 15000}
                );
            });
        })
    </script>
@endscript
