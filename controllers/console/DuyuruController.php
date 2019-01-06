<?php

namespace kouosl\odev\controllers\console;
use yii\console\Controller;

class DuyuruController extends Controller{

    public function actionIndex(){
        $duyuru = \Yii::$app->db
          ->createCommand("SELECT COUNT(*) FROM duyuru")
          ->queryScalar();
        print_r('Toplam duyuru sayısı: '.$duyuru);
        echo"\n";
    }
    public function actionDuyuru(){
        \Yii::$app->db
        ->createCommand()
        ->insert('duyuru', [
          'title'      => 'Test',
          'duyuru'   => 'Test İçerik.',
          'user_id' => 1,
          'kat_id' => 1,
          'status' => 'active',
          'sorted' => 1,
          'started' => time()-1,
          'ended' => time()+1,
          'modified' => time()
        ])
       ->execute();
    }
    public function actionDuyuruUpdate(){
        \Yii::$app->db
        ->createCommand()
        ->update('duyuru', [
        'modified' => time()
        ], '1 = 1')
        ->execute();
    }
    public function actionDuyuruDelete(){
       
            \Yii::$app->db
             ->createCommand()
            ->delete('duyuru', 'id = 1')
            ->execute();
        
       
    }
    public function actionDuyuruBatch(){
        \Yii::$app->db
    ->createCommand()
    ->batchInsert('duyuru', ['title', 'duyuru', 'user_id', 'kat_id', 'status', 'sorted', 'started', 'ended', 'modified'], 
    [
        ['Duyuru 1', 'Duyuru 1 İçeriği', 1, 1, 'active', 1, time()-1, time()+1, time()],
        ['Duyuru 2', 'Duyuru 2 İçeriği', 1, 1, 'passive', 2, time()-1, time()+1, time()],
        ['Duyuru 3', 'Duyuru 3 İçeriği', 1, 1, 'active', 3, time()-1, time()+1, time()],
        ['Duyuru 4', 'Duyuru 4 İçeriği', 1, 1, 'active', 4, time()-1, time()+1, time()]
    ])
    ->execute();
    }

}