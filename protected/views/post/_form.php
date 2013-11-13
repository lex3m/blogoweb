<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */

?>

<?php
Yii::app()->clientScript->registerScript('post-form', "
    tinymce.init({
        selector: '#contents',
        language: 'ru',
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor'
        ],
    });
", CClientScript::POS_END);
?>

<div class="form">
    <!--<textarea id="contents"></textarea>-->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательные.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>

		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'id'=>'contents')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
        <?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
<!--		--><?php //echo $form->labelEx($model,'status'); ?>
<!--		--><?php //echo $form->textField($model,'status'); ?>
<!--		--><?php //echo $form->error($model,'status'); ?>
	</div>

<!--	<div class="row">
		<?php /*echo $form->labelEx($model,'create_time'); */?>
		<?php /*echo $form->textField($model,'create_time'); */?>
		<?php /*echo $form->error($model,'create_time'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'update_time'); */?>
		<?php /*echo $form->textField($model,'update_time'); */?>
		<?php /*echo $form->error($model,'update_time'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'author_id'); */?>
		<?php /*echo $form->textField($model,'author_id'); */?>
		<?php /*echo $form->error($model,'author_id'); */?>
	</div>-->

    <div class="row">
        <?php
            echo $form->labelEx($model,'category_id');
            $data = CHtml::listData(Category::model()->findAll(), 'id', 'name');
            $htmlOptions =     array('size' => '1', 'prompt'=>'-- Выберите категорию --', );
            echo $form->listBox($model,'category_id', $data, $htmlOptions);
            echo $form->error($model,'category_id');
        ?>
<!--        --><?php //echo $form->dropDownListEx($model,'category_id', CHtml::dropDownList(Category::model()->findAll()), 'id', 'name'); ?>
<!--        --><?php //echo $form->labelEx($model,'category_id'); ?>
<!--        --><?php //echo $form->textField($model,'category_id'); ?>
<!--        --><?php //echo $form->error($model,'category_id'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

