<?php
namespace kouosl\duyuru\controllers\api;
use kouosl\duyuru\models\Duyuru;
use Yii;
class DuyuruController extends DefaultController {
	
	public $modelClass = 'kouosl\duyuru\models\Duyuru';
	public function actions() {
		$actions = parent::actions ();
	
		return $actions;
	}
	
	public function actionView($id){
		$model = Duyuru::findOne($id);
		
		if(!$model)
			return ['status' => '404','message' => 'Not Found'];
		return $model;
	}
	
	public function actionIndex(){
		return Duyuru::find()->all();
	}
	
	public function actionCreate(){
        $postParams = json_decode(Yii::$app->request->getRawBody(), true);        
        $model = new Duyuru();
        if ($model->load($postParams,'') && $model->validate()) {
            if ($odev = $model->signup()) {            
                return $odev;
            }
        }else{
            return ['status' => 500];
        }
	}
	
	public function actionUpdate($id){
		$postParams = json_decode(Yii::$app->request->getRawBody(), true);
		
		$model = Duyuru::findOne($id);
		if($model = $this->LoadModel($model, $postParams)){
				if($model->save())
					return $model;
				else 
					return ['status' => 101,'message' => $model->errors];
		}else
		    return ['status' => 100];
	}
	
	public function actionDelete($id){
		
		if(Duyuru::findOne($id)->delete())
			return ['status' => 1];
		else
			return ['status' => 100];
	}
	
	public function LoadModel($model,$params)
	{
		foreach ($params as $key => $value)
			$model->hasAttribute($key) ? $model->$key = $value : " "; 
			
		return $model;
	}
}