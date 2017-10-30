<?php

namespace JoseCelano\Tests;

class SnapshotTestClass extends BaseTestClass
{
    protected $componentClass;

    protected function snapshotFor($className)
    {
        $snapshotPath = $this->snapshotPath($className);
        $this->createSnapshotIfNotExist($className, $snapshotPath);
        $html = file_get_contents($snapshotPath);
        return $html;
    }

    protected function createSnapshotIfNotExist($className, $snapshotPath)
    {
        if (!is_file($snapshotPath)) {
            $html = captureRender($className);
            file_put_contents($snapshotPath, $html);
        }
    }

    protected function snapshotPath($className)
    {
        $snapshotPath = __DIR__ . '/__snapshots__/' . md5($className) . '.html';
        return $snapshotPath;
    }

    protected function expectRender($componentClass, $props = [])
    {
        $html = captureRender($componentClass, $props);
        $this->componentClass = $componentClass;
        return $this->expect($html);
    }

    protected function toBeLikeSnapshot()
    {
        $html = $this->snapShotFor($this->componentClass);
        $snapshotPath = $this->snapshotPath($this->componentClass);
        $this->assertEquals($html, $this->object, "Component render does not match current snapshot for \\{$this->componentClass} class. \nSnapshot path: {$snapshotPath}");
    }
}