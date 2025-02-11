// Función para generar todas las horas del día con intervalos de quince minutos

function generarHoras(){
    var horas = [];
    for (var hora = 0; hora < 24;  hora++) {
        for (var minuto = 0; minuto < 60; minuto+=15) {
            horas.push(pad(hora)+ ':' + pad(minuto));
            
        }
    }
    return horas;
 }

// Función para agregar ceros a la izquierda si el número es menor que 10, por ejemplo las 09:15

 function pad(num){
    return (num<10 ? '0': '') + num;
 }



// Función para actualizar las horas para cada fila de la tabla
function actualizarHoras() {
    var horas = generarHoras();
    var selectHorasList = document.querySelectorAll('.selectHoras');
    

    // Limpiar las opciones anteriores
    selectHorasList.forEach(function(select) {
        select.innerHTML = '';
        var miHora= select.dataset.hora;

        // Agregar las nuevas opciones
        horas.forEach(function(hora) {
            var option = document.createElement('option');
            option.text = hora;
            option.value = hora;
            if (hora==miHora) {
                option.selected = true;
            }
            select.add(option);
            
            
        });
    });
}

// Ejecutar la función al cargar la página
actualizarHoras();

