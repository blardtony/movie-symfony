<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserCest
{
  public function _before(AcceptanceTester $I)
  {
  }

  // tests
  public function tryToSuccessLogin(AcceptanceTester $I)
  {
    //$I->amOnPage('/login');
    //$I->fillField('email', 'tonyblard55@gmail.com');
    //$I->fillField('password', 'alaji');
    //$I->click('Se connecter');
    //$I->see('Vous êtes connecté avec le nom tonyblard55@gmail.com');
    //$I->makeHtmlSnapshot();
  }
  public function tryToFailLogin(AcceptanceTester $I)
  {
    $I->amOnPage('/login');
    $I->fillField('email', 'cool@gmail.com');
    $I->fillField('password', 'alaji');
    $I->click('Se connecter');
    $I->see('Email could not be found');
  }
}
