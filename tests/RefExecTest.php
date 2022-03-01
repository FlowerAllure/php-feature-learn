<?php

namespace FlowerAllure\PHPFeatureLearn\Test;

/**
 * 程序的执行函数
 * shell_exec：命令执行结果以字符串的方式返回，不输出
 * exec: 返回命令输出的最后一行，但可以通过第二个参数填充执行结果，不输出
 * passthru: 输出命令的执行结果
 * system: 输出命令的执行结果，并返回命令输出的最后一行
 */
class RefExecTest extends TestCase
{
    //-------------shell_exec 的测试-----------------
    public function testShellExec()
    {
        $output = shell_exec('ls /');
        var_dump($output);
    }

    //-------------exec 的测试-----------------
    public function testExecArg1()
    {
        $output = exec('ls /');
        print_r($output);
    }

    //-------------exec 参数2的测试-----------------
    public function testExecArg2()
    {
        $result = exec('ls /', $output);
        var_dump($result);
        print_r($output);
    }

    //-------------exec 参数3的测试-----------------
    public function testExecArg3()
    {
        $result = exec('ls /', $output, $resultVar);
        var_dump($result);
        print_r($output);
        print_r($resultVar);
    }

    //-------------passthru 的测试-----------------
    public function testPassThru()
    {
        passthru('ls /');
    }

    //-------------System 的测试-----------------
    public function testSystem()
    {
        $result = system('ls /');
        var_dump($result);
    }
}
