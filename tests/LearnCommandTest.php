<?php

namespace Exzachlyvv\LaravelLearn\Tests;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class LearnCommandTest extends BaseTest
{
    /** @test */
    public function learnCommandWillDisplayAFactToTheConsoleFromTheApi()
    {
        Http::fake([
            'learnlaravelphp.com/learn' => Http::response([
                'data' => [
                    'text' => [
                        'Did you know?',
                        '',
                        '<options=bold>In PHP 8, there is support for a native nullsafe operator. Goodbye optional() helper method 👋</>',
                        '',
                        '<fg=#328af1>public function</> getLocation(User <fg=bright-cyan>$user</>)',
                        '{',
                        '    <fg=#328af1>return</> <fg=bright-cyan>$user</>-><fg=bright-cyan>profile</>?-><fg=bright-cyan>location</><fg=bright-red>;</>',
                        '}',
                        '',
                    ],
                ],
            ]),
        ]);

        $this->artisan('learn')
            ->expectsOutput('Did you know?')
            ->expectsOutput('')
            ->expectsOutput('In PHP 8, there is support for a native nullsafe operator. Goodbye optional() helper method 👋')
            ->expectsOutput('')
            ->expectsOutput('public function getLocation(User $user)')
            ->expectsOutput('{')
            ->expectsOutput('    return $user->profile?->location;')
            ->expectsOutput('}')
            ->expectsOutput('')
            ->assertExitCode(0)
        ;
    }
}
