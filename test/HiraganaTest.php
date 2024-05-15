<?php

use PHPUnit\Framework\TestCase;
use Tsumari\Hiragana;
use Dotenv\Dotenv;

class HiraganaTest extends TestCase
{
    public function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }

    public function testConvert()
    {
        $mockGooAppId = $_ENV['GOO_APP_ID'] ?? '';
        $sentence = 'これはテスト用の文字列です。';

        $hiraganaConverter = new Hiragana();
        $result = $hiraganaConverter->convert($mockGooAppId, $sentence);

        $expected = 'これは てすとようの もじれつです。';
        $this->assertEquals($expected, $result);
    }

    public function testInvalidAppId()
    {
        $mockGooAppId = '';
        $sentence = 'これはテスト用の文字列です。';

        $hiraganaConverter = new Hiragana();
        $result = $hiraganaConverter->convert($mockGooAppId, $sentence);

        $expected = 'これはテスト用の文字列です。';
        $this->assertEquals($expected, $result);
    }
}
