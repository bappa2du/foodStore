<?php

    $tfbbdDescription = __d('cake_dev', 'TFBBD');
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $tfbbdDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('/bootstrap/css/bootstrap.min');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container" class="page">
        <header id="header" class="container">
            <?php echo $this->element('front/header'); ?>
        </header>
        <div id="content" class="container">
            <div class="page-header">
                <p> page header goes here </p>
            </div>
            <div id="leftPane" class="col-md-2">
                <h1>Left Pane</h1>
            </div>
            <div id="rightPane" class="col-md-10">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <footer id="footer" class="container">
            <hr/>
            <?php echo $this->element('front/footer'); ?>
        </footer>
    </div>
    <?php echo $this->Html->script('lib/jquery-1.11.0.min'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap.min'); ?>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
