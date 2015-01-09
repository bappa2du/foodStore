<div class="container">
    <div class="panel panel-myshop">
        <div class="panel-heading">
            <h3>Best Takeaway Cuisines</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php
                    foreach($foods as $food)
                    {
                        ?>
                        <div class="col-sm-4 col-xs-6">
                            <div class="cusine-gallery">
                                <div>
                                    <?php
                                        echo $this->Html->image('/files/food/photo/' . $food['Food']['id'] . '/' . $food['Food']['photo'], array('class' => 'img-responsive', 'alt' => $food['Food']['name']));
                                    ?>
                                </div>
                                <div>
                                    <h4><?php echo $food['Food']['name']; ?></h4>

                                    <p><?php
                                            echo $this->Text->truncate($food['Food']['description'], 50, array(
                                                    'ellipsis' => '...',
                                                    'exact'    => false
                                                )
                                            );
                                        ?></p>
                                </div>
                                <div>
                                    <?php echo $this->Html->link('View More', array('controller' => 'foods', 'action' => 'view', $food['Food']['id']), array('class' => 'btn btn-default ', 'data-href' => Router::url(array('controller' => 'foods', 'action' => 'view', $food['Food']['id'], '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
