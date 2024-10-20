const VERSION = "2.03";
const CACHE = "pwamd";
const ARCHIVOS = [/*... archivos ...*/];

if (self instanceof ServiceWorkerGlobalScope) {
  self.addEventListener("install", (event) => {
    console.log("El service worker se está instalando.");
    self.skipWaiting();
    event.waitUntil(
      llenaElCache().catch((error) => {
        console.error("Error durante la instalación:", error);
      })
    );
  });

  self.addEventListener("fetch", (event) => {
    if (event.request.method === "GET") {
      event.respondWith(
        buscaLaRespuestaEnElCache(event).catch(() => {
          return new Response("Error al cargar la página", {
            status: 408,
            statusText: "Request Timeout"
          });
        })
      );
    }
  });

  self.addEventListener("activate", () => {
    console.log("El service worker está activo.");
  });
}

async function llenaElCache() {
  console.log("Intentando cargar caché:", CACHE);
  const keys = await caches.keys();
  await Promise.all(
    keys.map((key) => {
      if (key !== CACHE) {
        console.log("Borrando caché antiguo:", key);
        return caches.delete(key);
      }
    })
  );
  const cache = await caches.open(CACHE);
  await cache.addAll(ARCHIVOS);
  console.log("Cache cargado:", CACHE);
  console.log("Versión:", VERSION);
}

async function buscaLaRespuestaEnElCache(event) {
  const cache = await caches.open(CACHE);
  const request = event.request;
  const response = await cache.match(request, { ignoreSearch: true });
  if (!response) {
    return fetch(request);
  } else {
    return response;
  }
}
