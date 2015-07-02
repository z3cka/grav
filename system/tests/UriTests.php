<?php
namespace Grav;


use Grav\Common\GravTrait;
use Grav\Common\Uri;

class UriTests extends \PHPUnit_Framework_TestCase
{
    use GravTrait;

    public function testInit()
    {
        $uri = self::getGrav()['uri'];
        $uri->url = '/blog/focus-and-blur';
        $uri->init();

        $this->assertEquals('http://localhost/blog/focus-and-blur', $uri->url);
    }
}
