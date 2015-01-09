<div class="" id="homeBanner">
    <div class="carousel-text">
        <h1> Order Takeaway Online! </h1>
    </div>
    <div class="carousel-search visible-md visible-lg">
        <form class="form-inline" method="post" action="stores/view">
            <div class="input-group">
                <input type="text" class="form-control input-large input-myshop" title="eg. SW6 6LG" type="search" placeholder="e.g. SW6 6LG" maxlength="8" onLoad="this.focus();" id="post-code-input" name='s[p]'>
                <input name="s[sd]" type="hidden" value="0" id="ajax-search"/>
            <span class="input-group-btn">
                <button class="btn btn-success input-myshop" type="button" value="find takeaways" name="find takeaways" id="cta-homepage">Find Takeaways</button>                
            </span>
            </div>
        </form>
        <script>
            $(function () {
                $("#cta-homepage").click(function () {
                    var postcode = $("#post-code-input").val();
                    APP_HELPER_VIEW.ajaxSubmitDataCallback('stores/view/' + postcode, '', function (data) {
                        $('#homeBanner').hide();
                        $("#ajax-view-content").html(data);
                    });


                });
            });
        </script>
    </div>
    <?php echo $this->Html->image('banner-1.jpg', array('class' => 'img-responsive')); ?>
</div>
