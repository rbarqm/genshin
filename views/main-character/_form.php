<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\MainCharacter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-character-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'character_name')->textInput(['maxlength' => true]) ?>

    <!-- <?php 
        // $content = file_get_contents($gender);
        $json = Json::decode($gender);		
        $instArray = ArrayHelper::map($json, 'id', 'gender');
		
        echo $form->field($model, 'gender')->dropDownList($instArray);		
	?> -->
    
    <?= $form->field($model, 'gender_id')->dropDownList([ '1' => 'Female','2' => 'Male'], ['prompt' => ''])->label('Gender') ?>
    
    <?= $form->field($model, 'vision_id')->dropDownList([ '1' => 'Pyro','2' => 'Hydro','3' => 'Anemo','4' => 'Electro','5' => 'Dendro','6' => 'Cryo','7' => 'Geo'], ['prompt' => ''])->label('Vision') ?>

    <?= $form->field($model, 'weapon_id')->dropDownList([ '1' => 'Sword','2' => 'Claymore','3' => 'Catalyst','4' => 'Polearm','5' => 'Bow'], ['prompt' => ''])->label('Weapon')?>

    <?= $form->field($model, 'region_id')->dropDownList([ '1' => 'Mondstadt','2' => 'Liyue','3' => 'Sneznaya','4' => 'Inazuma','5' => 'Sumeru','6' => 'Fontaine','7' => 'Natlan', '8'=>'Khaenriah'], ['prompt' => ''])->label('Region') ?>

    <?= $form->field($model, 'rarity_id')->dropDownList([ '1' => '4-Star','2' => '5-Star'], ['prompt' => ''])->label('Rarity') ?>

    <?= $form->field($model, 'role_id')->dropDownList([ '1' => 'Main DPS','2' => 'DPS','3' => 'Sub DPS','4' => 'Support','5' => 'Healer','6' => 'Utility'], ['prompt' => ''])->label('Role') ?>

    <?= $form->field($model, 'posture_id')->dropDownList([ '1' => 'Loli','2' => 'Short','3' => 'Tall'], ['prompt' => ''])->label('Posture') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
