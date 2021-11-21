<?php
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function test_percent_grade(){
        $function_under_test = percent_grade(0, 10);
        $this->assertSame(0, $function_under_test);
        
    }
}
?>