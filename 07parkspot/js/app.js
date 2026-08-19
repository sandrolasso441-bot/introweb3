document.addEventListener('DOMContentLoaded', () => {
  const parkingForm = document.getElementById('parkingForm');
  const parkingTableBody = document.getElementById('parkingTableBody');
  const alertContainer = document.getElementById('alertContainer');
  const totalVehiclesBadge = document.getElementById('totalVehicles');
  const emptyRow = document.getElementById('emptyRow');

  let activeCount = 0;

  // Establecer hora actual por defecto en el campo de entrada
  const entryTimeInput = document.getElementById('entryTime');
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  entryTimeInput.value = `${hours}:${minutes}`;

  // Escuchar envío del formulario
  parkingForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const plate = document.getElementById('plate').value.trim().toUpperCase();
    const vehicleType = document.getElementById('vehicleType').value;
    const owner = document.getElementById('owner').value.trim();
    const entryTime = document.getElementById('entryTime').value;

    // Validación Básica
    if (!plate || !vehicleType || !owner || !entryTime) {
      showAlert('Por favor, complete todos los campos del formulario.', 'warning');
      return;
    }

    // Remover fila de estado vacío si existe
    if (emptyRow && emptyRow.parentNode) {
      emptyRow.remove();
    }

    // Crear una fecha completa de ingreso para cálculo exacto
    const entryDate = new Date();
    const [timeHours, timeMinutes] = entryTime.split(':');
    entryDate.setHours(parseInt(timeHours, 10), parseInt(timeMinutes, 10), 0, 0);

    // Crear nueva fila dinámica
    const tr = document.createElement('tr');
    tr.dataset.entryTimestamp = entryDate.getTime();

    tr.innerHTML = `
      <td><span class="badge bg-secondary font-monospace fs-6">${plate}</span></td>
      <td>${vehicleType}</td>
      <td>${owner}</td>
      <td><i class="bi bi-clock me-1"></i>${entryTime}</td>
      <td>
        <button class="btn btn-danger btn-sm btn-exit">
          <i class="bi bi-box-arrow-right me-1"></i>Dar Salida
        </button>
      </td>
    `;

    // Evento para botón "Dar Salida"
    const exitBtn = tr.querySelector('.btn-exit');
    exitBtn.addEventListener('click', () => {
      handleVehicleExit(tr, plate, entryDate);
    });

    parkingTableBody.appendChild(tr);

    // Actualizar contador y mostrar alerta de éxito
    activeCount++;
    updateVehicleCount();
    showAlert(`Vehículo con placa <strong>${plate}</strong> registrado con éxito.`, 'success');

    // Resetear formulario
    parkingForm.reset();
    entryTimeInput.value = `${hours}:${minutes}`;
  });

  // Función para procesar la salida y el cobro
  function handleVehicleExit(rowElement, plate, entryDate) {
    const exitDate = new Date();

    // Si la hora de salida es antes que la de ingreso (ej. cambio de día), ajustar
    if (exitDate < entryDate) {
      exitDate.setDate(exitDate.getDate() + 1);
    }

    // Diferencia en minutos
    const diffMs = exitDate - entryDate;
    const totalMinutes = Math.max(1, Math.floor(diffMs / (1000 * 60)));

    // Cálculo de tarifa: 50 centavos ($0.50) por media hora (30 min) o fracción
    const halfHourBlocks = Math.ceil(totalMinutes / 30);
    const amountDue = (halfHourBlocks * 0.50).toFixed(2);

    // Formatear el tiempo de permanencia
    const hoursParked = Math.floor(totalMinutes / 60);
    const minutesParked = totalMinutes % 60;
    let timeText = '';
    if (hoursParked > 0) {
      timeText += `${hoursParked} hora(s) `;
    }
    timeText += `${minutesParked} minuto(s)`;

    // Eliminar fila de la tabla
    rowElement.remove();
    activeCount--;
    updateVehicleCount();

    // Si no quedan vehículos, volver a mostrar el mensaje predeterminado
    if (activeCount === 0) {
      parkingTableBody.appendChild(emptyRow);
    }

    // Mostrar alerta con tiempo y monto a pagar
    showAlert(
      `<strong>Salida de Vehículo [${plate}]:</strong><br>` +
      `• Tiempo de permanencia: ${timeText}<br>` +
      `• Total a pagar: <strong>$${amountDue} USD</strong>`,
      'info'
    );
  }

  // Función para actualizar contador de autos
  function updateVehicleCount() {
    totalVehiclesBadge.textContent = `${activeCount} Activo(s)`;
  }

  // Función para mostrar alertas Bootstrap temporales
  function showAlert(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show shadow-sm`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    alertContainer.appendChild(alertDiv);

    // Auto-eliminar la alerta después de 5 segundos
    setTimeout(() => {
      alertDiv.classList.remove('show');
      setTimeout(() => alertDiv.remove(), 150);
    }, 5000);
  }
});