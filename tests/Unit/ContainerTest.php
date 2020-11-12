<?php

namespace Kusabi\Container\Tests\Unit;

use Kusabi\Container\Container;
use Kusabi\Container\NotFoundException;
use PHPUnit\Framework\TestCase;
use Psr\Container\NotFoundExceptionInterface;

class ContainerTest extends TestCase
{
    public function provideDataTypes()
    {
        $object = (object) [1, 2, 3];
        $callback = function () {
            return 1;
        };
        return [
            [false, false],
            [true, true],
            [1, 1],
            [1.1, 1.1],
            ['a', 'a'],
            ['success', 'success'],
            [$object, $object],
            [$callback, 1]
        ];
    }

    public function testDelete()
    {
        $container = new Container();
        $this->assertFalse($container->has('a'));
        $container->set('a', 1);
        $this->assertTrue($container->has('a'));
        $container->delete('a');
        $this->assertFalse($container->has('a'));
    }

    public function testDeleteThrowsNotFoundException()
    {
        $this->expectException(NotFoundExceptionInterface::class);
        $this->expectException(NotFoundException::class);
        $container = new Container();
        $container->delete('a');
    }

    public function testGetThrowsNotFound()
    {
        $this->expectException(NotFoundExceptionInterface::class);
        $this->expectException(NotFoundException::class);
        $container = new Container();
        $container->get('test');
    }

    public function testHas()
    {
        $container = new Container();
        $this->assertFalse($container->has('test'));
        $container->set('test', 1);
        $this->assertTrue($container->has('test'));
    }

    /**
     * @dataProvider provideDataTypes
     *
     * @param mixed $set
     * @param mixed $get
     */
    public function testSetBasic($set, $get)
    {
        $container = new Container();
        $container->set('value', $set);
        $this->assertSame($get, $container->get('value'));
    }

    public function testSetReference()
    {
        $array = [1, 2, 3];
        $container = new Container();
        $container->set('a', $array);
        $container->setReference('b', $array);
        $array[] = 4;
        $this->assertSame([1, 2, 3], $container->get('a'));
        $this->assertSame([1, 2, 3, 4], $container->get('b'));
    }
}
