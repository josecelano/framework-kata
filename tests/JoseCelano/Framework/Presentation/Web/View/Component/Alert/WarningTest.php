<?php

namespace JoseCelano\Tests\Framework\Presentation\Web\View\Component\Alert;

use JoseCelano\Framework\Presentation\Web\View\Component\Alert\Warning;
use JoseCelano\Tests\SnapshotTestClass;

class WarningTest extends SnapshotTestClass
{
    /** @test */
    function it_should_render_like_snapshot()
    {
        $this->expectRender(Warning::class, ['message' => 'hello'])->toBeLikeSnapshot();
    }
}