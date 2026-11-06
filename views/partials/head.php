<?php /** @var string|null $title */ ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? APP_NAME) ?> · <?= e(APP_NAME) ?></title>
    <link rel="stylesheet" href="assets/css/base.css">
    <?php foreach (($styles ?? []) as $style): ?>
        <link rel="stylesheet" href="assets/css/<?= e($style) ?>">
    <?php endforeach; ?>
</head>
<body class="<?= e($bodyClass ?? '') ?>">
