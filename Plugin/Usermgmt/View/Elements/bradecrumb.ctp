<ol class="breadcrumb">
    <?php
        switch($page)
        {
            case 'login':
                ?>
                <li><?php echo $this->Html->link(__("Home", true), "/", array("escape" => false)) ?></li>
                <li class="active">Sign In</li>
                <?php
                break;
            default:

                break;
        }
    ?>
</ol>