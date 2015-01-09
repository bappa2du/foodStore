<?php
    $footer = $this->requestAction('webpages/getmenu/');
    #var_dump($footer); die();
?>
<div id="footer">
    <div class="upper-footer">
        <div class="container">
            <div class="container">
                <?php foreach($footer as $key => $cate)
                {
                    #var_dump($foo); die();
                    if($key == 2)
                    {
                        break;
                    } ?>

                    <div class="col-md-6">
                        <h4><?php echo $cate['Category']['title'] ?></h4>
                        <ul class="nav">
                            <?php
                                foreach($cate['Webpage'] as $key => $page)
                                {
                                    #var_dump($page); die();
                                    echo '<li>' . $this->Html->link($page['title'], array('controller' => 'webpages', 'action' => 'view', $page['id']), array('class' => 'ajaxlink', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'view', $page['id'], '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')) . '</li>';
                                }
                            ?>
                        </ul>
                    </div>
                <?php } ?>
                <!--
                <div class="col-md-6">
                    <h4>Key Features</h4>
                    <ul class="nav">
                        <li><a href="#">Representative</a></li>
                        <li><a href="#">Rewards Scheme</a></li>
                    </ul>
                    <h4>Follow Us</h4>
                    <a href="#"> <img alt="" src="/myshop/theme/Myshop/img/ficon.png?1398556514"> </a> &nbsp;&nbsp;
                    <a href="#"> <img alt="" src="/myshop/theme/Myshop/img/ticon.png?1398556514"> </a> &nbsp;&nbsp;
                    <a href="#"> <img alt="" src="/myshop/theme/Myshop/img/licon.png?1398556514"> </a> &nbsp;&nbsp;
                    <a href="#"> <img alt="" src="/myshop/theme/Myshop/img/micon.png?1398556514"> </a>
                </div>
                -->
                <div class="col-md-6">
                    <h4>Get Our Mobile App</h4>
                    <?php echo $this->Html->link($this->Html->image('/img/app.png?1398628962'), '#', array('escape' => false));

                        echo '<br><br>' . $this->Html->link($this->Html->image('/img/googleplay.png?1398628956"'), '#', array('escape' => false));
                    ?>
                </div>
                <div class="col-md-6">
                    <h4>Quick Contact</h4>
                    <?php

                        echo $this->Form->create(null, array('class' => 'form-inline',
                                                             'url'   => array('controller' => 'webpages', 'action' => 'quickmail')
                        )); ?>
                    <input type="text" name="qname" class="form-control contact-box" placeholder="Name">
                    <input type="text" name="qemail" class="form-control contact-box" placeholder="Email">
                    <textarea name="qcomment" class="form-control  contact-box"></textarea>
                    <?php
                        echo $this->Form->submit('Submit', array('class' => 'btn btn-sm btn-success pull-right'));
                    ?>
                    <!-- <form class="form-inline" role="form">
                         <input type="text" class="form-control contact-box" placeholder="Name">
                         <input type="text" class="form-control contact-box" placeholder="Email">
                         <textarea class="form-control  contact-box"></textarea>
                         <input type="submit" value="Submit" class="btn btn-sm btn-success pull-right">
                     </form> -->
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <ul class="nav navbar-nav pull-left">
                <li style="padding-top: 16.5px;">&copy; 2013-2014 tappware.com solution | Baridhara, DOHS, Dhaka</li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <?php
                        echo $this->Html->link(
                            'Home', '/', array('class' => '', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'home', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
                        );
                    ?>
                </li>
                <li>
                    <?php
                        echo $this->Html->link(
                            'Contact', '#', array('class' => '', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'view', '53a5ace3-8d3c-4b29-bbb8-1864fcf384cf', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
                        );
                    ?>
                </li>
                <li>
                    <?php
                        echo $this->Html->link(
                            'Site Map', '#', array('class' => '', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'view', '53a5adfb-ed2c-4752-92b5-1864fcf384cf', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
                        );
                    ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--<footer class="footer-one">
    <div class="container">
<?php foreach($categories as $category): ?>
                                <div class="col-md-3" style="padding: 10px">
                                    <b class="hd"><?php echo h($category['Category']['title']); ?></b><br>

    <?php foreach($category['Webpage'] as $webpage): ?>
        <?php echo $this->Html->image('flicon.png'); ?> <a href="#"><?php echo $webpage['title']; ?></a><br>
    <?php endforeach; ?>
                                </div>
<?php endforeach; ?>

        <div class="col-md-3" style="padding: 10px">
            <b class="hd">Get Our Mobile App</b><br>
            <a href="#"> <?php echo $this->Html->image('app.png'); ?> </a><br><br>
            <a href="#"> <?php echo $this->Html->image('googleplay.png'); ?> </a><br>
        </div>
        <div class="col-md-3" style="padding: 10px">
            <b class="hd">Quick Contact</b><br><br>

            <form>
                <input type="text" class="col-md-6 contact-box">
                <input type="text" class="col-md-6 contact-box">
                <textarea class="col-md-12 contact-box"></textarea>
                <input type="submit" class="btn btn-sm btn-success pull-right" value="Submit">
            </form>
        </div>
    </div>
</footer>

<footer style="background-color: #005526">
    <div class="container">
        <ul class="nav navbar-nav pull-left">
            <li><a href="#">&copy 2013-2014 tappware.com solution | Baridhara, DOHS, Dhaka </a></li>
        </ul>

        <ul class="nav navbar-nav pull-right">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Site Map</a></li>
        </ul>
    </div>
</footer>-->