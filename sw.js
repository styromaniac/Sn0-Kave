// This is just a sample script. Paste your real code (javascript or HTML) here.
if ('this_is' == /an_example/) {
    of_beautifier();
} else {
    var a = b ? (c % d) : e[f];
} // Check if service workers are supported
if ('serviceWorker' in navigator) {
    const registration = await navigator.serviceWorker.ready;
    // Check if periodicSync is supported
    if ('periodicSync' in registration) {
        // Request permission
        const status = await navigator.permissions.query({
            name: 'periodic-background-sync',
        });
        if (status.state === 'granted') {
            try {
                // Register new sync every 24 hours
                await registration.periodicSync.register('news', {
                        minInterval: 24 * 60 * 60 * 1000, // 1 day        });        console.log('Periodic background sync registered!');
                    }
                    catch (e) {
                        console.error(`Periodic background sync failed:\n${e}`);
                    }
                }
            }
        }
