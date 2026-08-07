// Estado de la Aplicación en Memoria (Arreglo de Objetos)
let reservas = [
    { id: 1, cliente: "Carlos Mendoza", fecha: "2026-08-15", hora: "20:30", personas: 4, zona: "Terraza al Aire Libre", vip: true },
    { id: 2, cliente: "Ana María Silva", fecha: "2026-08-14", hora: "14:00", personas: 2, zona: "Salón Principal", vip: false },
    { id: 3, cliente: "Estudio Jurídico D&B", fecha: "2026-08-20", hora: "19:00", personas: 12, zona: "Salón Privado (VIP)", vip: true }
];

// Selectores del DOM
const form = document.getElementById('reserva-form');
const tbody = document.getElementById('reservas-tbody');
const searchInput = document.getElementById('search-input');
const sortSelect = document.getElementById('sort-select');

// Inputs del formulario
const idInput = document.getElementById('reserva-id');
const clienteInput = document.getElementById('cliente');
const fechaInput = document.getElementById('fecha');
const horaInput = document.getElementById('hora');
const personasInput = document.getElementById('personas');
const zonaInput = document.getElementById('zona');
const vipInput = document.getElementById('vip');

// Botones y Título dinámico
const formTitle = document.getElementById('form-title');
const btnSubmit = document.getElementById('btn-submit');
const btnCancel = document.getElementById('btn-cancel');

// Inicialización
document.addEventListener('DOMContentLoaded', () => {
    renderApp();
    
    // Event Listeners
    form.addEventListener('submit', handleFormSubmit);
    btnCancel.addEventListener('click', resetFormState);
    searchInput.addEventListener('input', renderApp);
    sortSelect.addEventListener('change', renderApp);
});

// --- RENDERIZADO PRINCIPAL (Actualiza UI sin recargar) ---
function renderApp() {
    let dataFiltrada = [...reservas];

    // 1. Buscar (Filtro por Cliente o Zona)
    const query = searchInput.value.toLowerCase().trim();
    if(query) {
        dataFiltrada = dataFiltrada.filter(r => 
            r.cliente.toLowerCase().includes(query) || 
            r.zona.toLowerCase().includes(query)
        );
    }

    // 2. Ordenar
    const criterio = sortSelect.value;
    dataFiltrada.sort((a, b) => {
        if (criterio === 'fecha') {
            return new Date(`${a.fecha}T${a.hora}`) - new Date(`${b.fecha}T${b.hora}`);
        } else if (criterio === 'personas') {
            return b.personas - a.personas; // Descendiente
        } else if (criterio === 'cliente') {
            return a.cliente.localeCompare(b.cliente);
        }
        return 0;
    });

    // 3. Dibujar Tabla
    tbody.innerHTML = '';
    if(dataFiltrada.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; color: var(--color-text-muted);">No se encontraron reservas disponibles.</td></tr>`;
    } else {
        dataFiltrada.forEach(r => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${escapeHTML(r.cliente)}</strong></td>
                <td>${r.fecha} a las ${r.hora}</td>
                <td>${r.personas} comensales</td>
                <td>${r.zona}</td>
                <td>${r.vip ? '<span class="badge-vip">VIP</span>' : '<span style="color:#aaa;">Estándar</span>'}</td>
                <td>
                    <button class="btn-edit" onclick="cargarEdicion(${r.id})">Editar</button>
                    <button class="btn-delete" onclick="eliminarReserva(${r.id})">Eliminar</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // 4. Actualizar Indicadores/Estadísticas
    actualizarEstadisticas();
}

// --- ACTUALIZAR INDICADORES (Mínimo 3 estadísticas) ---
function actualizarEstadisticas() {
    const totalReservas = reservas.length;
    const totalPersonas = reservas.reduce((sum, r) => sum + parseInt(r.personas), 0);
    const totalVIP = reservas.filter(r => r.vip).length;

    document.getElementById('stat-total').textContent = totalReservas;
    document.getElementById('stat-personas').textContent = totalPersonas;
    document.getElementById('stat-vip').textContent = totalVIP;
}

// --- VALIDACIÓN DE DATOS ---
function validarFormulario() {
    let esValido = true;
    
    // Limpiar errores previos
    document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');

    if (clienteInput.value.trim().length < 3) {
        document.getElementById('err-cliente').textContent = "El nombre debe tener al menos 3 caracteres.";
        esValido = false;
    }

    if (!fechaInput.value) {
        document.getElementById('err-fecha').textContent = "Seleccione una fecha válida.";
        esValido = false;
    } else {
        // [Funcionalidad Adicional 1]: Validar que la reserva sea futura o del día de hoy
        const hoy = new Date();
        hoy.setHours(0,0,0,0);
        const fechaReserva = new Date(fechaInput.value + 'T00:00:00');
        if(fechaReserva < hoy) {
            document.getElementById('err-fecha').textContent = "No se permiten reservas en fechas pasadas.";
            esValido = false;
        }
    }

    if (!horaInput.value) {
        document.getElementById('err-hora').textContent = "Seleccione una hora válida.";
        esValido = false;
    }

    const numPersonas = parseInt(personasInput.value);
    if (isNaN(numPersonas) || numPersonas < 1 || numPersonas > 20) {
        document.getElementById('err-personas').textContent = "El número de personas debe estar entre 1 y 20.";
        esValido = false;
    }

    if (!zonaInput.value) {
        document.getElementById('err-zona').textContent = "Seleccione una zona de preferencia.";
        esValido = false;
    }

    return esValido;
}

// --- PROCESAR ENVÍO (CREAR / EDITAR) ---
function handleFormSubmit(e) {
    e.preventDefault();

    if (!validarFormulario()) return;

    const id = idInput.value;
    const nuevaReserva = {
        id: id ? parseInt(id) : Date.now(), // ID Único por timestamp si es nuevo
        cliente: clienteInput.value.trim(),
        fecha: fechaInput.value,
        hora: horaInput.value,
        personas: parseInt(personasInput.value),
        zona: zonaInput.value,
        vip: vipInput.checked
    };

    if (id) {
        // Modo Edición: Actualizar registro existente
        const index = reservas.findIndex(r => r.id === parseInt(id));
        if (index !== -1) {
            // [Funcionalidad Adicional 2]: Confirmación elegante nativa previa antes de guardar cambios
            if(confirm("¿Está seguro de que desea guardar los cambios en esta reserva?")) {
                reservas[index] = nuevaReserva;
            } else {
                return;
            }
        }
    } else {
        // Modo Creación: Registrar nueva reserva
        reservas.push(nuevaReserva);
    }

    resetFormState();
    renderApp();
}

// --- PREPARAR EDICIÓN (Cargar datos al formulario) ---
window.cargarEdicion = function(id) {
    const reserva = reservas.find(r => r.id === id);
    if (!reserva) return;

    // Rellenar controles
    idInput.value = reserva.id;
    clienteInput.value = reserva.cliente;
    fechaInput.value = reserva.fecha;
    horaInput.value = reserva.hora;
    personasInput.value = reserva.personas;
    zonaInput.value = reserva.zona;
    vipInput.checked = reserva.vip;

    // Cambiar estado visual del formulario
    formTitle.textContent = "Modificar Reserva";
    btnSubmit.textContent = "Guardar Cambios";
    btnCancel.style.display = "inline-block";
    
    // Enfocar primer campo
    clienteInput.focus();
};

// --- ELIMINAR REGISTRO ---
window.eliminarReserva = function(id) {
    if (confirm("¿Está completamente seguro de eliminar esta reserva?")) {
        reservas = reservas.filter(r => r.id !== id);
        if(idInput.value == id) {
            resetFormState();
        }
        renderApp();
    }
};

// --- LIMPIAR FORMULARIO / RESTABLECER ---
function resetFormState() {
    form.reset();
    idInput.value = '';
    formTitle.textContent = "Nueva Reserva";
    btnSubmit.textContent = "Registrar Reserva";
    btnCancel.style.display = "none";
    document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');
}

// Helper para evitar inyecciones XSS básicas al renderizar texto del usuario
function escapeHTML(str) {
    return str.replace(/[&<>'"]/g, 
        tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
    );
}