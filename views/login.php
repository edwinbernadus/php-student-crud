<?php $bodyClass = 'login-page'; $styles = ['login.css']; require __DIR__ . '/partials/head.php'; ?>

<main class="login">
    <form class="login-card" method="post" action="login.php" novalidate>
        <h1 class="login-title"><?= e(APP_NAME) ?></h1>
        <p class="login-sub">Kredensial sudah terisi — tinggal klik Masuk.</p>

        <?php if ($error !== ''): ?>
            <div class="alert"><?= e($error) ?></div>
        <?php endif; ?>

        <label class="field">Username
            <input class="input" name="username" type="text" value="<?= e($username) ?>" autocomplete="username" required>
        </label>

        <label class="field">Password
            <input class="input" name="password" type="password" value="<?= e($prefillPassword) ?>" autocomplete="current-password" required>
        </label>

        <button class="btn primary block" type="submit">Masuk</button>
    </form>
</main>

<?php require __DIR__ . '/partials/foot.php'; ?>
