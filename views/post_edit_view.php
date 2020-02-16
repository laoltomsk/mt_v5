<?php
require_once("view.php");

class PostEditView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Редактирование записи ".$data['post']['title'], $data['post']['lead'], $data['post']['category'], siteLogo, false, $data['ads']);
        ?>
        <div class="container" id="editor">
            <form action="/controllers/editPost.php" method="POST">
                <div class="part" id="headline">
                    <div class="block large">
                        <div class="left">Название:</div>
                        <div class="main">
                            <input name="title" placeholder="До 70 символов" value="<?php echo $data['post']['title'] ?>" maxlength="70">
                        </div>
                    </div>
                    <div class="block">
                        <div class="left">Подводка:</div>
                        <div class="main">
                            <textarea id="lead" name="lead" placeholder="Текст подводки" class="smallTextarea"><?php echo $data['post']['lead'] ?></textarea>
                        </div>
                    </div>
                    <div class="block" data-type="raw">
                        <div class="left">Код новости:</div>
                        <div class="main">
                            <textarea placeholder="Не оставляйте меня пустым!!!" name="text"><?php echo $data['post']['text'] ?></textarea><br>
                        </div>
                    </div>
                    <div class="block">
                        <div class="left">
                            Дополнительно:
                        </div>
                        <div class="main">
                            <input name="pic" placeholder="Картинка (???)" value="<?php echo $data['post']['pic'] ?>"><br>
                            <input name="author" placeholder="Подпись автора" value="<?php echo $data['post']['author'] ?>"><br>
                            <input name="src" placeholder="По материалам... (только если нужно)" value="<?php echo $data['post']['src'] ?>"><br>
                            <input name="tags" placeholder="Тэги (через запятую)" value="<?php echo implode(", ", $data['post']['tags'])?>"><br>
                            <select name="category">
                                <option value="news">Новости</option>
                                <option value="reviews">Обзоры</option>
                                <option value="games">Игры</option>
                                <option value="blog">Статьи</option>
                            </select>
                            <input type="hidden" name="id" value="<?php echo $data['post']['id'] ?>">
                            <input type="submit" value="Отправить" onclick="sendFormData()" class="left"><br>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        $this->template->getFooter($data['ads']);
    }
}