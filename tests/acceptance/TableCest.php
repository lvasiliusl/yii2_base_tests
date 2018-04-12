<?php

use yii\helpers\Url;
use \Codeception\Util\Debug;

/**
 *
 */
class TableCest
{
  public function _before(\AcceptanceTester $I)
  {
    /* Login for access to table page */
    $I->amOnPage(Url::toRoute('/site/login'));
    $I->see('Login', 'h1');

    $I->amGoingTo('try to login with correct credentials');
    $I->fillField('input[name="LoginForm[username]"]', 'admin');
    $I->fillField('input[name="LoginForm[password]"]', 'admin');
    $I->click('login-button');
  }

  public function tablePageWorks(AcceptanceTester $I)
  {
    $I->wantTo('ensure that table page works');
    $I->see('Table page', 'h1');
  }

  public function ensureThatTableCorrect(AcceptanceTester $I)
  {
    $table_col = [];
    $table_cels = [];
    $table_rows = [];

    $I->amGoingTo('check table data');
    $table_rows = $I->grabMultiple('tr.table-row');

    foreach ($table_rows as $key => $value) {
      $table_col = explode('  ', $value);

      foreach ($table_col as $key => $val) {
        // Build current row cels array
        $table_cels[] = (int)trim($val);
      }

      $I->assertGreaterThanOrEqual(30, (int)$table_cels[0], 'First cell number must be greater than 30.');
      for ($i=0; $i < count($table_cels); $i++) {
        if ($i > 0) {
          $I->assertEquals($table_cels[$i-1]*2, $table_cels[$i], 'Cell number must be twice the previous.');
        }
      }
      // Erase current row cels array
      $table_cels = [];
    }

  }
}
