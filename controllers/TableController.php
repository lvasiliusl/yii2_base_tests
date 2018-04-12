<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;

class TableController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['index'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actionIndex()
  {

    // Build array
    for($i = 0; $i < 5; $i++){
      $random_int[$i][] = random_int(30, 60);
      for ($x = 0; $x < 4; $x++) {
        if ($x != 0) {
          $random_int[$i][] = $random_int[$i][$x-1] * 2;
        }
      }
    }

    // Build data provider
    $dataProvider = new ArrayDataProvider([
      'allModels' => $random_int,
      'pagination' => false,
    ]);

    Yii::$app->view->title = 'Table page';

    return $this->render('table', [
      'random_int' => $random_int,
      'dataProvider' => $dataProvider,
    ]);
  }
}
