<?php
require_once("view.php");

class PostCreateView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader();
        ?><div id="news">
            <form action="/controllers/createPost.php" method="POST">
                <input name="title" placeholder="title"><br>
                <textarea name="lead">Lead</textarea><br>
                <input name="pic" placeholder="pic"><br>
                <textarea name="text">Text</textarea><br>
                <select name="category">
                    <option value="news">Новости</option>
                    <option value="reviews">Обзоры</option>
                    <option value="games">Игры</option>
                    <option value="blog">Статьи</option>
                </select><br>
                <input name="src" placeholder="src"><br>
                <input name="author" placeholder="author"><br>
                <input name="tags" placeholder="tag, tag, tag"><br>
                <input type="submit">
            </form>
        </div>
        <?php
        $this->template->getFooter();
    }
}