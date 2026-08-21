<footer class="bg-white border-top p-3 text-muted text-center text-md-start d-flex flex-wrap justify-content-between align-items-center mt-auto">
            <div class="mb-2 mb-md-0">
                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#" class="text-decoration-none">TuEmpresa</a>.</strong> Todos los derechos reservados.
            </div>
            <div class="small">
                <b>Versión</b> 1.0.0
            </div>
        </footer>
    </div> <!-- /.main-content -->
</div> <!-- /.app-wrapper -->

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para colapsar Sidebar en móviles -->
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.querySelector('.main-sidebar').classList.toggle('show');
    });
</script>
</body>
</html>