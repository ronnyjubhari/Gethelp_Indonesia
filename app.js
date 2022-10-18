if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
      navigator.serviceWorker.register('/sw.js').then(function(registration){
          console.log('Service Worker registered');
      }, function(err) {
          console.log('Service Worker registration failed');
      });
  });
}

// if ('serviceWorker' in navigator) {
//   caches.keys().then(function(cacheNames) {
//     cacheNames.forEach(function(cacheName) {
//       caches.delete(cacheName);
//     });
//   });
// }