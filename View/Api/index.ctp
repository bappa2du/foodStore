<div class="panel panel-default">
    <div class="panel-heading">API List</div>
    <div class="panel-body">
        <ul>
            <li>
                <h2>Restaurant list</h2>
                <ul>
                    <li>
                        <strong>URL</strong>: <?php echo $this->Html->link('http://chefgenie.co.uk/api/restaurants', array('plugin' => '', 'controller' => 'api', 'action' => 'restaurants'), array('escape' => false)); ?>
                    </li>
                    <li><strong>Method</strong>: POST</li>
                    <li><strong>Content-Type</strong>: application/json</li>
                    <li><strong>Parameters</strong>: <p>
                <pre>
{
    "key": "6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy",
    "limit": "10",
    "page": "1"
}
                </pre>
                        </p></li>
                </ul>
            </li>
            <li>
                <h2>Restaurant details</h2>
                <ul>
                    <li>
                        <strong>URL</strong>: <?php echo $this->Html->link('http://chefgenie.co.uk/api/restaurants', array('plugin' => '', 'controller' => 'api', 'action' => 'restaurants'), array('escape' => false)); ?>
                    </li>
                    <li><strong>Method</strong>: POST</li>
                    <li><strong>Content-Type</strong>: application/json</li>
                    <li><strong>Parameters</strong>: <p>
                <pre>
{
    "key": "6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy",
    "restaurant_id": "5391c114-a9a4-4fc9-b6ab-3da66715296b"
}
                </pre>
                        </p></li>
                </ul>
            </li>
            <li>
                <h2>Restaurant search by date</h2>
                <ul>
                    <li>
                        <strong>URL</strong>: <?php echo $this->Html->link('http://chefgenie.co.uk/api/restaurants', array('plugin' => '', 'controller' => 'api', 'action' => 'restaurants'), array('escape' => false)); ?>
                    </li>
                    <li><strong>Method</strong>: POST</li>
                    <li><strong>Content-Type</strong>: application/json</li>
                    <li><strong>Parameters</strong>: <p>
                <pre>
{
    "key": "6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy",
    "limit": "10",
    "page": "1",
    "date": "2014-06-08",
}
                </pre>
                        </p></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--    <ul>
            <li><?php echo $this->Html->link('Restaurant: list <br> - method: GET <br> - param: {(int)page, (int)limit, (string) key} <br> - example : http://chefgenie.co.uk/api/listRestaurants/page:1/limit:5/key:6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy', array('plugin' => '', 'controller' => 'api', 'action' => 'listRestaurants', 'limit' => '10', 'page' => 1, 'key' => '6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('Restaurant: details view (by id)<br> - method: GET <br> - param: {(string) id, (string) key} <br> - example : http://chefgenie.co.uk/api/viewRestaurant/5391c114-a9a4-4fc9-b6ab-3da66715296b/key:6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy', array('plugin' => '', 'controller' => 'api', 'action' => 'viewRestaurant', '5391c114-a9a4-4fc9-b6ab-3da66715296b', 'key' => '6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('Restaurant: list filterd by date<br> - method: GET <br> - param: {(int)page, (int)limit, (string) key, (string)date} <br> - example : http://chefgenie.co.uk/api/listRestaurants/page:1/limit:5/date:2014-06-08/key:6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy', array('plugin' => '', 'controller' => 'api', 'action' => 'listRestaurants', 'limit' => '10', 'page' => 1, 'date' => '2014-06-08', 'key' => '6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy'), array('escape' => false)); ?></li>
        </ul>-->
</div>
