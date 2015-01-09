<!-- Carousel================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <?php echo $this->Html->image('picture1.jpg', array('class' => 'img-responsive', 'data-src' => 'banner.jpg')); ?>
            <?php echo $this->element('banner_search'); ?>
        </div>
        <div class="item">
            <?php echo $this->Html->image('picture2.jpg', array('class' => 'img-responsive', 'data-src' => 'banner.jpg')); ?>
            <?php echo $this->element('banner_search'); ?>
        </div>
        <div class="item">
            <?php echo $this->Html->image('picture3.jpg', array('class' => 'img-responsive', 'data-src' => 'banner.jpg')); ?>
            <?php echo $this->element('banner_search'); ?>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->
