<?php
require_once("view.php");

class ErrorView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader(siteTitle.". Ошибка ".$data['error'], siteDescription, '', siteLogo, false);
        ?>
        <h3>Ой. Случилась ошибка. Номер ошибки: <?php echo $data['error'] ?></h3>
        <?php
        $this->template->getFooter();
    }
}