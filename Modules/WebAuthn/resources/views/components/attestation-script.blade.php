@script
<script>
    Livewire.on('passkeyPropertiesValidated', async function (eventData) {
        const optionsJSON = eventData[0].passkeyOptions;


        try {
            const passkey = await startRegistration({ optionsJSON });
            @this.call('storePasskey', JSON.stringify(passkey));

        } catch (error) {
            @this.call('passkeyFailed', error.message);
        }
    });
</script>
@endscript
