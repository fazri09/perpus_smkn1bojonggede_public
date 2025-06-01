<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        const base_url = "<?= base_url() ?>";
    </script>

    <meta charset="utf-8" />
    <title><?= isset($title) ? $title : 'Dashboard'; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <link href="<?= base_url('assets/libs/simple-datatables/style.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Sweet Alert -->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/animate.css/animate.min.css" rel="stylesheet" type="text/css">
</head>
<body>
