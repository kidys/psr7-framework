<?php
namespace Tests\Framework\Http;

use App\Framework\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 * @package Tests\Framework\Http
 */
class RequestTest extends TestCase
{
    /**
     * Void testing
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