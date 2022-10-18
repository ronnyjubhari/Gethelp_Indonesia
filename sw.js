const cache_Name = 'cache-v1';

const urlToCache = [
  '/',
  '/app.js'
];

self.addEventListener('install', event => {
  // perform install steps
  event.waitUntil(
    caches.open(cache_Name)
      .then(cache => {
        console.log('Opened Cache');
        return cache.addAll(urlToCache);
      })
  );
});

self.addEventListener('activate', event => {
  var cacheWhitelist = cache_Name;
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => {
        if (response) {
          return response;
        }

        return fetch(event.request).then(response => {
            if (!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            var responseToCache = response.clone();

            caches.open(cache_Name).then(cache => {
                cache.put(event.request, responseToCache);
              });

            return response;
        });
      })
  );
});
