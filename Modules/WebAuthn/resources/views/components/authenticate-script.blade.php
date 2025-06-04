@script
    <script>
        Livewire.on('passkeyProperties', async function (eventData) {

            console.log(eventData[0].optionsJSON)

            try {
                const optionsJSON = JSON.parse(eventData[0].optionsJSON);
                const answer = await startAuthentication({
                    optionsJSON,
                    useBrowserAutofill: false,       // ← this sets mediation: 'conditional'
                    verifyBrowserAutofillInput: false
                });
                @this.call('authenticatedWithPasskey', JSON.stringify(answer));
            } catch (err) {
                console.error('WebAuthn error:', err);
                // Toaster::success('path.to.translation', ['replacement' => 'value']);
                // optionally emit a Livewire toast event here
            } finally {

            }
        })
    </script>
@endscript
