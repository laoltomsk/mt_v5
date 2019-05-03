<?php
require_once("view.php");

class LoginView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader();
        ?><h2>Прислать новость</h2>
            <form action="/controllers/sendTip.php" method="POST">
                <textarea name="login">
                    О чём вы хотите рассказать?
                </textarea><br>
                <input name="contact" placeholder="Как нам с вами связаться? (необязательно)"><br>
                <input name="check" placeholder="Captcha: напишите, какой сейчас год">
                <input type="submit">
            </form>
        <?php
        $this->template->getFooter();
    }
}