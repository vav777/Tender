<?php

/*
  With my modifications, access rules can be defined like so:

  class UserController extends Controller {

  public function accessRules() {
  return array(
  'logout, update', //'logout' and 'user update' actions require logon
  'login, create, recover' => array(Group::GUEST, 'equal'), //these actions require the user to NOT be logged on
  'delete' => array(Group::ADMIN, 'min'), //the user delete actions required rank of admin or higher
  );
  }

  //..
  }

  as you see, if you don't define specific settings, it will assume them to be the following:
  array(Group::USER, 'min')
  Which means the current must have at lease rank of USER.

  As you see you can define very specific settings with little typeing.

  If you do not like my extension of access control, you can edit the
  Controller.php file and comment out the filterAccessControl() method
 */

class AccessControlFilter extends CAccessControlFilter {

    private $_rules = array();

    public function getRules() {
        return $this->_rules;
    }

    public function setRules($rules) {
        foreach ($rules as $action => $rule) {
            $r = new AccessRule;
            $this->_rules[] = $r;
            if (is_array($rule)) {
                $r->actions = explode(', ', $action);
                $r->rank = $rule[0];
                if (isset($rule[1]))
                    $r->comparison = $rule[1];
            } else {
                if (is_string($action)) {
                    $r->actions = explode(', ', $action);
                    $r->rank = $rule;
                } else {
                    $r->actions = explode(', ', $rule);
                }
            }
        }
    }

}

class AccessRule extends CComponent {

    /**
     * @var array actions that this rule applies to. The comparison is case-insensitive.
     */
    public $actions = array();
    /**
     * @var string the rank of this rule
     */
    public $rank = 2;
    /**
     * @var string comparison type of the rule's rank to the user rank
     */
    public $comparison = 'min';

    public function isUserAllowed($user, $controller, $action, $ip, $verb) {
        if ((!in_array($action->getId(), $this->actions)) && (!in_array('*', $this->actions)))
            return 0;
        $mapConditions = array(
            'min' => ($user->rank >= $this->rank),
            'max' => ($user->rank <= $this->rank),
            'equal' => ($user->rank == $this->rank),
        );
        if ($mapConditions[$this->comparison])
            return 1;
        else
            return -1;
    }

}
