<style>
    .restaurant-cuisine li a {
        font-size: 15px;
        font-weight: bold;
    }

    .foodName {
        font-size: 15px;

    }

    .foodPrice {
        font-size: 14px;
        font-weight: bold;
    }

    .myOrderIName {
        font-size: 12px;
        font-weight: bold;

    }

    #cartContent td {
        border: 0;
        padding-bottom: 0;
    }

    #cartContent .myOrderDetailCarted td {
        width: 33.33%;
        padding-bottom: 5px;
    }

    .offer-button {
        margin-top: 0px;
        margin-bottom: 0px;
        background: #ff6600;
        color: #fff;
        padding: 6px 5px;
        transform: rotate(-12deg);
        -ms-transform: rotate(-12deg); /* IE 9 */
        -webkit-transform: rotate(-12deg);
    }

    .btnAddToCurt, .btnDeleteFromCurt {
        padding: 5px 10px;
    }

    .offerBTH h4 {
        text-align: center;
    }

    .myOrderDetailCarted td:nth-child(1), .myOrderDetailCarted td:nth-child(2) {
        padding-top: 13px;
    }
</style>
<div class="container">
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li>Food</li>
    <li class="active"><?php echo h($food['Food']['name']); ?></li>
</ol>

<div class="panel panel-myshop">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-5">
                <div class="imgbox">
                    <?php
                        echo $this->Html->image('/files/food/photo/' . $food['Food']['id'] . '/' . $food['Food']['photo'], array('class' => 'thumbnail img-responsive','style'=>'width:390px;height:150px', 'alt' => $food['Food']['name']));
                    ?>

                </div>
            </div>
            <div class="col-sm-19">
                <table width="100%">
                    <tr>
                        <td width="1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <h2><?php echo h($food['Food']['name']); ?></h2>

                                        <strong>Description: </strong><br/>
                                        <p><?php echo h($food['Food']['description']); ?></p>
                                        <strong>Type of food:</strong>&nbsp;<br/>
                                        <?php echo $this->Html->link($food['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $food['Menu']['id'])); ?>
                                        <br/>
                                        <strong>Restaurant: </strong><br/>
                                        <?php echo $this->Html->link($food['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $food['Restaurant']['id'])); ?>
                                    </div>
                                    <br/>

                                </div>

                                <div class="col-lg-offset-2 col-lg-6">
                                    <div>
                                        <strong>In Store: </strong><br/>
                                        <span ><?php echo h($food['Food']['in_store']); ?></span>
                                    </div>
                                    <div>
                                        <strong>Quantity: </strong><br/>
                                        <span "><?php echo h($food['Food']['quantity']); ?></span>
                                    </div>
                                    <div>
                                        <strong>Price: </strong><br/>
                                        £<?php echo h($food['Food']['price']); ?>
                                    </div>
                                    <div>
                                        <strong>Rating:</strong><br/>
                                        <?php echo h($food['Food']['rattings']); ?>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>