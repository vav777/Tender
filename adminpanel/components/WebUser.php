<?php

class WebUser extends CWebUser {

    public $email;
    public $rank = 1;

    public function init() {
        parent::init();

        /*
         * Sets the user email and rank
         * The reason I use this method is so that I can access the user states as attributes (you can do that anyways as of Yii 1.0.3 though)
         * and so that the user rank defaults to 1 (meaning not logged on)
         * See the group model for information on the ranks
         */
        $this->email = $this->getState('email');
        $rank = $this->getState('rank');
        if ($rank != null)
            $this->rank = $rank;
    }

    /**
     * Compares the current user to $rank
     *
     * Should be used in view to decide if e.g. an admin-only link should be rendered
     * Example:
     * <?php if (Yii::app()->user->hasAuth(Group::ADMIN, 'min')){ ?>
     * 	<p>Something only an admin or higher ranking user should see</p>
     * <?php } ?>
     *
     * This is a very simple yet fairly flexible authorization technic.
     * Note I have also extended the AccessControlFilter to be simpler and yet also
     * reasonably flexible
     *
     * @param integer the rank to campare the current user to
     * @param string the camparison type.  Can be 'min', 'max', or 'equal'
     */
    public function hasAuth($rank = 2, $comparison = 'min') {
        $mapConditions = array(
            'min' => ($this->rank >= $rank),
            'max' => ($this->rank <= $rank),
            'equal' => ($this->rank == $rank),
        );
        return $mapConditions[$comparison];
    }

    /**
     * @param string the id of the flash
     * @param mixed you may set this argument to the name of the view file to imbed the flash in
     * (you may access the flash content in the view via $content), or an array of the form:
     * array(<before>, <after>), where <before> is rendered before the flash and <after> after it.
     * Or, you may leave it as null to wrap it in <p class="flash"></p> (the default)
     * @param mixed value to be returned if the flash message is not available.
     * @param boolean whether to delete this flash message after accessing it. Defaults to true.
     * @param whether to return the flash or echo it.  Defaults to false (eg echo it)
     * @return mixed the message message
     */
    public function flash($id, $view=null, $defaultValue=null, $delete=true, $return=false) {
        if (!$this->hasFlash($id))
            return;

        $flash = $this->getFlash($id, $defaultValue, $delete);

        if ($view == null)
            $buff = '<p class="flash">' . $flash . '</p>';
        elseif (is_array($view))
            $buff = $view[0] . $flash . $view[1];
        else
            $buff = Yii::app()->controller->renderPartial('application.views.flash.' . $view, array('content' => $flash), true);

        if ($return)
            return $buff;
        else
            echo $buff;
    }

}

?>
