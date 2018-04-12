<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<hr>

<div class="table-wrap col-md-6">
  <?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'summary'=>'',
    'itemView' => '_row',
    'options' => [
      'tag' => 'table',
      'class' => 'table table-bordered',
    ],
  ]);
  ?>
</div>
