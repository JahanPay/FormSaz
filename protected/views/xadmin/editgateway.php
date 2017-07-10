

<!--content-->
		<div class=content>
			<div class=title style='border-bottom:0'>      <?php echo $this->pageTitle; ?></div>
			<div class=contentss style='padding:8px'>
			
			<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


<div class="row">
		<?php $_='title';?>
		<?php echo $form->labelEx($model,$_); ?><br>
		<?php echo $form->textField($model,$_); ?>
		<?php echo $form->error($model,$_); ?>
	</div>
	
	<div class="row">
		<?php $_='api';?>
		<?php echo $form->labelEx($model,$_); ?><br>
		<?php echo $form->textField($model,$_); ?>
		<?php echo $form->error($model,$_); ?>
	</div>
	
	<div class="row">
		<?php $_='type';?>
		<?php echo $form->labelEx($model,$_); ?><br>
		<?php echo $form->dropDownList($model,$_,array(1=>'عادی',2=>'اختصاصی مستقیم')); ?>
		<?php echo $form->error($model,$_); ?>
	</div>

	


	<div class="row buttons">
		<?php echo CHtml::submitButton('اعمال' , array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

       </div>
* درگاه عادی ، درگاههای مستقیم و غیر مستقیم جهان پی هستند که میتوانید بی نهایت از آنها در پنل کاربریتان در جهان پی بسازید 
<br>
* درگاه اختصاصی ، همان درگاه اختصاصی مستقیم هست که سرویس ویژه سایت جهان پی میباشد با ارائه درخواست به شرکت جهان پی برای شما آماده میشود
	   
                </div>
				
				
				
		
			
		</div>
		
		<!--/content-->
		
		