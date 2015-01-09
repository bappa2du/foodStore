<div class="container">
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-12 product-view">
            <h2><?php echo $Store['Store']['name']; ?></h2>
            <small class="address-line">
                <?php echo $Store['Store']['address']; ?>
            </small>
            <span class="glyphicon glyphicon-star gray pull-right"></span>
            <span class="glyphicon glyphicon-star gray pull-right"></span>
            <span class="glyphicon glyphicon-star green pull-right"></span>
            <span class="glyphicon glyphicon-star green pull-right"></span>
            <span class="glyphicon glyphicon-star green pull-right"></span>
            <hr>
            <div class="row">
                <div class="col-md-2 product-img">
                    <a href="#"><?php echo $this->Html->image('../' . $Store['Store']['logo'], array('alt' => 'Product', 'class' => 'img-responsive')); ?></a>
                </div>
                <div class="col-md-10">             <!-- bangladesh -->
                    <h4 class="product-dtl"><?php echo $Store['Store']['food_category']; ?></h4>
                    <h5 class="product-dtl"><span class="glyphicon glyphicon-time"></span>Opening Time:
                        <small><?php echo $Store['Store']['open_time']; ?> - <?php echo $Store['Store']['close_time']; ?></small>
                    </h5>
                    <h5 class="product-dtl"><span class="glyphicon glyphicon-shopping-cart"></span>Minimum Order:
                        <small> &pound; <?php echo $Store['Store']['min_order']; ?></small>
                    </h5>
                    <hr>
                    <span class="glyphicon glyphicon-map-marker"></span><span class="branch">
					<?php echo $Store['Store']['address']; ?>
                    <?php echo $Store['Store']['promo_text']; ?>
					</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row product-view" style="padding-top: 40px">
        <div class="col-md-9 catagories-bg">
            <div class="row">
                <div class="col-md-3 mid-padding">
                    <ul class="nav nav-tabs nav-pills nav-stacked catagories-menu-bg" id="orderTab">
                        <?php if (count($ProductCategories) < 6) {
                            for($i = 0; $i <= count($ProductCategories) - 1; $i++)
                            {
                                ?>
                                <li id="listdiv<?php echo $i ?>">
                                    <a href="" data-toggle="tab" id="listalert-<?php echo $i ?>" onclick="getValue($(this));"><?php echo trim($ProductCategories[ $i ]['ProductCategory']['product_category_name']); ?></a>
                                </li>

                            <?php
                            }
                        } else {
                            for($j = 0; $j <= 5; $j++)
                            {
                                ?>

                                <li id="listdiv<?php echo $j ?>">
                                    <a href="" id="listalert-<?php echo $j ?>" onclick="getValue($(this));"><?php echo $ProductCategories[ $j ]['ProductCategory']['product_category_name']; ?></a>
                                </li>
                            <?php } ?>

                        <li class="showall"><a href="#" id="showmore" onclick="showMore();">Show more </a></li>

                        <?php for($k = 6; $k <= count($ProductCategories) - 1; $k++)
                        { ?>
                            <li id="listdiv<?php echo $j ?>" class="allcat" style="display: none;">
                                <a href="#" id="listalert-<?php echo $k ?>" onclick="getValue($(this));"><?php echo $ProductCategories[ $k ]['ProductCategory']['product_category_name']; ?></a>
                            </li>
                        <?php } ?>

                        <li class="hideall" style="display: none;">
                            <a href="#" id="hide" onclick="showLess()">Show Fewer </a>
                            <?php } ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <!-- Tab panes -->
                    <div class="tab-content active" id="menu-div">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="order">
                <div class="order-title">
                    <h4>Your Order</h4>
                </div>
                <table class="table table-checkout">
                    <tr>
                        <td> Minimum Order</td>
                        <td class="text-right"> &pound; <?php echo $Store['Store']['min_order'] ?> </td>
                    </tr>
                    <tr>
                        <td>Delivery Charge</td>
                        <td class="text-right"> &pound; <?php echo $Store['Store']['delivery_charge'] ?> </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <!--	    <tr>
                           <td colspan="2"><b>Delivery Details</b></td>
                       </tr>
                       <tr>
                           <td colspan="3"><hr></td>
                       </tr>
                   -->
                    <tr>
                        <td colspan="3">
                            <table id="order_table_id" style="width: 100%">
                                <?php if(isset($orderMain) && !empty($orderMain))
                                {
                                    $orderItems = $orderMain['OrderItem'];
                                    foreach($orderItems as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="3"><b><?php echo $item['name']; ?></b></td>
                                        </tr>
                                        <tr class="cart-dot">
                                            <td style="width: 30%"> <?php echo $item['quantity']; ?> </td>
                                            <td class="text-right" style="width: 55%"> &pound; <?php echo $item['price']; ?> </td>
                                            <td class="text-right" id="img-order-i" style="width: 15%">
                                                <a href="#" id="<?php echo $item['id'] ?>" onclick="deleteOrderItem($(this)); return false;"><?php echo $this->Html->image('minus-button.png', array('alt' => 'Remove product from cart')); ?></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3"> No Order Yet</td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>

                    <?php if(!empty($orderMain))
                    { ?>
                        <tr>
                            <td class="total-text-bold">Total Pay</td>
                            <td class="text-right total-text-bold">
                                <span id="total_pay">&pound; <?php echo $orderMain['OrderMain']['total_price']; ?></span>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php } else
                    { ?>
                        <tr>
                            <td class="total-text-bold">Total Pay</td>
                            <td class="text-right total-text-bold"><span id="total_pay"> 0 </span></td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="3" class="text-center">
                            <?php if(!empty($orderMain) && $orderMain['OrderMain']['total_price'] >= $Store['Store']['min_order'])
                            { ?>
                                <button type="button" class="btn btn-success btn-md" id="btnChqout" onclick="startCheckout();">Go to checkout</button>
                            <?php } else
                            { ?>
                                <button type="button" class="btn btn-success btn-md disabled" id="btnChqout" onclick="startCheckout();">Go to checkout</button>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#orderTab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
<script>
function showMore() {
    $(".allcat").removeAttr("style");
    $(".showall").hide();
    $(".hideall").removeAttr("style");
}

function showLess() {
    $(".allcat").css("display", "none");
    $(".showall").show();
    $(".hideall").css("display", "none");
}
function loadStoreDetails(data) {
    var storeid = data.attr('id');
    APP_HELPER.ajaxSubmitDataCallback('ProductCategories/view/' + storeid, '', function (data) {
        $("#ajax-view-content").html(data);
    });
}

function getValue(data) {
    var id = data.attr('id');
    var arr = id.split('-');
    var liIndex = arr[1];

    $("li").removeClass('selected');
    $("#listdiv" + liIndex).addClass('selected');
    var value = $('#' + id).html().trim();


    APP_HELPER_VIEW.ajaxSubmitDataCallback('ProductCategories/getAllProductByCategoryIdAsJson/' + value, '', function (data) {

        if (data.length > 0) {

            var productcat = '<div class="tab-pane active">';
            productcat += '<div class="product-info">';
            productcat += '<h2 class="content-sub-title">' + data[0].ProductCategory.product_category_name + '</h2>';
            productcat += '<p class="content-sub-message">&nbsp;</p>';

            var producttotal = '<table class="table content-sub-table">';


            $.each(data, function (i, s) {


                producttotal += '<tr>';
                producttotal += '<td>' + s.Product.in_store + '</td>';
                producttotal += '<td>' + s.Product.product_description + '</td>';
                producttotal += '<td>' + s.Product.product_price + '</td>';
                producttotal += '<td class="text-center">';
                producttotal += '<a href="#" id="' + s.Product.id + '" onclick="getProductForOrder($(this));return false;">';
                producttotal += '<img alt="" src="<?php echo $this->webroot;?>img/plus-button.png" width="32" height="32" >';
                producttotal += '</a>';
                producttotal += '</td>';
                producttotal += '</tr>';

            });

            producttotal += '</table>';

        } else {

            var productcat = '<div class="tab-pane active">';
            productcat += '<div class="product-info">';
            productcat += '<h2 class="content-sub-title">' + value + '</h2>';
            productcat += '<p class="content-sub-message">&nbsp;</p>';

            var producttotal = '<table class="table content-sub-table">';
            producttotal += '<td colspan="5">No Product Available';
            producttotal += '</td>';
            producttotal += '</tr>';
            producttotal += '</table>';

        }

        var theDiv = document.getElementById("menu-div");
        theDiv.innerHTML = productcat + producttotal + '</div></div>';

    });
}

function getValue2(data) {
    var id = data.attr('id');
    var arr = id.split('-');
    var liIndex = arr[1];

    $("li").removeClass('selected');
    $("#listdiv" + liIndex).addClass('selected');
    var value = $('#' + id).html().trim();


    APP_HELPER_VIEW.ajaxSubmitDataCallback('ProductCategories/getAllProductByCategoryIdAsJson/' + value, '', function (data) {
        var producttotal = '<p>';
        producttotal += '<b>' + value + '';
        producttotal += '</b>';
        producttotal += '</p>';
        producttotal += '<table style="width: 100%;">';
        $.each(data, function (i, s) {
            var pname = s.Product.product_name;
            var pid = s.Product.id;
            var pdesc = s.Product.product_description;
            var pprice = s.Product.product_price;
            var subMenu = s.AddWithProduct;

            var str = '';
            str += '<tr style="border-bottom: 1px dashed #CDCDCD;">';
            str += '<td style="width: 50%;">';
            str += '<p>';
            str += '' + pname + '';
            str += '<p>';
            str += '<p style="font-size: 0.8em;">';
            str += '' + pdesc + '';
            str += '<p>';
            str += '</td>';

            if (subMenu.length == 0) {
                str += '<td style="text-align: right; width: 50%;"><span>' + pprice + '</span>';
                str += '<span><img alt="" src="<?php echo $this->webroot;?>img/plus.png" width="32" height="32" id="' + pid + '" onclick="getProductForOrder($(this));"> </span>';
                str += '</td>';
            }
            else {
                str += '<td style="width: 50%;">';
                str += '<table style="width: 100%;">';
                for (var k = 0; k <= subMenu.length - 2; k++) {
                    str += '<tr style="border-bottom: 1px dashed #CDCDCD;">';
                    str += '<td style="width: 50%;"><p>' + subMenu[k].add_product_name + '</p>';
                    str += '</td>';
                    str += '<td style="width: 50%; text-align: right;"><span>' + subMenu[k].add_product_price + '';
                    str += '</span><span><img alt=""';
                    str += 'src="<?php echo $this->webroot;?>img/plus.png"';
                    str += 'width="32" height="32"';
                    str += 'id="' + subMenu[k].id + '"';
                    str += 'onclick="getItemForOrder($(this));"> </span>';
                    str += '</td>';
                    str += '</tr>';
                }
                str += '<tr>';
                str += '<td style="width: 50%;"><p>' + subMenu[k].add_product_name + '</p>';
                str += '</td>';
                str += '<td style="width: 50%; text-align: right;"><span>' + subMenu[k].add_product_price + '';
                str += '</span><span><img alt=""';
                str += 'src="<?php echo $this->webroot;?>img/plus.png"';
                str += 'width="32" height="32"';
                str += 'id="' + subMenu[k].id + '"';
                str += 'onclick="getItemForOrder($(this));"> </span>';
                str += '</td>';
                str += '</tr>';
                str += '</table>';
                str += '</td>';
            }
            str += '</tr>';
            producttotal += str;

        });
        producttotal += '</table>';
        var theDiv = document.getElementById("menu-div");
        theDiv.innerHTML = producttotal;

    });
}


function getProductForOrder(data) {

    var productId = data.attr('id');
    APP_HELPER_VIEW.ajaxSubmitDataCallback('productCategories/addOrder/' + productId + '/product/<?php echo $OrderID;?>', '', function (result) {
        $("#total_pay").text(result.OrderMain.total_price);
        enableCheckout(result.OrderMain.total_price);
        var order = '';
        $.each(result.OrderItem, function (key, item) {
            var orderStr = '<tr>';
            orderStr += '<td colspan="3"><b>' + item.name + '</b></td>';
            orderStr += '</tr>';
            orderStr += '<tr class="cart-dot">';
            orderStr += '<td style="width: 30%">' + item.quantity + '</td>';
            orderStr += '<td class="text-right" style="width: 55%">&pound;' + item.price + '</td>';
            orderStr += '<td class="text-right" id="img-order-i" style="width: 15%">';
            orderStr += '<a href="#" id="' + item.id + '" onclick="deleteOrderItem($(this));return false;">';
            orderStr += '<?php echo $this->Html->image('minus-button.png', array('alt' => 'Remove product from cart'));?>';
            orderStr += '</a></td>';
            orderStr += '</tr>';
            order += orderStr;
        });

        var theDiv = document.getElementById("order_table_id");
        theDiv.innerHTML = order;

    });
}

function getItemForOrder(data) {
    var itemId = data.attr('id');
    APP_HELPER_VIEW.ajaxSubmitDataCallback('productCategories/addOrder/' + itemId + '/item/<?php echo $OrderID;?>', '', function (result) {
        $("#total_pay").text(result.OrderMain.total_price);
        enableCheckout(result.OrderMain.total_price);
        var order = '';
        $.each(result.OrderItem, function (key, item) {
            var orderStr = '<tr>';
            orderStr += '<td>' + item.name + '</td>';
            orderStr += '<td></td>';
            orderStr += '<td></td>';
            orderStr += '</tr>';
            orderStr += '<tr>';
            orderStr += '<td>' + item.quantity + '</td>';
            orderStr += '<td>' + item.price + '</td>';
            orderStr += '<td id="img-order-i"><img alt=""';
            orderStr += 'src="<?php echo $this->webroot . 'img/remove.png';?>" id="' + item.id + '"';
            orderStr += 'width="24" height="24" onclick="deleteOrderItem($(this));return false;"></td>';
            orderStr += '</tr>';
            order += orderStr;
        });

        var theDiv = document.getElementById("order_table_id");
        theDiv.innerHTML = order;
    });
}

function deleteOrderItem(data) {
    var itemId = data.attr('id');
    APP_HELPER_VIEW.ajaxSubmitDataCallback('productCategories/deleteOrderItem/' + itemId + '/<?php echo $OrderID;?>', '', function (result) {
        $("#total_pay").text(result.OrderMain.total_price);
        enableCheckout(result.OrderMain.total_price);
        if (result.type == 1) {
            var order = '';
            $.each(result.OrderItem, function (key, item) {
                var orderStr = '<tr>';
                orderStr += '<td colspan="3"><b>' + item.name + '</b></td>';
                orderStr += '</tr>';
                orderStr += '<tr class="cart-dot">';
                orderStr += '<td style="width: 30%">' + item.quantity + '</td>';
                orderStr += '<td class="text-right" style="width: 55%">&pound;' + item.price + '</td>';
                orderStr += '<td class="text-right" id="img-order-i" style="width: 15%">';
                orderStr += '<a href="#" id="' + item.id + '" onclick="deleteOrderItem($(this)); return false;">';
                orderStr += '<?php echo $this->Html->image('minus-button.png', array('alt' => 'Remove product from cart'));?>';
                orderStr += '</a></td>';
                orderStr += '</tr>';
                order += orderStr;
            });

            var theDiv = document.getElementById("order_table_id");
            theDiv.innerHTML = order;
        }
        else {
            var str = '<tr><td><p> No Order Yet </p></td></tr>';
            var theDiv = document.getElementById("order_table_id");
            theDiv.innerHTML = str;
        }
    });
}

function enableCheckout(totalPrice) {
    var minCharge = '<?php echo $Store['Store']['min_order'];?>';
    if (parseFloat(totalPrice) >= parseFloat(minCharge)) {
        $("#btnChqout").removeClass('disabled');
    }
    else {
        $("#btnChqout").addClass('disabled');
    }
}

function startCheckout() {
    if ($('button').hasClass('disabled')) {
        return false;
    }
    APP_HELPER_VIEW.ajaxSubmitData('orderMains/checkout/<?php echo $OrderID;?>');
}


$.fn.stars = function () {
    return $(this).each(function () {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
};

$(function () {
    var infobubble;
    $('span.stars').stars();
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $("#myshop_map").width("700px").height("350px").gmap3({
        map: {
            options: {
                center: [23.7646183, 90.4260528],
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.TERRAIN,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: true,
                scrollwheel: true,
                streetViewControl: true
            }
        },
        marker: {
            latLng: [23.7646183, 90.4260528],
            events: {
                mouseover: function (marker, event, context) {
                    if (infoBubble != null) {
                        infoBubble.close();
                    }

                    infoBubble = new InfoBubble({
                        maxWidth: 200,
                        shadowStyle: 1,
                        padding: 5,
                        borderRadius: 10,
                        arrowSize: 20,
                        borderWidth: 5,
                        borderColor: '#CCC',
                        disableAutoPan: true,
                        hideCloseButton: false,
                        arrowPosition: 50,
                        arrowStyle: 0
                    });
                    infoBubble.setContent('<b>' + "<?php echo $Store['Store']['name']; ?>" + '</b>'
                    + '<br/>' + "<?php echo $Store['Store']['address']; ?>"
                    + '<br/>'
                    + '<br/>' + "<?php echo $Store['Store']['phone']; ?>"
                    + '<br/>' + "<?php echo $Store['Store']['website']; ?>");
                    infoBubble.open($(this).gmap3('get'), marker);

                },
                mouseout: function () {

                }
            }
        },
    });


});

document.getElementById('listalert-0').click();
</script>