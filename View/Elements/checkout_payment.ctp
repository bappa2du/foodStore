<div class="panel panel-myshop">
    <div class="panel-heading">
        <h3>How would you like to pay?</h3>
    </div>
    <div class="panel-body">
        <!--<div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="radio" checked="checked" name="paymentType" value="1"> <b>Cash</b>
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="radio" name="paymentType" value="2"> <?php echo $this->Html->image('img_ae.jpg', array('alt' => 'Paypal')); ?>
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="radio" name="paymentType" value="2"> <?php echo $this->Html->image('img_ae.jpg', array('alt' => 'Visa')); ?>
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="radio" name="paymentType" value="2"> <?php echo $this->Html->image('img_ae.jpg', array('alt' => 'Master Card')); ?>
                </label>
            </div>
        </div>-->
        <div class="row">
            <div class="col-md-24">
                <div class="alert alert-info" role="alert">
                    <input type="radio" id="card_payment" checked="checked" name="transaction_type" value="Card">
                    <b>Credit/Debit card</b>
                </div>
            </div>
            <div class="col-md-24" id="cardPaymentSection">
                <div class="">
                    <div class="form-group">
                        <label for="card_typeSelect">Card type</label>
                        <select class="form-control" id="card_typeSelect" name="card_type">
                            <option value="Mastercard">Mastercard</option>
                            <option value="Visa">Visa</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label class="" for="transaction_card_number">Card number
                            <span style="color:red">*</span></label>
                        <input autocomplete="off" type="text" class="form-control" name="transaction_card_number" id="transaction_card_number">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Save my card for quicker re-ordering.
                        </label>
                    </div>
                </div>
                <p>Expiry date</p>

                <div class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="expMonth">Month</label>
                        <select class="form-control" id="expMonth" name="expMonth">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="expYear">Year</label>
                        <select class="form-control" id="expYear" name="expYear">
                            <?php for($i = 14; $i < 41; $i++)
                            {
                                echo " <option value='$i'>20$i</option>";
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label class="" for="transaction_cvv">Security number <span style="color:red">*</span></label>
                        <input autocomplete="off" type="text" class="form-control" name="transaction_cvv" id="transaction_cvv">
                        <em>Last 3 digits of the number o the back of your card.</em>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label class="" for="fName">First name <span style="color:red"></span></label>
                        <input type="text" name="card_firs_name" class="form-control" id="fName">
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label class="" for="lName">Last name <span style="color:red"></span></label>
                        <input type="text" name="card_last_name" class="form-control" id="lName">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-24">
                <div class="alert alert-info" role="alert">
                    <input type="radio" name="transaction_type" value="Cash"> <b>Cash</b>
                </div>
            </div>
            <div class="col-md-24"></div>
        </div>
        <div class="col-md-24">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="termsConditions" name="terms_n_conditions" value="1">
                    <span class="text-primary">I accept Chef Genie's terms and conditions, including the privacy policy & cookies policy</span>
                    <span style="color:red">**</span>
                </label>
            </div>
        </div>
    </div>
</div>
<script>
    $(function (e) {

        function getRadioValue() {
            if ($('input[name=paymentType]:radio:checked').length > 0) {
                return $('input[name=paymentType]:radio:checked').val();
            }
            else {
                return 0;
            }
        }

        var radio_button_value = getRadioValue();

        $('input[name=paymentType]:radio').click(function () {
            // Will get the newly selected value
            radio_button_value = getRadioValue();

            if (1 == radio_button_value) {
                $('#cardPaymentSection').hide();
            } else {
                $('#cardPaymentSection').show();
            }

        });

    });
</script>

