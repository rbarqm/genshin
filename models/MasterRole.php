<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_role".
 *
 * @property int $id
 * @property string|null $role_name
 *
 * @property MainCharacter[] $mainCharacters
 */
class MasterRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
        ];
    }

    /**
     * Gets query for [[MainCharacters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCharacters()
    {
        return $this->hasMany(MainCharacter::className(), ['role_id' => 'id']);
    }
}
