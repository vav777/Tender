<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<?php
header('Content-type: text/html; charset=UTF-8');
$this->whoOnline();
header('Access-Control-Allow-Origin: *');
if (!Yii::app()->user->hasAuth(Group::USER)) {
    header('Access-Control-Allow-Origin: *');
?>
        <head>
            <meta name="language" content="fr" />
            <title>EUROMED VOYAGES - SYSTEME RESERVATION ADMIN</title>
        <?php echo CHtml::cssFile(Yii::app()->request->baseUrl . '/css/admin.css'); ?>
    </head>

    <body>

        <div style="padding-top:20px; margin:auto;width:500px;text-align:center">
            <!-- <img src="../../../images/logoAcciona.jpg" width="173" height="75"/>
            <img src="../../../images/compagnies/grimaldi_lines.gif" width="120" height="35"/>
            <img src="../../../images/compagnies/grandi_navi_veloci.gif" width="123" height="35"/> -->

        </div>

        <h3 style="padding-top:20px; margin:auto;"><b>EUROMED VOYAGES : SYSTÈME DE RÉSERVATION DE FERRY</b></h3>

        <div style="width:400px;padding-top:20px; margin:auto">
            <?php $this->widget('UserLogin', array('visible' => !Yii::app()->user->hasAuth(Group::ADMIN))); ?>
        </div>



        <p style="margin:auto;">&copy; EUROMED VOYAGES <?php echo date('Y') ?></p>
    </body>
<?php
        } else {
            
        }
?>