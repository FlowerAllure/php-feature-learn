<?php

namespace FlowerAllure\PHPFeatureLearn;

use Closure;

/**
 * 匿名函数
 */
class ClosureLearn
{
    public function __construct(public mixed $val = null)
    {
    }

    public function getVal()
    {
        return $this->val;
    }


    public function getClosure(): Closure
    {
        return function (){ return $this->val;};
    }


    // 静态匿名函数
    public function bar(): Closure
    {
        return static function() {return $this;};
    }

    // 非静态匿名函数
    public function baz(): Closure
    {
        return function () {return $this;};
    }
}
