<footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Sistema de Gerenciamento de Produtos</p>
            <p><small>Desenvolvido com <i class="fas fa-heart" style="color:#f56565;"></i> por Nossa Equipe</small></p>
        </div>
    </footer>
    <script>
        // Add fadeout effect to alerts after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            if (alerts.length > 0) {
                setTimeout(function() {
                    alerts.forEach(function(alert) {
                        alert.style.opacity = '0';
                        alert.style.transition = 'opacity 0.5s';
                        setTimeout(function() {
                            alert.style.display = 'none';
                        }, 500);
                    });
                }, 3000);
            }
        });
    </script>
</body>
</html>