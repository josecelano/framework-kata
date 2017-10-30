<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Marketing;

use JoseCelano\Component\BaseReactComponent;

class Marketing extends BaseReactComponent
{
    public function render(callable $render)
    {
        return <<<EOT
        <div class="row marketing">
        
            <div class="col-lg-6">
            
                <h4>No third-party packages</h4>
                <p>No external dependencies used for production code. You can hack any part of the framework.</p>
        
                <h4>Router</h4>
                <p>Simple router to easy build any new url page needed for your kata.</p>
        
                <h4>Ready for tests</h4>
                <p>Unit and snapshot testing. Acceptance testing cooming soon!</p>
                
            </div>
        
            <div class="col-lg-6">
            
                <h4>IoC Container</h4>
                <p>Small but powerful framework. Forget duplicate code for instantiating services. Focus on you kata goal.</p>
            
                <h4>React style PHP components</h4>
                <p>Build your templatse like a boss, like the frontend people do it, with classes.</p>
        
                <h4>Vue style PHP components</h4>
                <p>Select you preferred component style: React or Vue.</p>
                
            </div>
            
        </div>
EOT;
    }
}