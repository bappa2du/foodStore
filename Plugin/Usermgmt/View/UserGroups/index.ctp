<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Group List</h6></div>
    <div class="datatable">
        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="table table-striped">
            <thead>
            <tr>
                <th><?php echo __('Group Id'); ?></th>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Alias Name'); ?></th>
                <th><?php echo __('Allow Registration'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Action'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php   if(!empty($userGroups))
            {
                foreach($userGroups as $row)
                {
                    echo "<tr>";
                    echo "<td>" . $row['UserGroup']['id'] . "</td>";
                    echo "<td>" . h($row['UserGroup']['name']) . "</td>";
                    echo "<td>" . h($row['UserGroup']['alias_name']) . "</td>";
                    echo "<td>";
                    if($row['UserGroup']['allowRegistration'])
                    {
                        echo "Yes";
                    } else
                    {
                        echo "No";
                    }
                    echo "</td>";
                    echo "<td>" . date('d-M-Y', strtotime($row['UserGroup']['created'])) . "</td>";
                    echo "<td>";
                    echo "<a href='" . $this->Html->url('/editGroup/' . $row['UserGroup']['id']) . "' class='icon-pencil'></a>";
                    if($row['UserGroup']['id'] != 1)
                    {
                        echo $this->Form->postLink('<i class="icon-cancel"></i>', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this group? Delete it your own risk')));
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else
            {
                echo "<tr><td colspan=6><br/><br/>No Data</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>