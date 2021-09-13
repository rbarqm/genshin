<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MainCharacter */

$this->title = $model->character_name;
$this->params['breadcrumbs'][] = ['label' => 'Main Characters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="main-character-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'character_name',
            [
                'attribute' => 'gender_id',
                'label' => 'Gender',
                'value'     => function ($data) {
                    return $data->gender->gender_name;
                },
            ],
            [
                'attribute' => 'vision_id',
                'label' => 'Vision',
                'value'     => function ($data) {
                    return $data->vision ? $data->vision->vision_name : '- unknown -';
                },
            ],
            [
                'attribute' => 'weapon_id',
                'label' => 'Weapon',
                'value'     => function ($data) {
                    return $data->weapon ? $data->weapon->weapon_type : '- unknown -';

                },
            ],
            [
                'attribute' => 'region_id',
                'label' => 'Region',
                'value'     => function ($data) {
                    return $data->region ? $data->region->region_name : '- unknown -';
                    
                },
            ],
            [
                'attribute' => 'rarity_id',
                'label' => 'Rarity',
                'value'     => function ($data) {
                    return $data->rarity ? $data->rarity->rarity_name : '- unknown -';
                    
                },
            ],
            [
                'attribute' => 'role_id',
                'label' => 'Role Main',
                'value'     => function ($data) {
                    return $data->role ? $data->role->role_name : '- unknown -';
                    
                },
            ],
            [
                'attribute' => 'posture_id',
                'label' => 'Posture',
                'value'     => function ($data) {
                    return $data->posture ? $data->posture->posture_name : '- unknown -';
                    
                },
            ],
        ],
    ]) ?>

</div>
