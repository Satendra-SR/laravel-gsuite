<?php

namespace ColoredCow\LaravelGSuite\Test;

use ColoredCow\LaravelGSuite\Services\Service;
use Illuminate\Contracts\Container\BindingResolutionException;

class ServiceTest extends TestCase
{
    protected $service;

    public function setUp() {
        parent::setUp();
        $this->service = $this->getMockForAbstractClass(Service::class);
    }

	/** @test */
	public function a_standalone_service_cant_be_initialized()
	{
        $this->expectException(BindingResolutionException::class);
        $serviceClass = app(Service::class);
    }

    /** @test */
	public function it_will_have_an_initialized_google_client()
	{
        $this->assertInstanceOf(\Google_Client::class, $this->service->getClient());
    }
}
