<?php

/**
 * Created by IntelliJ IDEA.
 * User: ben
 * Date: 10/9/2016
 * Time: 11:45 AM
 */
class RandomUserGeneratorTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $randomUseGenerator = new \Project3\Http\Controllers\RandomUserGeneratorController();
        $numberOfUsers = 10;

        $this->assertEquals(0, $randomUseGenerator->getWidthOffset(1, $numberOfUsers));
        $this->assertEquals(0, $randomUseGenerator->getWidthOffset(2, $numberOfUsers));
        $this->assertEquals(1, $randomUseGenerator->getWidthOffset(3, $numberOfUsers));
        $this->assertEquals(1, $randomUseGenerator->getWidthOffset(4, $numberOfUsers));
        $this->assertEquals(1, $randomUseGenerator->getWidthOffset(5, $numberOfUsers));
        $this->assertEquals(2, $randomUseGenerator->getWidthOffset(6, $numberOfUsers));
        $this->assertEquals(2, $randomUseGenerator->getWidthOffset(7, $numberOfUsers));
        $this->assertEquals(2, $randomUseGenerator->getWidthOffset(8, $numberOfUsers));
        $this->assertEquals(3, $randomUseGenerator->getWidthOffset(9, $numberOfUsers));
        $this->assertEquals(3, $randomUseGenerator->getWidthOffset(10, $numberOfUsers));

        $this->assertEquals(1, $randomUseGenerator->getHeightOffset(1, $numberOfUsers));
        $this->assertEquals(2, $randomUseGenerator->getHeightOffset(2, $numberOfUsers));
        $this->assertEquals(0, $randomUseGenerator->getHeightOffset(3, $numberOfUsers));
        $this->assertEquals(1, $randomUseGenerator->getHeightOffset(4, $numberOfUsers));
        $this->assertEquals(2, $randomUseGenerator->getHeightOffset(5, $numberOfUsers));
        $this->assertEquals(0, $randomUseGenerator->getHeightOffset(6, $numberOfUsers));
        $this->assertEquals(1, $randomUseGenerator->getHeightOffset(7, $numberOfUsers));
        $this->assertEquals(2, $randomUseGenerator->getHeightOffset(8, $numberOfUsers));
        $this->assertEquals(0, $randomUseGenerator->getHeightOffset(9, $numberOfUsers));
        $this->assertEquals(1, $randomUseGenerator->getHeightOffset(10, $numberOfUsers));

    }
}