<section id="restuarents">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="sub-title text-center">POPULAR RESTAURANT</h2>

                <div class="divider">&nbsp;</div>
            </div>
        </div>
        <div class="row popular popular-restaurant">
            <?php foreach($restaurants as $key => $restaurant)
            { ?>

                <?php //echo $key;?>
                <div class="col-md-3 <?php if($key == 4) echo "rest-margin"; ?>">
                    <a href="<?php echo $this->webroot . 'restaurants/details/' . $restaurant['Restaurant']['id'] ?>">
                        <div class="rest-box">
                            <?php
                                echo $this->Html->image('/files/restaurant/photo/' . $restaurant['Restaurant']['id'] . '/' . $restaurant['Restaurant']['photo'], array('width' => '80', 'height' => '60', 'alt' => $restaurant['Restaurant']['name']));
                            ?>

                            <h3>
                                <?php echo $restaurant['Restaurant']['name'] ?>
                            </h3>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="divider"></div>

        <div class="row graybg">
            <div class="col-md-8">
                <div class="containfirst">
                    <div class="containsec takewaycuisines">
                        <h2 class="sub-title text-center">BEST TAKEAWAY CUISINES</h2>

                        <div class="divider">&nbsp;</div>
                        <br/>

                        <div class="row">
                            <?php foreach($foods as $food): ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="cuisines">
                                        <h4><?php echo $food['Food']['name']; ?></h4>

                                        <div class="imgbox">
                                            <?php
                                                echo $this->Html->image('/files/food/photo/' . $food['Food']['id'] . '/' . $food['Food']['photo'], array('class' => 'img-responsive', 'alt' => $food['Food']['name']));
                                            ?>
                                            <span class="price">$<?php echo $food['Food']['price']; ?></span>
                                        </div>
                                        <div class="caption">
                                            <p>
                                                <?php
                                                    echo $this->Text->truncate($food['Food']['description'], 50, array(
                                                            'ellipsis' => '...',
                                                            'exact'    => false
                                                        )
                                                    );
                                                ?>
                                            </p>
                                            <?php
                                            $user = $this->UserAuth->getUser();
                                            if(empty($user))
                                            {
                                             echo $this->Html->link('Read More', array('controller' => 'foods', 'action' => 'guestview', $food['Food']['id']), array('class' => 'btn btn-danger btn-block', 'data-href' => Router::url(array('controller' => 'foods', 'action' => 'guestview', $food['Food']['id'], '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); 
                                            }else{
                                            echo $this->Html->link('Read More', array('controller' => 'foods', 'action' => 'view', $food['Food']['id']), array('class' => 'btn btn-danger btn-block', 'data-href' => Router::url(array('controller' => 'foods', 'action' => 'view', $food['Food']['id'], '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); 
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <br/>

                        <div class="divider">&nbsp;</div>
                        <br/>
                        <a href="<?php echo $this->webroot . 'foods' ?>" class="btn btn-default btn-block">
                            More Takeaway Cuisines
                        </a>
                        <br/>

                        <p class="text-center go-top"><img src="Chefgenie/img/top.png" width="5" height="6"/>go back to
                                                                                                             the top.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 specialoffer">
                <div class="containfirst">
                    <div class="containsec">
                        <h2 class="sub-title text-center">SPECIAL OFFER</h2>

                        <div class="divider">&nbsp;</div>
                        <br/>

                        <div class="offer">
                            <div class="datetime"><span class="glyphicon glyphicon-time"></span>
                                <span> July 15, 2013 • 12:00 AM </span>
                            </div>
                            <h5>Maecenas tincidunt quam</h5>

                            <p>Curabitur est libero, condimentum a malesuada at, faucibus eu neque. Sed sodales luctus
                               tortor</p>
                            <a href="#" class="readmore">+ Read more</a>
                            <br/>

                            <div class="divider">&nbsp;</div>
                        </div>
                        <div class="offer">
                            <div class="datetime"><span class="glyphicon glyphicon-time"></span>
                                <span> July 15, 2013 • 12:00 AM </span>
                            </div>
                            <h5>Maecenas tincidunt quam</h5>

                            <p>Curabitur est libero, condimentum a malesuada at, faucibus eu neque. Sed sodales luctus
                               tortor</p>
                            <a href="#" class="readmore">+ Read more</a>
                            <br/>

                            <div class="divider">&nbsp;</div>
                        </div>
                        <a href="#" class="btn btn-default btn-block">More Special Offer</a>
                        <br/>

                        <p class="text-center go-top"><img src="Chefgenie/img/top.png" width="5" height="6"/>go back to
                                                                                                             the top.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
