{
  "name": "My extension",
  "manifest_version": 2,
  ...
  "permissions": ["notifications"],
  ...
  // Note: Because of bug 134315, you must declare any images you
  // want to use with createNotification() as a web accessible resource.
  "web_accessible_resources": ["48.png"],

  // Create a simple text notification:
var notification = webkitNotifications.createNotification(
  '48.png',  // icon url - can be relative
  'Hello!',  // notification title
  'Lorem ipsum...'  // notification body text
);

// Then show the notification.
notification.show();
}