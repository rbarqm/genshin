<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MainCharacterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Characters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-character-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Main Character', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns        
    ]); ?>


</div>
