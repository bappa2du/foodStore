<div class="container">
    <h3>Popular Restaurant</h3>

    <div class="row">
        <?php
            foreach($restaurants as $restaurant)
            {
                ?>
                <div class="col-sm-8 col-xs-12 gallery-block">
                    <div class="gallery-content">
                        <div class="gallery_play">
                            <p><?php echo $this->Html->link($restaurant['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'details', $restaurant['Restaurant']['id']), array('class' => '', 'escape' => false, 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'details', $restaurant['Restaurant']['id'], '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); ?></p>
                        </div>
                        <?php
                            echo $this->Html->image('/files/restaurant/photo/' . $restaurant['Restaurant']['id'] . '/' . $restaurant['Restaurant']['photo'], array('class' => 'img-responsive', 'alt' => 'Rasturant Name'));
                        ?>
                    </div>
                    <!--<div class="gallery-title">Restaurant name</div>-->
                </div>
            <?php
            }
        ?>
        <!--        <div class="col-sm-4 col-xs-6 gallery-block">
                    <div class="gallery-content">
                        <div class="gallery_play"></div>
                        <img class="img-responsive" src="images/gallery/campaign-management.jpg" alt="Video">
                    </div>
                    <div class="gallery-title">Campaign Management</div>
                </div>
                <div class="col-sm-4 col-xs-6 gallery-block">
                    <div class="gallery-content">
                        <div class="gallery_play"></div>
                        <img class="img-responsive" src="images/gallery/social-media.jpg" alt="Video">
                    </div>
                    <div class="gallery-title">Social Media</div>
                </div>
                <div class="col-sm-4 col-xs-6 gallery-block">
                    <div class="gallery-content">
                        <div class="gallery_play"></div>
                        <img class="img-responsive" src="images/gallery/search-engine-optimization.jpg" alt="Video">
                    </div>
                    <div class="gallery-title">Search Engine Optimization</div>
                </div>
                <div class="col-sm-4 col-xs-6 gallery-block">
                    <div class="gallery-content">
                        <div class="gallery_play"></div>
                        <img class="img-responsive" src="images/gallery/customer-service.jpg" alt="Video">
                    </div>
                    <div class="gallery-title">Customer Service</div>
                </div>
                <div class="col-sm-4 col-xs-6 gallery-block">
                    <div class="gallery-content">
                        <div class="gallery_play"></div>
                        <img class="img-responsive" src="images/gallery/search-engine-marketing.jpg" alt="Video">
                    </div>
                    <div class="gallery-title">Search Engine Marketing</div>
                </div>-->
    </div>
    <div class="row">
        <?php echo $this->Html->link('View All Restaurants &raquo;', array('controller' => 'restaurants', 'action' => 'index'), array('class' => 'pull-right', 'escape' => false)); ?>
    </div>
</div>