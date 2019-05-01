<?php

class View {
    public $template;

    public function show($data) {

    }

    protected function checkMobile() {
        require_once("../libs/mobile_detect/Mobile_Detect.php");
        require_once("mobile_template.php");
        require_once("pc_template.php");
        $md = new Mobile_Detect();

        if ($md->isMobile()) {
            $this->template = new MobileTemplate();
        } else {
            $this->template = new PCTemplate();
        }
    }
}