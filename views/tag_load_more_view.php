<?php
require_once("view.php");

class TagLoadMoreView extends View {
    public function show($data) {
        $this->checkMobile();

        for ($i = 0; $i < count($data['news']); $i++) {
            $this->template->printNewsCard($data['news'][$i]);
        }
    }
}