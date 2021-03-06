<?php

namespace Tests\Unit\AuthTests\RegisterTests;

use Tests\TestCase;
use Mockery;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use App\Http\Controllers\RegisterController;
use App\Contracts\RegisterContract;

class RegisterControllerTest extends TestCase
{
    use MakesHttpRequests;
    use DatabaseMigrations;
    private $controller;
    private $retriever;

    public function setUp()
    {
        parent::setUp();
        $this->retriever = Mockery::mock(RegisterContract::class);
        $this->controller = new RegisterController($this->retriever);
    }


    /**
     * @test
     * @group noFramework
     */
    public function registerStudentEmail_controller_returns_success()
    {
        $input = [
            "email" => "tes3t@email.com",
        ];

        $request = new Request($input);

        $expectedResponse = [];

        $this->retriever
            ->shouldReceive('registerStudentEmail')
            ->with($request)
            ->once()->andReturn($expectedResponse);

        $response = $this->retriever->registerStudentEmail($request);

        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * @test
     * @group noFramework
     */
    public function test_registerStudentEmail_http_call_ok()
    {
        $this->withoutMiddleware();

        $input = [
            "email" => "nikitha.batchu@metalab.csun.edu",
            "userId" => 1
        ];

        $response = $this->json('POST', "/api/auth/invite/student", $input);

        $response->assertStatus(201);
    }

}

