<?php

namespace kouosl\duyuru\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\duyuru\models\Duyuru;

/**
 * DuyuruSearch represents the model behind the search form of `vendor\kouosl\duyuru\models\Duyuru`.
 */
class DuyuruSearch extends Duyuru
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'kat_id', 'status', 'sort'], 'integer'],
            [['title', 'image', 'duyuru', 'started', 'ended'], 'safe'],
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
        $query = Duyuru::find();

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
            'user_id' => $this->user_id,
            'kat_id' => $this->kat_id,
            'status' => $this->status,
            'sort' => $this->sort,
            'started' => $this->started,
            'ended' => $this->ended,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'duyuru', $this->duyuru]);

        return $dataProvider;
    }
}