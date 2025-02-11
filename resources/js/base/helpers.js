/**
 *
 * Helpers
 * Static helper methods para tareas comunes
 *
 */

class Helpers {
  // A basic debounce function for events like resize, keydown and etc. se utiliza para limitar la frecuencia con la que una función se ejecuta en respuesta a un evento. Evita que una función se ejecute repetidamente mientras el evento sigue ocurriendo. Toma una función (func), un tiempo de espera en milisegundos (wait) y un booleano opcional (immediate) que indica si la función debe ejecutarse inmediatamente al principio del intervalo o al final.
  static Debounce(func, wait, immediate) {
    var timeout;
    return function () {
      var context = this,
        args = arguments;
      var later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  // Checks the given array and returns a value plus one from the greatest prop value
  static NextId(data, prop) {
    if (!data) {
      console.error('NextId data is null');
      return;
    }
    const max = data.reduce(function (prev, current) {
      if (+parseInt(current[prop]) > +parseInt(prev[prop])) {
        return current;
      } else {
        return prev;
      }
    });
    return parseInt(max[prop]) + 1;
  }

  // Fetches data from the path parameter and fires onComplete callback with the json formatted data
  //Este método realiza una solicitud HTTP GET al servidor para recuperar un archivo JSON desde la ruta especificada (path). Cuando se completa la solicitud, llama a la función de devolución de llamada (onComplete) con los datos JSON obtenidos.
  static FetchJSON(path, onComplete) {
    fetch(path)
      .then((response) => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response;
      })
      .then((response) => response.json())
      .then((data) => onComplete(data))
      .catch((error) => {
        console.error('Problem with the fetching JSON data: ', error);
      });
  }

  // Adds commas to thousand. Agrega comas a un número para separar los miles
  static AddCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }

  // If the project is run in a subdirectory and absolute-path is used, this function adds the data-url-prefix value defined in the html element to the paths.
  //corrige una ruta de URL si el proyecto se ejecuta en un subdirectorio y se utiliza una ruta absoluta. Utiliza el valor del atributo data-url-prefix definido en el elemento HTML para agregar un prefijo a la ruta si está presente. Si no hay un prefijo definido, simplemente devuelve la ruta sin cambios
  static UrlFix(paramPath) {
    const dataPrefix = document.documentElement.dataset.urlPrefix;
    if (!dataPrefix) {
      return paramPath;
    }
    const prefix = dataPrefix.endsWith('/') ? dataPrefix : `${dataPrefix}/`;
    const path = paramPath.startsWith('/') ? paramPath.slice(1, paramPath.length) : paramPath;
    return `${prefix}${path}`;
  }
}
