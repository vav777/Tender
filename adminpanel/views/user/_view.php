<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activationKey')); ?>:</b>
	<?php echo CHtml::encode($data->activationKey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastvisit')); ?>:</b>
	<?php echo CHtml::encode($data->lastvisit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastaction')); ?>:</b>
	<?php echo CHtml::encode($data->lastaction); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lastpasswordchange')); ?>:</b>
	<?php echo CHtml::encode($data->lastpasswordchange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('superuser')); ?>:</b>
	<?php echo CHtml::encode($data->superuser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notifyType')); ?>:</b>
	<?php echo CHtml::encode($data->notifyType); ?>
	<br />

	*/ ?>

</div>