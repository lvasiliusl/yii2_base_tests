<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

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
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
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

    Yii::$app->view->title = 'Table page';

    return $this->render('table', [
      'random_int' => $random_int,
    ]);
  }
}
