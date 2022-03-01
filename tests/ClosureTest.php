<?php

namespace FlowerAllure\PHPFeatureLearn\Test;

use FlowerAllure\PHPFeatureLearn\ClosureChildrenLearn;
use FlowerAllure\PHPFeatureLearn\ClosureLearn;

/**
 * @method getVal()
 */
class ClosureTest extends TestCase
{
    // 匿名类 bindTo 的使用
    public function testBindTo()
    {
        $ob1 = new ClosureLearn(1);
        $ob2 = new ClosureLearn(2);

        $cl = $ob1->getClosure();
        echo $cl();

        echo PHP_EOL;

        $cl = $cl->bindTo($ob2);
        echo $cl();
    }

    // 匿名类 call 的使用
    public function testCall()
    {
        $ob1 = new ClosureLearn(3);
        $ob2 = new ClosureLearn(4);

        $closure = fn($delta) => $this->getVal() + $delta;

        echo_print($closure->call($ob1, 3));
        echo_print($closure->call($ob2, 4));
    }

    // 匿名子类的使用
    public function testNoStaticClosure()
    {
        $fooChildren = new ClosureChildrenLearn();
        $baz = $fooChildren->baz();
        echo_export($baz());
    }

    // 静态匿名类的使用
    public function testStaticClosure()
    {
        $fooChildren = new ClosureChildrenLearn();
        $bar = $fooChildren->bar();
        echo_export($bar());
    }
}
