<div class="container">
    <hr>
<div class="row">
        <div class="col-md-24">
            <div class="bannerImg">
                <?php
                echo $this->Html->image('/files/restaurant/photo/' . $restaurant['Restaurant']['id'] . '/' . $restaurant['Restaurant']['photo'], array ('class' => 'img-responsive', 'alt' => 'Rasturant Name'));
                ?>
            </div>
        </div>
    </div>
    <?php
    echo $this->element('restarurant_block', array ('restaurant' => $restaurant, 'viewDetails' => false));
    ?>

    <div class="row">
        <div class="col-sm-18">
            <div class="panel panel-myshop">
                <div class="panel-heading">
                    Menu
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nav nav-tabs restaurant-cuisine">
                                <?php
                                if (!empty($menus)) {
                                    foreach ($menus as $key => $menu) {
                                        ?>
                                        <li class="<?php echo empty($key) ? 'active' : ''; ?>"><a href="#<?php echo $menu['Menu']['id']; ?>" data-toggle="tab"><?php echo $menu['Menu']['name']; ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-sm-18">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <?php
                                if (!empty($menus)) {
                                    foreach ($menus as $key => $menu) {
                                        ?>
                                        <div class="tab-pane <?php echo empty($key) ? 'active' : ''; ?>" id="<?php echo $menu['Menu']['id']; ?>">
                                            <h3><?php echo $menu['Menu']['name']; ?></h3>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-24">
                                                    <div class="menuBanner">
                                                        <?php
                                                        echo $this->Html->image('/files/menu/photo/' . $menu['Menu']['id'] . '/' . $menu['Menu']['photo'], array ('class' => 'img-responsive', 'alt' => $menu['Menu']['name']));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <table class="table table-responsive">
                                                <colgroup style="width: 10%"></colgroup>
                                                <colgroup style="width: 60%"></colgroup>
                                                <colgroup style="width: 20%;"></colgroup>
                                                <colgroup style="width: 10%"></colgroup>
                                                <?php
                                                if (!empty($menu['Food'])) {
                                                    foreach ($menu['Food'] as $food) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                echo $this->Html->image('/files/Food/photo/' . $food['Food']['id'] . '/' . $food['Food']['photo'], array ('class' => 'img-responsive foodIcon', 'alt' => $food['Food']['name']));
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $food['Food']['name']; ?>
                                                            </td>
                                                            <td class="txtrt">
                                                                &pound; <?php echo $food['Food']['price']; ?>
                                                            </td>
                                                            <td class="txtrt">
                                                                <button class="btn btn-success btn-xs btnAddToCurt" data-food-id="<?php echo $food['Food']['id']; ?>">+</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php
//                    debug($menus);
//                    if (!empty($menus)) {
//                        foreach ($menus as $menu) {
//                            if (!empty($menu['Menu'])) {
//                                foreach ($menu['Menu'] as $food) {
//                                    echo $menu['Menu']['name'];
//                                }
//                            }
//                        }
//                    }
                    ?>
                    <!-- Nav tabs -->




                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-myshop">
                <div class="panel-heading">
                    My Order
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td> Minimum Order </td>
                            <td class="text-right"> £ 20 </td>
                        </tr>
                        <tr>
                            <td>Delivery Charge</td>
                            <td class="text-right"> £ 0 </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>

                    <div id="cartContent">

                    </div>

                </div>
                <div class="panel-footer txtrt">
                    <?php
                    echo $this->Html->link('Checkout', array ('controller' => 'orders', 'action' => 'checkout'), array ('class' => 'btn btn-success ajaxlink', 'id' => 'CheckoutBtn', 'escape' => false, 'data-href' => Router::url(array('controller'=>'orders', 'action' => 'checkout', '?'  => array('layout'=>'ajax'))), 'data-holder' => '#ajaxPage'));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        OrderObj.updateCart('display', '', '<?php echo $restaurant['Restaurant']['id']; ?>');
    });
</script>
