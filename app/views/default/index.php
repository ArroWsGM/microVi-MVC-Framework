<?php
if(file_exists(__DIR__ . '/../partials/header.php'))
    include_once(__DIR__ . '/../partials/header.php');
?>

<div class="container">

    <h1>
        <?php if(is_object($welcome))
                echo $welcome->text;
        ?>
    </h1>
    <h3 class="mbot-25">Tiny MVC framework powered by <a href="https://laravel.com/docs/5.3/eloquent" rel="nofollow" target="_blank">Eloquent ORM</a></h3>
    
    <p class="lead">Is there something in <code>$strings</code>?</p>
    <?php if(!$strings->isEmpty()): ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Yep, there is!</h3>
                </div>
                <div class="panel-body">
                    <?php foreach($strings as $string): ?>
                        <p><?php echo $string->text ?> <a href="<?php echo url('home/destroy/' . $string->id) ?>" class="btn btn-xs btn-danger pull-right">Delete</a></p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <p>Nope...(</p>
    <?php endif ?>
    
    <div class="row mtop-50">
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo url('home/store') ?>" method="POST">
                <div class="form-group">
                    <label for="text">Add some into <code>$strings</code></label>
                    <input type="text" class="form-control" name="text" id="text" placeholder="Text" value="<?php echo flash_get('old_input')['message'] ?>">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row mtop-50">
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo url('home/update/' . $welcome->id) ?>" method="POST">
                <div class="form-group">
                    <label for="text">Want more? Change welcome message</label>
                    <?php
                        $value = flash_get('old_input2')['message'];
                        $value = $value ? $value : $welcome->text;
                    ?>
                    <input type="text" class="form-control" name="text" id="text" placeholder="Text" value="<?php echo $value ?>">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

<?php
if(file_exists(__DIR__ . '/../partials/footer.php'))
    include_once(__DIR__ . '/../partials/footer.php');
?>