<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>
<div id="form">
    <?php $form=$this->beginWidget('CActiveForm', array(

        'id'=>'comment-form',
        'htmlOptions'=>array('class'=>'expanded'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,

    )); ?>
        <div class="alert error" style="display:none" role="alert">
            <a class="close" data-action="dismiss-alert" title="Отменить">×</a>
            <span><!-- error goes here --></span>
        </div>

        <div class="postbox">
            <div class="avatar">

                <span class="user">
                    <img data-role="user-avatar" src="//www.gravatar.com/avatar.php?default=http%3A%2F%2Fa.disquscdn.com%2F1385503134%2Fimages%2Fnoavatar92.png&amp;size=92&amp;gravatar_id=5c8f3aa61a99af63919117be1ccc19f6">
                </span>
            </div>

            <?php echo $form->errorSummary($model); ?>
                <div class="textarea-wrapper">
                    <?php echo $form->textArea($model,'content',array('rows'=>6,'class'=>'textarea',
                        'placeholder'=>'Ваш комментарий',)); ?>
                    <?php echo $form->error($model,'content'); ?>
                </div>
                <section data-role="auth-or-ident" class="auth-section logged-out">
                    <div class="guest">


                        <p class="input-wrapper">
                            <?php echo $form->textField($model,'author',
                                array('size'=>60,'maxlength'=>128,'value'=>!Yii::app()->user->isGuest ? Yii::app()->user->name: '',
                                'placeholder'=>'Имя', 'maxlength'=>30)); ?>
                            <?php echo $form->error($model,'author'); ?>
                        </p>

                        <p class="input-wrapper">
                            <?php echo $form->emailField($model,'email',
                                array('size'=>60,'maxlength'=>128,'value'=>!Yii::app()->user->isGuest ? Yii::app()->user->email: '',
                                    'placeholder'=>'Электронная почта')); ?>
                            <?php echo $form->error($model,'email'); ?>
                        </p>

                        <p class="input-wrapper">
                            <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128,
                                'placeholder'=>'Веб-сайт')); ?>
                            <?php echo $form->error($model,'url'); ?>
                        </p>
                    </div>
                    <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить' : 'Сохранить'); ?>
                    </div>

                </section>

        </div>
    <?php $this->endWidget(); ?>
</div>
<!---->
<!--<div class="form">-->
<!---->
<?php //$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'comment-form',
//	// Please note: When you enable ajax validation, make sure the corresponding
//	// controller action is handling ajax validation correctly.
//	// There is a call to performAjaxValidation() commented in generated controller code.
//	// See class documentation of CActiveForm for details on this.
//	'enableAjaxValidation'=>true,
//)); ?>
<!---->
<!--	<p class="note">Поля с <span class="required">*</span> обязательные.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'author'); ?>
<!--        --><?php //echo $form->textField($model,'author',
//            array('size'=>60,'maxlength'=>128,'value'=>!Yii::app()->user->isGuest ? Yii::app()->user->name: '')); ?>
<!--        --><?php //echo $form->error($model,'author'); ?>
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'email'); ?>
<!--        --><?php //echo $form->textField($model,'email',
//            array('size'=>60,'maxlength'=>128,'value'=>!Yii::app()->user->isGuest ? Yii::app()->user->email: '')); ?>
<!--        --><?php //echo $form->error($model,'email'); ?>
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'url'); ?>
<!--        --><?php //echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
<!--        --><?php //echo $form->error($model,'url'); ?>
<!--    </div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'content'); ?>
<!--		--><?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
<!--		--><?php //echo $form->error($model,'content'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton($model->isNewRecord ? 'Отправить' : 'Сохранить'); ?>
<!--	</div>-->
<!---->
<?php //$this->endWidget(); ?>
<!---->
<!--</div>-->