<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class AuthorsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToAddAuthors(AcceptanceTester $I)
    {
      $I->amOnPage('/admin/authors/add');
      $I->fillField('author[name]', 'Tony Blard');
      $I->fillField('author[nationality]','Français');
      $I->fillField('author[biography]','En formation pour devenir développeur');
      $I->fillField('author[photo]','cool');
      $I->fillField('author[link]','cool');
      $I->selectOption('author[birthday][day]','1');
      $I->selectOption('author[birthday][month]','January');
      $I->selectOption('author[birthday][year]','1950');
      $I->click('author[Enregistrer]');

    }
}
