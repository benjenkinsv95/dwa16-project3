<?php

/**
 * Created by IntelliJ IDEA.
 * User: ben
 * Date: 10/10/2016
 * Time: 8:21 PM
 */
class LoremIpsumGeneratorTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLoadCorrectNumberOfParagraphs()
    {
        $generator = new \Project3\Http\Controllers\LoremIpsumGeneratorController();
        $paragraphs = $generator->getPoemSentences();
        dump($paragraphs);
        $size = count($paragraphs);
        self::assertEquals(24, $size);
    }
}