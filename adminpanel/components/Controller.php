<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
        public $userIdOnline;
        public $userIpOnline;
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        public function getIp() {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }

        public function whoOnline($frontend = '0') {
            $this->userIdOnline = Yii::app()->user->id ? Yii::app()->user->id : 'NULL';
            $this->userIpOnline = $this->getIp();
            $v = online::ifOnline($this->userIpOnline, $this->userIdOnline);
            if ($v) {
                Yii::app()->db->createCommand("UPDATE online SET time=" . time() . ", frontend='" . $frontend . "'
                        WHERE ip ='" . $this->userIpOnline . "' AND user_id='" . $this->userIdOnline . "'")->execute();
            } else {
                Yii::app()->db->createCommand("INSERT INTO online (user_id,ip,time,frontend)
                    VALUES ('" . $this->userIdOnline . "','" . $this->userIpOnline . "','" . time() . "','" . $frontend . "')")->execute();
            }
            online::model()->deleteAll("time<:t", array(':t' => time() - 300)); //5 min
        }
}