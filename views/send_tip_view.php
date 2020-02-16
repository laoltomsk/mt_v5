<?php
require_once("view.php");

class SendTipView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Mobiltelefon.ru: прислать новость", siteDescription, '', siteLogo, false, $data['ads']);
        ?>
        <div class="container" id="editor">
            <form action="/controllers/sendTip.php" method="POST">
                <div class="part">
                    <div class="block">
                        <div class="left">Прислать материал</div>
                        <div class="main">
                            <textarea name="tip">О чём вы хотите рассказать?</textarea><br>
                            <input name="contact" placeholder="Как нам с вами связаться? (необязательно)"><br>
                            <input name="check" placeholder="Captcha: напишите, какой сейчас год">
                            <input type="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        $this->template->getFooter($data['ads']);
    }
}