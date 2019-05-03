<?php
require_once("view.php");

class LoginView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader();
        ?><div id="news">
            <form action="/controllers/login.php" method="POST">
                <input name="login"><br>
                <input name="password" type="password"><br>
                <input type="submit">
            </form>
        </div>
        <?php
        $this->template->getFooter();
    }
}