<?php
require_once("view.php");

class PostCreateView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Создание поста", "Создание поста", '', siteLogo, false, $data['ads']);
        ?>
        <div class="container" id="editor">
            <div class="part" id="headline">
                <div class="block large">
                    <div class="left">Название:</div>
                    <div class="main">
                        <input placeholder="До 70 символов" maxlength="70">
                    </div>
                </div>
                <div class="block">
                    <div class="left">Подводка:</div>
                    <div class="main">
                        <textarea id="lead" placeholder="Текст подводки" class="smallTextarea"></textarea>
                    </div>
                </div>
            </div>

            <div class="part" id="content">

                <div class="block" data-type="paragraph">
                    <div class="left">Абзац:</div>
                    <div class="main">
                        <textarea placeholder="Текст новости"></textarea>
                    </div>
                </div>

                <div class="block" data-type="megabonus">
                    <div class="left">Абзац Megabonus</div>
                </div>

                <div class="block" data-type="youtube">
                    <div class="left">Видео с YouTube:</div>
                    <div class="main">
                        <input placeholder="Введите идентификатор">
                    </div>
                </div>

                <div class="block" data-type="picture">
                    <div class="left">Картинки:</div>
                    <div class="main">
                        <input type="file" multiple accept="image/jpeg,image/png,image/gif"><br>
                        <div class="preview"></div>
                        В строке: <input class="colnum" style="width: 50px" type="number" min="1" max="10" value="1"><br>
                        <input class="subscript" placeholder="Подпись под картинками (оставьте пустой, если не нужна)"><br>
                        <input class="notrename" type="checkbox" style="width: 1rem">Не переименовывать<br>
                        <input class="setsize" type="checkbox" style="width: 1rem">Тонкая настройка размеров (до 32 МБ)<br>
                        <input class="invisible" type="checkbox" style="width: 1rem">Невидимый блок
                    </div>
                </div>

                <div class="block" data-type="video">
                    <div class="left">Видеофайл:</div>
                    <div class="main">
                        <input placeholder="Ссылка на видео" class="link"><br>
                        <input class="vertical" type="radio" style="width: 1rem" name="orient">Вертикальное
                        <input type="radio" style="width: 1rem" name="orient" checked>Горизонтальное
                    </div>
                </div>

                <div class="block" data-type="link">
                    <div class="left">Жирное по центру:</div>
                    <div class="main">
                        <textarea placeholder="Жирный текст по центру" class="smallTextarea"></textarea>
                    </div>
                </div>

                <div class="block large" data-type="h2">
                    <div class="left">Раздел:</div>
                    <div class="main">
                        <input placeholder="Название">
                    </div>
                </div>

                <div class="block" data-type="redbutton">
                    <div class="left">Красная кнопка:</div>
                    <div class="main">
                        <input placeholder="Адрес ссылки" class="link"><br>
                        <input placeholder="Текст ссылки" class="text">
                    </div>
                </div>

                <div class="block" data-type="yandex">
                    <div class="left">Яндекс.Директ</div>
                </div>

                <div class="block" data-type="raw">
                    <div class="left">Произвольный код:</div>
                    <div class="main">
                        <textarea placeholder="Блок кода"></textarea><br>
                        <input type="checkbox" style="width: 1rem" class="isDiv" name="orient">Обернуть в div
                    </div>
                </div>

                <div class="add">
                    <button type="button" onclick="addToEnd();">Добавить</button>
                    <select>
                        <option value="paragraph">Абзац</option>
                        <option value="youtube">Видео с YouTube</option>
                        <option value="picture">Картинки</option>
                        <option value="video">Видеофайл</option>
                        <option value="raw">Произвольный код</option>
                        <option value="h2">Заголовок раздела</option>
                        <option value="link">Жирное по центру</option>
                        <option value="redbutton">Красная кнопка</option>
                        <option value="yandex">Яндекс.Директ</option>
                        <option value="megabonus">Абзац мегабонус</option>
                    </select>
                    <a class="delete" type="button">Х</a>
                </div>

            </div>

            <div class="part" id="submit">
                <div class="block">
                    <div class="left">
                        Дополнительно:
                    </div>
                    <div class="main">
                        <input id="author" placeholder="Подпись автора"><br>
                        <input id="source" placeholder="По материалам... (только если нужно)"><br>
                        <input id="sourceLink" placeholder="Ссылка на источник (только если нужна)"><br>
                        <input id="tags" placeholder="Тэги (через запятую)"><br>
                        <select id="category">
                            <option value="news">Новости</option>
                            <option value="reviews">Обзоры</option>
                            <option value="games">Игры</option>
                            <option value="blog">Статьи</option>
                        </select>
                    </div>
                </div>

                <div class="block">
                    <input type="button" value="Отправить" onclick="sendFormData()" class="left"><br>
                    <div class="main">
                        <div id="pb-container"><div id="pb"></div></div>
                        <a id="linkToCreatedPost">Перейти к посту</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flowingmenu">
            <button onclick="bold()"><b>B</b></button>
            <button onclick="itlc()"><i>I</i></button>
            <button onclick="line()"><u>U</u></button>
            <button onclick="link()">A</button>
            <br>
            <input placeholder="input://link.here/and/press/A">
        </div>
        <script src="/scripts/editor.js"></script>
        <?php
        $this->template->getFooter($data['ads']);
    }
}