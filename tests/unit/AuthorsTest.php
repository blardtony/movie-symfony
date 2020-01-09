<?php
namespace App\Tests;
use App\Entity\Authors;

class AuthorsTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetAuthorFeature()
    {
      $this->tester->seeInRepository(Authors::class, [
        'name' => 'Dean Devlin'
      ]);
    }

    public function testAddAuthorFeature()
    {

      $authors = new Authors;
      $authors->setName('Tony Blard');
      $authors->setBirthday(new \DateTime('1998-09-16'));
      $authors->setNationality('Cool');
      $authors->setBiography('Cool');
      $authors->setPhoto('Cool');
      $authors->setLink('Cool');

      $em = $this->getModule('Doctrine2')->em;
      $em->persist($authors);
      $em->flush();

      $this->assertEquals('Tony Blard', $authors->getName());
      $this->tester->seeInRepository(Authors::class, ['name' => 'Tony Blard']);
    }
}
