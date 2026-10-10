<?php
$pageTitle    = $pageTitle    ?? 'Batangas';
$bodyClass    = $bodyClass    ?? '';
$useBootstrap = $useBootstrap ?? true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="Book curated destination trips across the Philippines.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<?php if ($useBootstrap): ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php endif; ?>
  <link href="style.css" rel="stylesheet">
</head>
<body<?= $bodyClass !== '' ? ' class="' . e($bodyClass) . '"' : '' ?>>
