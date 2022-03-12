const vapidPublicKey = $("meta[name=vapid_public_key]").attr('content');

registerServiceWorker();

function registerServiceWorker()
{
    if ('serviceWorker' in navigator && 'PushManager' in window)
    {
        navigator.serviceWorker.register('/js/service-worker.js')
            .then(registration => {
                registration.update().then(() => {
                    //
                });
            })
            .catch((error) => {
                console.error({error});
            });
    }
    else
    {
        console.warn('Service Worker and Push Messaging are not supported');
    }
}
