<?php
require_once("view.php");

class PostEditView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Редактирование записи ".$data['post']['title'], $data['post']['lead'], $data['post']['category'], siteLogo, false, $data['ads']);
        ?><form action="/controllers/editPost.php" method="POST">
            <input name="title" placeholder="title" value="<?php echo $data['post']['title'] ?>"><br>
            <textarea name="lead"><?php echo $data['post']['lead'] ?></textarea><br>
            <input name="pic" placeholder="pic" value="<?php echo $data['post']['pic'] ?>"><br>
            <textarea name="text"><?php echo $data['post']['text'] ?></textarea><br>
            <select name="category">
                <option value="news">Новости</option>
                <option value="reviews">Обзоры</option>
                <option value="games">Игры</option>
                <option value="blog">Статьи</option>
            </select><br>
            <input name="src" placeholder="src" value="<?php echo $data['post']['src'] ?>"><br>
            <input name="author" placeholder="author" value="<?php echo $data['post']['author'] ?>"><br>
            <input name="tags" placeholder="tag, tag, tag" value="<?php echo implode(", ", $data['post']['tags'])?>"><br>
            <input type="hidden" name="id" value="<?php echo $data['post']['id'] ?>">
            <input type="submit">
        </form>
        <?php
        $this->template->getFooter($data['ads']);
    }
}