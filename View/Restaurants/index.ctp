<style>
    .resName {
        color: #000;
    }
    .offer-button {
        margin-top: 0px;
        margin-bottom: 0px;
        background: #ff6600;
        color: #fff;
        padding: 2px 5px;
        transform:rotate(-12deg);
        -ms-transform:rotate(-12deg); /* IE 9 */
        -webkit-transform:rotate(-12deg);
    }
    .offerTH {
        display: table;
    }
    .offerBTH {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }
    .offerBTH h4 {
        text-align: center;
    }
    .panel-myshop:hover h2 {
        color: red;
    }
</style>
<div class="container">
    <hr>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Restaurants</li>
    </ol>


    <div class="pull-right">
        <strong>Sort by:</strong> <?php echo $this->Paginator->sort('ratting', 'Ratings'); ?> | <?php echo $this->Paginator->sort('min_order', 'Minimum Order'); ?> | <?php echo $this->Paginator->sort('free_delivery_amount', 'Value Delivery Free'); ?>


        <?php
//        echo $this->Paginator->counter(array (
//            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//        ));
        ?>


    </div>
    <h1 class="title"><strong>
    <?php $params = $this->Paginator->params();
   // echo $params{'count'};
    #var_dump($this->Paginator->params());
    echo count($restaurants)
     ?></strong> Restaurants Available</h1>
    <br>
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->element('restaurant_search'); ?>
        </div>
        <div class="col-md-18">
            <?php
            foreach ($restaurants as $restaurant):
                echo $this->element('restarurant_block', array ('restaurant' => $restaurant, 'viewDetails' => true));
            endforeach;
            ?>
            <?php if(count($restaurants) >= 10): ?>
            <div class="pagination">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev(__('Prev'), array ('tag' => 'li'), null, array ('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array ('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'ellipsis' => ''));
                    echo $this->Paginator->next(__('Next'), array ('tag' => 'li', 'currentClass' => 'disabled'), null, array ('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div> <!-- /container -->
