# Sistema de Gestión de Reservas - Gourmet & Carbón

Este proyecto es una aplicación web responsiva diseñada bajo la arquitectura estándar de desarrollo frontend nativo (**HTML5, CSS3 y JavaScript Vanilla**), sin el uso de librerías o frameworks externos, dando estricto cumplimiento a los requisitos académicos del módulo de práctica.

## 📝 Descripción del Proceso de Negocio
El sistema automatiza de manera integral el flujo de reserva de mesas para un restaurante gourmet de alta cocina. Permite el control centralizado de los clientes en memoria viva del navegador, recopilando datos clave, analizando métricas de capacidad operativa en tiempo real mediante indicadores interactivos y facilitando la búsqueda inmediata.

## 🚀 Requisitos Técnicos Cumplidos
- **HTML**: Estructura semántica completa (`<header>`, `<nav>`, `<main>`, `<section>`, `<footer()`) dividida en 4 páginas completamente vinculadas a través de menús dinámicos.
- **CSS**: Arquitectura modular con variables CSS (`:root`), diseño fluido 100% responsivo basado en **Flexbox** y **CSS Grid Layout** con efectos visuales dinámicos de elevación (`hover`) y transiciones en botones.
- **JavaScript (CRUD Completo)**:
  - Registro, edición y eliminación inmediata de registros en memoria.
  - Búsqueda predictiva integrada al input.
  - Sistema de ordenamiento múltiple (por fecha cronológica, por volumen de comensales o alfabético).
  - Tres paneles estadísticos vivos (Total de reservas, sumatoria global de personas, conteo de perfiles VIP).
  - Validaciones robustas en el lado del cliente con captura inteligente de errores en pantalla.

## ✨ Funcionalidades Adicionales Implementadas
1. **Control Predictivo de Fechas Cronológicas**: El validador bloquea de forma interactiva e impide agendar reservas en el pasado, comparando la entrada con el timestamp del sistema en tiempo real.
2. **Mitigación y Sanitización Anti-XSS**: Implementación de una función auxiliar de escape HTML (`escapeHTML`) para prevenir vulnerabilidades de Cross-Site Scripting al renderizar entradas de texto en la tabla.

## 📂 Instrucciones de Ejecución
1. Descargue o extraiga la carpeta raíz `restaurante_sistema`.
2. Asegúrese de colocar su imagen de cabecera en la ruta: `img/banner.avif`.
3. Dé doble clic sobre el archivo `index.html` para abrirlo directamente en cualquier navegador moderno (Chrome, Edge, Firefox, Safari). No requiere de servidores web locales adicionales ya que procesa todo del lado del cliente.