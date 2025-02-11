$(document).ready(function () {
  function horarioRowTemplate(dia) {
    return `
    <tr>
        <td class="p-2"><strong>${
          dia.charAt(0).toUpperCase() + dia.slice(1)
        }</strong></td>
        <td class="p-2">De:</td>
        <td class="p-2">
            <select class="form-control selectHoras" name="${dia.toLowerCase()}[]"></select>
        </td>
        <td class="p-2">a:</td>
        <td class="p-2">
            <select class="form-control selectHoras" name="${dia.toLowerCase()}[]"></select>
        </td>
        <td class="p-2">
            <button class="btn btn-icon btn-icon-only btn-outline-primary mb-1 add-row-btn" type="button">
                <i data-acorn-icon="plus"></i>
            </button>
        </td>
        <td class="p-2">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="descanso_${dia.toLowerCase()}" />
                <label class="form-check-label">Es Día de Descanso</label>
            </div>
        </td>
    </tr>`;
  }

  function addNewHorarioRow(event) {
    const row = $(event.target).closest("tr");
    const new_row = row.clone();
    new_row.find("td:first").empty(); // Vaciar el primer td de la nueva fila
    new_row.find(".add-row-btn").remove();
    // Resetear los valores de los inputs, pero no de los selectores
    new_row.find("input[type='text']").val(""); 
    new_row.find("td:last").remove(); //eliminar el ultimo td

    // Agregar botón "X" para eliminar la fila clonada
    const removeButton = $("<button>")
      .addClass("btn-close remove-row-btn")
      .attr("type", "button");
    const td = $("<td>").addClass("p-2").append(removeButton);
    new_row.append(td);

    row.after(new_row);
     
  }

  // Event delegation for dynamically added rows
  $(document).on("click", ".add-row-btn", addNewHorarioRow);
});

// Event delegation for remove buttons
$(document).on("click", ".remove-row-btn", function () {
  $(this).closest("tr").remove();
});
