<?php
namespace App\Tests;

use App\Entity\Movies;

class MoviesTest extends \Codeception\Test\Unit
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
    public function testGetMovieFeature()
    {
      $this->tester->seeInRepository(Movies::class, [
        'name' => 'Avatar'
      ]);
    }

    public function testAddMovieFeature()
    {

      $movie= new Movies;
      $movie->setName('Deux jours, une nuit');
      $movie->setDate(new \DateTime('2014-01-01'));
      $movie->setDescription('Cool');
      $movie->setCountry('Cool');
      $movie->setCover('Cool');
      $movie->setLink('Cool');

      $em = $this->getModule('Doctrine2')->em;
      $em->persist($movie);
      $em->flush();

      $this->assertEquals('Deux jours, une nuit', $movie->getName());
      $this->tester->seeInRepository(Movies::class, ['name' => 'Deux jours, une nuit']);
    }
}
