<?php
    /**
     *
     *
     * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
     * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
     *
     * Licensed under The MIT License
     * For full copyright and license information, please see the LICENSE.txt
     * Redistributions of files must retain the above copyright notice.
     *
     * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
     * @link          http://cakephp.org CakePHP(tm) Project
     * @package       app.View.Layouts
     * @since         CakePHP(tm) v 0.10.0.1076
     * @license       http://www.opensource.org/licenses/mit-license.php MIT License
     */

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
                <?php echo $this->element('front/page-header'); ?>
            </div>
            <div id="rightPane" class="col-md-12">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <footer id="footer" class="container">
            <hr/>
            <?php echo $this->element('front/footer'); ?>
            <pre>
				<?php echo $this->element('sql_dump'); ?>
            </pre>
        </footer>
    </div>
    <?php echo $this->Html->script('lib/jquery-1.11.0.min'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap.min'); ?>
</body>
</html>
