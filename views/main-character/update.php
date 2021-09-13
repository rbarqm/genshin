<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainCharacter */

$this->title = 'Update Character: ' . $model->character_name;
$this->params['breadcrumbs'][] = ['label' => 'Main Characters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-character-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gender' => $gender,
    ]) ?>

</div>
