<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($title) ? $title : 'microVi Framework' ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo url('css/styles.css') ?>">
</head>

<body>

<?php
    if(file_exists(__DIR__ . '/../partials/navbar.php'))
        include_once(__DIR__ . '/../partials/navbar.php');
?>

<div class="container">
<?php
    $flash = flash_get('flash');
    if(!empty($flash)):
?>
    <div class="row mtop-25 mbot-25">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-<?php echo $flash['status'] ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $flash['message'] ?>
            </div>
        </div>
    </div>
<?php endif ?>