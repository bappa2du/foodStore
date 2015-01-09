<div class="panel panel-myshop">
    <div class="panel-heading">
        <h3>Customer comment</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="form-group coustome-group">
                <label for="firstName">Comment</label>
                <?php echo $this->Form->input('comment', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Give your valueable comment...')); ?>
            </div>
        </div>
        <!--=========================================================================================================
        =========================================== <Tappware solution> =============================================
        ==========================================================================================================-->
        <div class="col-md-12">
            <div class="form-group coustome-group">
                <label for="firstName">Leave a note for the restaurant</label>
                <?php echo $this->Form->textarea('delevery_instruction', array('label' => false, 'class' => 'form-control', 'placeholder' => 'e.g. Delivery instruction for driver or other instruction..')); ?>
            </div>
        </div>
        <!--=========================================================================================================
        =========================================== <Tappware solution> =============================================
        ==========================================================================================================-->
        <div class="col-md-24">
            <a class="btn btn-success btn-lg" href="/restaurants/details/<?php echo $restaurant['Restaurant']['id']; ?>">Previous</a>
            <button type="button" id="checkoutStemNext" class="btn btn-success btn-lg"/>
            Make Payment</button>
        </div>
    </div>
</div>

