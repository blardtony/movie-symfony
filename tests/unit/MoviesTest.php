<?php
namespace App\Tests;

use App\Entity\Movies;
use App\Repisotory\MoviesRepository;

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
    public function testSomeFeature()
    {
      $userRepository = $this->make(Movies::class, ['find' => new User]);
      $userRepository->find(1); // => User
      $user = new User();

      $user->setName(null);
      $this->assertFalse($user->validate(['username']));
    }
}
