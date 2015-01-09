<section id="takeway-online">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="takeway-bg" style="background-color: none;">
                    <h1 class="text-strock">ORDER YOUR TAKEAWAY ONLINE</h1>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 online">
                            <!--<ul>
                                <li class="user-info">
                                    <p>ENTER YOUR POSTCODE</p>
                                    <img src="Chefgenie/img/online-way.png" alt="order-pro" title="order-pro"/>
                                </li>
                                <li><img class="plus-symbol" src="Chefgenie/img/take-way-plus.png" alt="order-pro"
                                         title="order-pro"/></li>
                                <li class="user-info-2">
                                    <p>ORDER YOUR TAKEAWAY</p>
                                    <img src="Chefgenie/img/online-way.png" alt="order-pro" title="order-pro"/>
                                </li>
                                <li><img class="plus-symbol" src="Chefgenie/img/take-way-plus.png" alt="order-pro"
                                         title="order-pro"/></li>
                                <li class="user-info-3">
                                    <p>ENJOY</p>
                                    <img src="Chefgenie/img/online-way.png" alt="order-pro" title="order-pro"/>
                                </li>
                            </ul>-->
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 ">
                                    <div class="find-out">
                                        <div class="row">
                                            <div class="col-md-3"><p class="enter-code">ENTER YOUR<br>
                                                    <strong>POSTCODE</strong></p></div>
                                            <?php echo $this->Form->create('Restaurant', array('id' => 'RestaurantSearchFormPostCode', 'action' => 'search', 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'search', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); ?>

                                            <div class="col-md-5">
                                                <div class="form-group from-group-custome">
                                                    <?php
                                                        echo $this->Form->input('Search.postcode', array('div' => false, 'label' => false, 'type' => 'text', 'class' => 'form-control serach-box', 'placeholder' => "E.G AB1 0AA"));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-lg btn-danger btn-custome">FIND
                                                                                                                TAKEAWAY
                                                </button>
                                            </div>
                                            <?php echo $this->Form->end(); ?>
                                        </div>
                                    </div>
                                    <?php echo $this->Form->create('Restaurant', array('id' => 'RestaurantSearchFormPostCode', 'action' => 'search', 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'search', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); ?>

                                    <input type="text" id="lattitude" hidden="hidden" name="lattitude">
                                    <input type="text" id="longitude" hidden="hidden" name="longitude">


                                    <button class="btn btn-lg btn-danger" id="Recommend_btn"  style="display: none;border-radius: 0 0 5px 5px">RESTAURANTS IN MY AREA</button>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var x = document.getElementById('lattitude');
    var y = document.getElementById('longitude');
    var z = document.getElementById('Recommend_btn');
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);

        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.value = position.coords.latitude;
        y.value = position.coords.longitude;
        $("#Recommend_btn").slideDown();
//        $("#Recommend_btn").fadeIn(3000);
    }
    window.onload = function () {
        getLocation();
    }
</script>
