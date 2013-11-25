<ul>
    <li><?php echo CHtml::link('Управление категориями',array('category/admin')); ?></li>
	<li><?php echo CHtml::link('Создать новую запись',array('post/create')); ?></li>
	<li><?php echo CHtml::link('Управление записями',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Одобрение комментариев',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
    <li><?php echo CHtml::link('Управление комментариями',array('comment/admin')); ?></li>
	<li><?php echo CHtml::link('Выход ('.Yii::app()->user->name.')',array('site/logout')); ?></li>
</ul>