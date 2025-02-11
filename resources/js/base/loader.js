/**
 *
 * Loader
 * Adds a spinner class to the body if the DOMContentLoaded is not fired for 500 ms.
 * This prevents seeing a spinner on an already visited page.
 * 
 * el spinner se muestra agregando la clase CSS spinner al elemento <body>, 
 * lo que hará que se muestre un spinner animado en algún lugar de la interfaz de usuario 
 * para indicar que la página está en proceso de carga.
 *
 **/

(function () {
  let isContentLoaded = false;
  const timeoutId = setTimeout(() => {
    if (!isContentLoaded) {
      document.body.classList.add('spinner');
    }
  }, 500);

  window.addEventListener('DOMContentLoaded', (event) => {
    isContentLoaded = true;
  });
})();
