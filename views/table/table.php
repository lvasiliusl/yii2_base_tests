<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<hr>

<div class="table-wrap col-md-6">
  <table class="table table-bordered">
    <?php for ($i=0; $i < 5; $i++): ?>
      <tr class="table-row-<?= $i ?>">
      <?php for ($x=0; $x < 4; $x++): ?>
          <td class="table-col-<?= $x ?>" data="<?= $random_int[$i][$x]; ?>"><?= $random_int[$i][$x]; ?></td>
      <?php endfor; ?>
      </tr>
    <?php endfor; ?>
  </table>
</div>
