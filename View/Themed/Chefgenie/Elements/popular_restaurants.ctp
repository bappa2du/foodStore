
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
                
                    <a href="<?php echo $this->webroot . 'restaurants/details/' . $restaurant['Restaurant']['id'] ?>">
                        <div class="rest-box">
                            <?php
                                if(isset($restaurant['Restaurant']['photo']))
                                echo $this->Html->image('/files/restaurant/photo/' . $restaurant['Restaurant']['id'] . '/' . $restaurant['Restaurant']['photo'], array('width' => '80', 'height' => '60', 'alt' => $restaurant['Restaurant']['name']));
                                else
                                {
                                ?>
                                <img height="80" width="100" src="/img/restaurant.png" />
                                <?php 
                                }
                                ?>
                        </div>
                    </a>
                
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

                        <?php 
                        /*
                        echo "<pre>";
                        print_r($cusines);
                        echo "</pre>";
                        die();
                        */
                        ?>

                        <div class="row">
                            <?php foreach($order as $cusine): ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="cuisines">
                                        <a href="restaurants/index/Search_cuisines[0]:<?php echo $cusine['cusines_restaurants']['cusine_id'];?>">
                                            

                                            <div class="imgbox">
                                                <?php
                                                    if(!empty($cusine['cusines']['image']))
                                                    echo $this->Html->image('/files/cusine/image/' . $cusine['cusines_restaurants']['cusine_id'] . '/' . $cusine['cusines']['image'], array('class' => 'img-responsive', 'alt' => $cusine['cusines']['name']));
                                                    else
                                                    {
                                                ?>  
                                                    <img height="130" src="/cuisines/Chinese.jpg" />
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                            <span><?php echo $cusine['cusines']['name']; ?></span>
                                        </a>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="divider">&nbsp;</div>
                        <br/>
                        <a href="<?php echo $this->webroot . 'cusines' ?>" class="btn btn-default btn-block">
                            More Takeaway Cuisines
                        </a>
                        <br/>

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


                            <div class="divider">&nbsp;</div>
                        </div>
                        <a href="#" class="btn btn-default btn-block">More Special Offer</a>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
