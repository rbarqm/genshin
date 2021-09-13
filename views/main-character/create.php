<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainCharacter */

$this->title = 'Create Main Character';
$this->params['breadcrumbs'][] = ['label' => 'Main Characters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-character-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gender' => $gender
    ]) ?>

</div>
