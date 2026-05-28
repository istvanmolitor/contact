<?php

namespace Molitor\Contact\Tests\Feature;

use Molitor\Contact\Providers\ContactServiceProvider;
use Tests\TestCase;

class PackageSmokeTest extends TestCase
{
    public function test_service_provider_is_loaded(): void
    {
        $this->assertTrue(class_exists(ContactServiceProvider::class));
        $this->assertTrue($this->app->providerIsLoaded(ContactServiceProvider::class));
    }
}

