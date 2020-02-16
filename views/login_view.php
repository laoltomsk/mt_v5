<?php
require_once("view.php");

class LoginView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Mobiltelefon.ru: вход", siteDescription, '', siteLogo, false, $data['ads']);
        ?>
        <div class="container" id="editor">
            <form action="/controllers/login.php" method="POST">
                <div class="part">
                    <div class="block">
                        <div class="left">Вход на сайт</div>
                        <div class="main">
                            <input placeholder="Логин" name="login"><br>
                            <input placeholder="Пароль" type="password" name="password"><br>
                            <input type="submit" value="Войти">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        $this->template->getFooter($data['ads']);
    }
}