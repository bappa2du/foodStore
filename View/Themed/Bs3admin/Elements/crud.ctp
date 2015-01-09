<?php
    $elName = 'adminmenu/' . $this->params['controller'] . '-' . $this->params['action'];
    //debug($elName);
    if($this->elementExists($elName))
    {
        echo $this->element($elName);
    } else
    {
        echo $this->element('adminmenu/users-dashboard');
    }
?>
						
						