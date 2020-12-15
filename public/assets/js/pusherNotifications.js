var notificationsWrapper = $('.new-order');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('div.newor');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-order');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<small>New Order</small>
<small>+data.time+ / +data.date+</small>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
