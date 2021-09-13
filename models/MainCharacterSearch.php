<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MainCharacter;

/**
 * MainCharacterSearch represents the model behind the search form of `app\models\MainCharacter`.
 */
class MainCharacterSearch extends MainCharacter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender_id', 'vision_id', 'weapon_id', 'region_id', 'rarity_id', 'role_id', 'posture_id'], 'integer'],
            [['character_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MainCharacter::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'gender_id' => $this->gender_id,
            'vision_id' => $this->vision_id,
            'weapon_id' => $this->weapon_id,
            'region_id' => $this->region_id,
            'rarity_id' => $this->rarity_id,
            'role_id' => $this->role_id,
            'posture_id' => $this->posture_id,
        ]);

        $query->andFilterWhere(['like', 'character_name', $this->character_name]);

        return $dataProvider;
    }
}
