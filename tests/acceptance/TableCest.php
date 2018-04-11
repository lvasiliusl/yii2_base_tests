<?php

use yii\helpers\Url;

/**
 *
 */
class TableCest
{
  public function _before(\AcceptanceTester $I)
  {
    $I->amOnPage(Url::toRoute('/table'));
  }

  public function tablePageWorks(AcceptanceTester $I)
  {
    $I->wantTo('ensure that table page works');
    $I->see('Table page', 'h1');
  }

  public function ensureThatTableCorrect(AcceptanceTester $I)
  {
    $I->amGoingTo('check table data');

    /* Check tabe content */
    for ($i=0; $i < 5; $i++) {
      for ($x=0; $x < 4; $x++) {
        // Check cells number from data attribute
        if ($x === 0) {
          // Check the data of the first cell
          $cell_number = (int)$I->grabAttributeFrom('.table-row-'.$i.' .table-col-'.$x, 'data');
          $I->assertGreaterThanOrEqual(30, $cell_number, 'First cell number must be greater than 30.');
        } else {
          // Check the data of the all next cells
          $current_cell_number = (int)$I->grabAttributeFrom('.table-row-'.$i.' .table-col-'.$x, 'data');
          $previous_cell_number = (int)$I->grabAttributeFrom('.table-row-'.$i.' .table-col-'.($x-1), 'data');
          $I->assertEquals($previous_cell_number*2, $current_cell_number, 'Cell number must be twice the previous.');
        }
      }
    }

  }
}
