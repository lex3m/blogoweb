<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<?php
$deleteJS = <<<DEL
$('.container').on('click','.time a.delete',function() {
	var th=$(this),
		container=th.closest('div.comment'),
		id=container.attr('id').slice(1);
	if(confirm('Вы уверены, что хочете удалить комментарий  #'+id+'?')) {
		$.ajax({
			url:th.attr('href'),
			type:'POST'
		}).done(function(){container.slideUp()});
	}
	return false;
});
DEL;
Yii::app()->getClientScript()->registerScript('delete', $deleteJS);

?>

<div class="comment" id="c<?php echo $data->id; ?>">

    <?php echo CHtml::link("#{$data->id}", $data->url, array(
        'class'=>'cid',
        'title'=>'Ссылка на комментарий',
    )); ?>

    <div class="author">
        <?php echo $data->authorLink; ?> оставил(-а) комментарий в записи
        <?php echo CHtml::link(CHtml::encode($data->post->title), $data->post->url); ?>
        категории
        <?php echo CHtml::link(CHtml::encode($data->post->category->name), $data->post->category->url); ?>
    </div>

    <div class="time">
        <?php if($data->status==Comment::STATUS_PENDING): ?>
            <span class="pending">Ожидает подтверждения</span> |
            <?php echo CHtml::linkButton('Подтвердить', array(
                'submit'=>array('comment/approve','id'=>$data->id),
            )); ?> |
        <?php endif; ?>
        <?php echo CHtml::link('Редактировать',array('comment/update','id'=>$data->id)); ?> |
        <?php echo CHtml::link('Удалить',array('comment/delete','id'=>$data->id),array('class'=>'delete')); ?> |
        <?php echo date('d/m/Y в H:i',$data->create_time); ?>
    </div>

    <div class="content">
        <?php echo nl2br(CHtml::encode($data->content)); ?>
    </div>

</div><!-- comment -->