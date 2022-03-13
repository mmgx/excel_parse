self.addEventListener('push', e => {
    if (!(self.Notification && self.Notification.permission === 'granted'))
    {
        console.warn('notifications aren\'t supported or permission not granted!');

        return;
    }

    if (e.data) {
        const { title, ...options } = e.data.json();

        e.waitUntil(self.registration.showNotification(title, options));
    }
});

self.addEventListener('notificationclick', function (event) {

    var notification = event.notification;
    var data         = notification.data;
    var action       = event.action;

    if (action === 'close')
    {
        notification.close();
    }
    else if (action === 'new_task')
    {

        event.waitUntil(
            clients.openWindow(data.entry_url)
        );
    }
    else
    {
        event.waitUntil(
            clients.openWindow(data.base_url)
        );
    }
}, false);

self.addEventListener('notificationclose', function (event) {

    var notification   = event.notification;
    var notificationId = notification.tag;

    console.log(`Closed notification: ${notificationId}`);
});


