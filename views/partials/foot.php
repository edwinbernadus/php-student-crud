<?php foreach (($scripts ?? []) as $script): ?>
    <script type="module" src="assets/js/<?= e($script) ?>"></script>
<?php endforeach; ?>
</body>
</html>
