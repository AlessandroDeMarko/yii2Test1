<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report;

/**
 * ReportSearch represents the model behind the search form about `app\models\Report`.
 */
class ReportSearch extends Report
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'amount_of_workers', 'accruals', 'provider_id'], 'integer'],
            [['period'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Report::find();

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
            'company_id' => $this->company_id,
            'amount_of_workers' => $this->amount_of_workers,
            'accruals' => $this->accruals,
            'provider_id' => $this->provider_id,
            'period' => $this->period,
        ]);

        return $dataProvider;
    }

    public function searchGeneralReport($params)
    {
        $query = Company::find()->select('industry_id, AVG(report.amount_of_workers) AS name, SUM(report.accruals) AS inn')->leftJoin('report', 'company.id = report.company_id');

        if(!empty($params['Report']) && !empty($params['Report']['period']))
        {
            $period = Report::getListPeriodDB()[$params['Report']['period']];

            $periodFrom = Report::formatDBPeriodFrom($period);
            $periodTo = Report::formatDBPeriodTo($period);

            $query = $query->where('period >="' . $periodFrom . '" AND period <="' . $periodTo . '"');
        }
        
        $query = $query->groupBy('industry_id');
        
       /* SELECT industry_id, AVG(report.amount_of_workers) AS amount_of_workers, SUM(report.accruals) AS accruals  FROM `company` LEFT JOIN `report` ON company.id = report.company_id WHERE `period` = '2017-05-23' GROUP BY industry_id*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
