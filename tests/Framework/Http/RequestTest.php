<?php
namespace Tests\Framework\Http;

use App\Framework\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 * @covers \App\Framework\Http\Request
 * @package Tests\Framework\Http
 */
class RequestTest extends TestCase
{
    /**
     * Void testing
     * @covers \App\Framework\Http\Request::getQueriesParams
     * @covers \App\Framework\Http\Request::getParsedBody
     */
    public function testEmpty() : void
    {
        $_GET = $_POST = [];
        $request = new Request();

        self::assertEquals([], $request->getQueriesParams());
        self::assertNull($request->getParsedBody());
    }

    /**
     * Testing to get $_GET query parameters
     * @covers \App\Framework\Http\Request::getQueriesParams
     */
    public function testQueryParams() : void
    {
        $_GET = $data = [
            'name' => 'Denis',
            'age' => 35
        ];
        $_POST = [];
        $request = new Request();

        self::assertEquals($data, $request->getQueriesParams());
        self::assertNull($request->getParsedBody());
    }

    /**
     * Testing for $_POST query parameters
     * @covers \App\Framework\Http\Request::getParsedBody
     */
    public function testParsedBody() : void
    {
        $_GET = [];
        $_POST = $data = [
            'name' => 'Denis',
            'age' => 35
        ];
        $request = new Request();

        self::assertEquals([], $request->getQueriesParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}