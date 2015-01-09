<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Users List</h6></div>
    <div class="datatable">
        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="table table-striped">
            <thead>
            <tr>
                <th><?php echo __('SL'); ?></th>
                <!--							<th>--><?php //echo __('Name');?><!--</th>-->
                <!--							<th>--><?php //echo __('Username');?><!--</th>-->
                <th><?php echo __('Email'); ?></th>
                <th><?php echo __('Group'); ?></th>
                <th><?php echo __('Status'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Action'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php       if(!empty($users))
            {
                $sl = 0;
                foreach($users as $row)
                {
                    $sl++;
                    echo "<tr>";
                    echo "<td>" . $sl . "</td>";
//								echo "<td>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</td>";
//								echo "<td>".h($row['User']['username'])."</td>";
                    echo "<td>" . h($row['User']['email']) . "</td>";
                    echo "<td>" . h($row['UserGroup']['name']) . "</td>";
                    echo "<td>";
                    if($row['User']['active'] == 1)
                    {
                        echo "Active";
                    } else
                    {
                        echo "Inactive";
                    }
                    echo "</td>";
                    echo "<td>" . date('d-M-Y', strtotime($row['User']['created'])) . "</td>";
                    echo "<td>";
                    echo "<a href='" . $this->Html->url('/viewUser/' . $row['User']['id']) . "'><span class='icon-eye'></span></a>";
                    echo "<a href='" . $this->Html->url('/editUser/' . $row['User']['id']) . "'><span class='icon-pencil'></span></a>";
                    echo "<a href='" . $this->Html->url('/changeUserPassword/' . $row['User']['id']) . "'><span class='icon-unlocked'></span></a>";
                    if($row['User']['active'] == 0)
                    {
                        echo "<span class='icon'><a href='" . $this->Html->url('/usermgmt/users/makeActive/' . $row['User']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/approve.png' border='0' alt='Make Active' title='Make Active'></a></span>";
                    }
                    if($row['User']['id'] != 1 && $row['User']['username'] != 'Admin')
                    {
                        echo $this->Form->postLink('<span class="icon-cancel"></span>', array('action' => 'deleteUser', $row['User']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else
            {
                echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>