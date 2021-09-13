<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_region".
 *
 * @property int $id
 * @property string|null $region_name
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_name' => 'Region Name',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['region_id' => 'id']);
    }
}
