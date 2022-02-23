<?php

namespace FlowerAllure\PHPFeatureLearn\Test;

class ArrowTest extends TestCase
{
    /**
     * 箭头函数自动捕捉变量的值
     */
    public function testFeature1()
    {
        $y = 1;
        $fn1 = fn($x) => $x + $y;
        // 相当于通过 value 使用 $y
        $fn2 = function($x) use ($y) {
            return $x + $y;
        };
        var_export($fn1(3));
    }

    /**
     * 箭头函数自动捕捉变量的值，即时在嵌套的情况下
     */
    public function testFeature2()
    {
        $z = 1;
        $fn = fn($x) => fn($y) => $x * $y * $z;

        var_export($fn(5)(10));
    }

    /**
     * 合法的箭头函数例子
     */
    public function testFeature3()
    {
        fn(array $x) => $x;
        static fn($x): int => $x;
        fn($x = 42) => $x;
        fn(&$x) => $x;
        fn&($x) => $x;
        fn($x, ...$rest) => $rest;
    }

    /**
     * 来自外部范围的值不能在箭头函数内修改
     */
    public function testFeature4()
    {
        $x = 1;
        $fn1 = fn() => $x++;
        $fn1();
        var_export($x);
    }

    public function testFeature5()
    {
        $x = 1;
        $fn1 = fn(&$x) => ($x = 2);
        $fn1($x);
        var_export($x);
    }

    public function testFeature6()
    {
        $a = 1;
        $b = &$a;
        $a = 3;
        var_export($b);

        $fn1 = fn&($x) => $x;
        $fn2 = $fn1;

        var_export($fn2(11));
        var_export($a);
    }
}
