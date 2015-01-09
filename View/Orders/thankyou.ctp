<style type="text/css">
    .center_text {
        text-align: center;
    }
</style>
<?php
    $order_data = $this->Session->read('guestOrder');
    $order_id   = $order_data['Order']['id'];
    /**
     *  $order data return all the information related tothe current order.
     *  &&
     *  $order_id return the current order id
     */
?>
<div class="thank-you">
    <h1 class="center_text">Thank You</h1>

    <div id="loader" class="center_text" style="margin: auto">
        <p>Your order is awaiting to be accepted. </p>
        <img src="<?php echo $this->webroot; ?>img/processing.gif"/>
    </div>
    <div id="thank-circle" class="full-row thank-circle" style="display: none;">
        <span class="glyphicon glyphicon-ok-circle"></span>
    </div>
    <hr>
    <div class="alert alert-warning fade in block" id="alert" style="display:none;margin-left:5%;margin-right:5%;margin-top:0px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span id="message"></span>
    </div>
    <div class="alert alert-success fade in block" id="alert1" style="display:none;margin-left:5%;margin-right:5%;margin-top:0px;">
        <button type="button" class="close" data-dismiss="alert1">×</button>
        <span id="success"></span>
    </div>
    <!--    <div id="icon-ok" style="display:none" class="icon-ok">
            <span class="glyphicon glyphicon-ok"></span>
        </div>-->
</div>
<script type="text/javascript">
    var orderID = 2;
    var message = "";
    var keepAlive = 3000;
    var noOfRequest = 2;
    var reqCounter = 0;
    var timer = false;
    var done = false;


    function getAjaxData() {
        /*$.ajax({
         type: 'get',
         url: 'https://localhost/chefgenie_print_server/response.php
         success: function(resp,status,xhr){
         reqCounter++;
         var x = $.parseJSON(resp);
         jsonData(x);

         }
         });*/
        $.ajax({
            type: "post",
            url: '<?php echo $this->webroot;?>orders/checkOrderStatus',
            dataType: "json",
            data: {"order_id": '<?php echo $order_id;?>'},
            success: function (r) {
                console.log(r);
                if (r == 0) {
                    document.getElementById("loader").style.display = "none";
//                    document.getElementById("thank-you").style.display = "none";
                    document.getElementById("message").innerHTML = "Missing Order Data !!!";
                    document.getElementById("alert").style.display = "block";
                }
                else if (r == 1) {
//                    document.getElementById("thank-you").style.display = "none";
                    document.getElementById("loader").style.display = "none";
                    document.getElementById("message").innerHTML = "Missing Order Data !!!";
                    document.getElementById("alert").style.display = "block";
                }
                else {

                    var status = r.status;
                   // var status = "Accepted";

                    if (status == '<?php echo ORDER_STATUS_PROCESSING; ?>') {
                        timer = setTimeout('getAjaxData()', keepAlive);
                    }
                    if (status == '<?php echo ORDER_STATUS_ACCEPTED; ?>') {
                        document.getElementById("loader").style.display = "none";
//                        document.getElementById("thank-you").style.display = "block";
                        document.getElementById("success").innerHTML = "Your order has been accepted. It will arrive in time !!!";
                        document.getElementById("alert1").style.display = "block";
                        document.getElementById("alert").style.display = "none";
                    }
                    if (status == '<?php echo ORDER_STATUS_REJECTED; ?>') {
                        document.getElementById("loader").style.display = "none";
                        document.getElementById("message").innerHTML = "Sorry ! We can not process your order at this moment. Please try later !!!";
                        document.getElementById("alert").style.display = "block";
                        document.getElementById("alert1").style.display = "none";
                    }
                    if (status == '<?php echo ORDER_STATUS_ACCEPTED_WITH_TIME; ?>') {
                        document.getElementById("loader").style.display = "none";
//                        document.getElementById("thank-you").style.display = "block";
                        document.getElementById("message").innerHTML = "Your order has been accepted. It will take extra few minutes to deliver !!!";
                        document.getElementById("alert").style.display = "block";
                    }
                }
            },
            error: function () {
            }
        });
    }

    function jsonData(data) {
        //alert(data.reasons);
        /*if (data.under_processing == 1) {

         var res = "Your order is placed and it will reach within "+data.required_time;

         }else{
         if(reqCounter > noOfRequest){
         console.log("reqCounter is bigger then 5")
         clearTimeout(timer);
         message = data.reasons;

         document.getElementById("loader").style.display = "none";
         document.getElementById("message").innerHTML= message;
         }else{
         console.log("reqCounter is smaller then 5 keepAlive")
         timer = setTimeout('getAjaxData()', keepAlive);

         }
         }

         console.log(reqCounter);
         */

    }

    getAjaxData();
</script>