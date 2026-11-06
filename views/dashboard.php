<?php /** @var string $user */ /** @var string[] $genders */ /** @var int $perPage */ ?>
<?php $styles = ['dashboard.css']; require __DIR__ . '/partials/head.php'; ?>

<header class="appbar">
    <div class="appbar-brand">
        <h1><?= e(APP_NAME) ?></h1>
    </div>

    <div class="appbar-search">
        <span class="search-icon" aria-hidden="true">🔍</span>
        <input id="search" class="search-input" type="search" placeholder="Cari student" aria-label="Cari student">
    </div>

    <div class="appbar-actions">
        <button id="reset-btn" class="btn text" type="button">Reset</button>
        <span class="avatar" data-avatar="<?= e($user ?? '') ?>"></span>
        <a class="btn text" href="logout.php">Logout</a>
    </div>
</header>

<main class="container">
    <section class="toolbar">
        <div class="chips">
            <select id="filter-gender" class="input select">
                <option value="">Semua Jenis Kelamin</option>
                <?php foreach ($genders as $gender): ?>
                    <option value="<?= e($gender) ?>"><?= e($gender) ?></option>
                <?php endforeach; ?>
            </select>

            <select id="filter-desa" class="input select">
                <option value="">Semua Desa</option>
            </select>
        </div>

        <button id="add-btn" class="btn primary" type="button">+ Tambah Student</button>
    </section>

    <?php require __DIR__ . '/partials/table.php'; ?>

    <footer class="pager">
        <span id="pager-info" class="pager-info"></span>
        <div id="pager-pages" class="pager-pages"></div>
    </footer>
</main>

<?php require __DIR__ . '/partials/student-modal.php'; ?>

<script>window.APP_CONFIG = { perPage: <?= (int) $perPage ?> };</script>
<?php $scripts = ['app.js']; require __DIR__ . '/partials/foot.php'; ?>
