<div class="row">
    <div class="col-md-6">
        <h1 class="heading"><?php echo count($stores) ?> Restaurants Available</h1>
    </div>
    <div class="col-md-6">
        <h5 class="pull-right" style="color:#CCCCCC; margin-top:33px;">
            <b style="color:#000000;">Sort by:<span style="color:#00CC66;"> Ratings</span></b> | Minimum Order Value Delivery free
        </h5>
    </div>
</div>
<div class="row">
    <div class="col-md-3 result">
        <h2>Advance Search Result</h2>
        <hr>
        <form role="form">
            <input id="selectedId" value="" type="hidden">
            <input id="postcode" value="<?php echo $zipcode; ?>" type="hidden">
            <label>Restaurant Name</label>

            <div class="input-group">
                <input type="text" class="form-control" id="cusine" placeholder="Restaurent Name">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </div>
            <hr>
            <label>Postcode</label> <br/>

            <div class="input-group">
                <input type="text" class="form-control" id="inputPostCode" placeholder="Postal-Code">
         <span class="input-group-btn"><button id="btnPostCode" class="btn" type="button"
                                               onclick="MYSHOP_STORE_VIEW.getStoresByPostCode();">
                 <i class="glyphicon glyphicon-search"></i>
             </button></span>
            </div>
            <hr>
            <div class="side-box" id="foodCategoryID">
                <h3 class="cuisines">Cuisines</h3>
                <ul>
                    <?php for($i = 0; $i <= 5; $i++)
                    { ?>
                        <li id="listdiv-<?php echo $i ?>">
                            <a id="listalert-<?php echo $i ?>" class="listalert" onclick="getValue($(this));" style="color: #000;">
                                <?php echo $foodlist[ $i ]['FoodCategory']['food_category_name']; ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="showall">
                        <a id="showmore" style="color: #00B6E4;" onclick="showMore();">
                            <span>Show more »</span>
                        </a>
                    </li>
                    <?php for($j = 6; $j <= count($foodlist) - 1; $j++)
                    { ?>
                        <li id="listdiv-<?php echo $j ?>" class="allcat" style="display: none;">
                            <a id="listalert-<?php echo $j ?>"
                               onclick="getValue($(this));" style="color: #000;">
                                <?php echo $foodlist[ $j ]['FoodCategory']['food_category_name']; ?>
                            </a></li>
                    <?php } ?>

                    <li class="hideall" style="display: none;"><a id="hide"
                                                                  style="color: #00B6E4;" onclick="showLess()"><span>« Show fewer</span>
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
            <span>Ratings</span><br>

            <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
            </p><br/>

            <div id="slider-range"></div>
            <script>
                $(function () {
                    $("#slider-range").slider({
                        range: true,
                        min: 0,
                        max: 500,
                        values: [75, 300],
                        slide: function (event, ui) {
                            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                        }
                    });
                    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                    " - $" + $("#slider-range").slider("values", 1));
                });
            </script>
            <button class="btn btn-info search">SEARCH</button>
        </form>
    </div>
    <div class="col-md-9" id="wrapbox">
        <?php foreach($stores as $store)
        { ?>
            <div class="f6">
                <h2><?php echo $store['Store']['name']; ?></h2>
                <small style="color:#CCCCCC;">
                    <?php echo $store['Store']['address']; ?>
                </small>
                <?php echo $this->Html->image('star.png', array('class' => 'pull-right', 'alt' => 'Star')); ?>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <?php echo $this->Html->image('../' . $store['Store']['logo'], array('alt' => 'Restaurant')); ?>
                    </div>
                    <div class="col-md-9 bangladesh">
                        <h5><?php echo $store['Store']['promo_text']; ?></h5>
                        <?php echo $this->Html->image('time.png', array('alt' => 'Time')); ?>
                        <span>Opening Time: <?php echo $store['Store']['open_time']; ?> - <?php echo $store['Store']['close_time']; ?></span><br/>
                        <?php echo $this->Html->image('cart.png', array('alt' => 'Cart')); ?>
                        <span>Minimum Order: $<?php echo $store['Store']['min_order']; ?></span>
                        <button class="btn btn-success pull-right top" id="<?php echo $store['Store']['id']; ?>"
                                onclick="loadStoreDetails($(this));">View Menu
                        </button>
                        <hr style="margin-right:15px;">
                        <?php echo $this->Html->image('location.png', array('alt' => 'Location')); ?>
                        <span style="color:#CCCCCC;">Others Branch: Dhanmondi, Chittagong</span>
                    </div>
                </div>
            </div>
            <div>&nbsp;</div>
        <?php } ?>
    </div>
</div>
<div>&nbsp;</div>
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

    var MYSHOP_STORE_VIEW =
    {
        postcode: 0,
        displayResult: function (item, val, text) {
            $('#selectedId').val(val);
            var zipcode = $("#postcode").val();
            if (zipcode.length == 0) {
                zipcode = 0;
            }
            APP_HELPER_VIEW.ajaxSubmitDataCallback('Stores/getStoreByIdAsJson/' + val + '/' + zipcode, '', function (data) {

                MYSHOP_STORE_VIEW.prepareJSONData(data);

            });
        },
        init: function () {
            $('#searchText').typeahead({
                ajax: {url: APP_URL_ROOT + 'stores/getStoresByName/' + $("#postcode").val(), triggerLength: 1},
                display: 'name',
                val: 'id',
                itemSelected: MYSHOP_STORE_VIEW.displayResult
            });
            $('span.stars').stars();
        },
        prepareJSONData: function (data) {
            var strtotal = '';
            $.each(data, function (i, s) {

                var str = '<div class="f6"><h2>' + s.Store.name + '</h2><small style="color:#CCCCCC;">' + s.Store.address + '</small><img alt="Star" class="pull-right" src="/myshop/theme/Myshop/img/star.png?1398593736"><hr><div class="row"><div class="col-md-3"><img alt="Restaurant" src="' + s.Store.logo + '"></div><div class="col-md-9 bangladesh"><h5></h5><img alt="Time" src="/myshop/theme/Myshop/img/time.png?1398587094">&nbsp;<span>Opening Time: ' + s.Store.open_time + ' - ' + s.Store.close_time + '</span><br><img alt="Cart" src="/myshop/theme/Myshop/img/cart.png?1398587132"> <span>Minimum Order: ' + s.Store.min_order + '</span><button onclick="loadStoreDetails($(this));" id="' + s.Store.id + '" class="btn btn-success pull-right top">View Menu</button><hr style="margin-right:15px;"><img alt="Location" src="/myshop/theme/Myshop/img/location.png?1398587724">&nbsp;<span style="color:#CCCCCC;">' + s.Store.address + '</span></div></div></div><div>&nbsp;</div>';

                strtotal += str;
            });
            var theDiv = document.getElementById("wrapbox");
            theDiv.innerHTML = strtotal;
            $('span.stars').stars();
        },

        getStoresByPostCode: function () {
            postcode = $("#inputPostCode").val();
            $("#postcode").val(postcode);
            MYSHOP_STORE_VIEW.postcode = postcode;
            APP_HELPER_VIEW.ajaxSubmitDataCallback('Stores/getStoresByZipcodeAsJson/' + postcode, '', function (data) {
                MYSHOP_STORE_VIEW.prepareJSONData(data);

            });
        }

    };

    function loadStoreDetails(data) {
        var storeid = data.attr('id');
        APP_HELPER_VIEW.ajaxSubmitDataCallback('ProductCategories/view/' + storeid, '', function (data) {
            $("#ajax-view-content").html(data);
        });
    }

    function getValue(data) {
        $("#searchText").val('');
        var id = data.attr('id');
        var arr = id.split('-');
        var liIndex = arr[1];

        $("li").removeClass('selected');
        $("#listdiv-" + liIndex).addClass('selected');
        console.debug("#listdiv-" + liIndex);


        var zipcode = $("#postcode").val();
        if (zipcode.length == 0) {
            zipcode = 0;
        }

        APP_HELPER_VIEW.ajaxSubmitDataCallback('Stores/getStoresByFoodCategoryAsJson/' + $('#' + id).html().trim() + '/' + zipcode, '', function (data) {

            MYSHOP_STORE_VIEW.prepareJSONData(data);

        });
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
        MYSHOP_STORE_VIEW.init();
    });
</script>