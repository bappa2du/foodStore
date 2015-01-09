<div class="um_box_mid_content_mid" id="addgroup">
    <?php echo $this->Form->create('UserGroup', array('action' => 'addGroup')); ?>
    <?php echo $this->Form->input("name", array('label' => 'Group Name', 'class' => 'form-control required', 'id' => 'name', 'div' => array('class' => 'form-group'))) ?>
    <?php echo $this->Form->input("alias_name", array('label' => 'Alias Group Name', 'class' => 'form-control required', 'div' => array('class' => 'form-group'))) ?>
    <?php
        if(!isset($this->request->data['UserGroup']['allowRegistration']))
        {
            $this->request->data['UserGroup']['allowRegistration'] = true;
        }
    ?>
    <div class="umstyle3"><?php echo __('Allow Registration'); ?></div>
    <div class="umstyle4"><?php echo $this->Form->input("allowRegistration", array("type" => "checkbox", 'label' => false)) ?></div>
    <div class="umstyle4"><?php echo $this->Form->Submit(__('Add Group'), array('class' => 'btn btn-success', 'id' => 'Submit')); ?></div>
</div>
<div>Note: If you add a new group then you should give permissions to this newly created Group.</div>
<?php echo $this->Form->end(); ?>
</div>
<script>
    $(document).ready(function () {
        $("#Submit").on('click', function (e) {

            e.preventDefault();


            if ($('#UserGroupAddGroupForm').valid()) {
                var str = $('#name').val();
                if (/^[a-zA-Z0-9-]*$/.test(str) == false) {
                    alert('Group Name can not contain Space or Illegal characters.');
                }
                else {
                    $("#UserGroupAddGroupForm").submit();
                }

            }

        });
    });
</script>