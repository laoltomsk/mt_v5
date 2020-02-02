<?php
require_once("view.php");

class AdSetView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Редактирование рекламы", "Редактирование рекламы", '', siteLogo, false, $data['ads']);
        ?><div id="news">
            <h2>Плашки топ-3</h2>
            <form action="/controllers/updateTop3.php" method="POST">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                    <select name="index<?php echo $i+1 ?>">
                        <?php for ($j = 0; $j < count($data['ideas']); $j++) { ?>
                            <option value="<?php echo $data['ideas'][$j]['id'] ?>"><?php echo $data['ideas'][$j]['title'] ?></option>
                        <?php } ?>
                        <option value="<?php echo $data['ads']['top3'][$i]['id'] ?>" selected>Сохранить текущее</option>
                    </select><br>
                <?php } ?>
                <input type="submit">
            </form>
            <br>
            <h2>Брендирование для ПК</h2>
            <?php for ($i = 0; $i < count($data['brandings']); $i++) { ?>
                <form action="/controllers/deleteBranding.php" method="POST" class="brandingListItem">
                    <a href="<?php echo $data['brandings'][$i]->link ?>">
                    <input type="hidden" name="id" value="<?php echo $data['brandings'][$i]->id ?>">
                    <img src="/photo/rek/branding/<?php echo $data['brandings'][$i]->id ?>_1920.jpg"
                    style="border: 3px solid <?php echo $data['brandings'][$i]->color ?>">
                    </a>
                    <input type="submit" value="Удалить">
                </form>
            <?php } ?>
            <form action="/controllers/addBranding.php" method="POST" enctype="multipart/form-data">
                <b>Добавить:</b><br>
                Изображение шириной 1280: <input name="image1280" type="file" required><br>
                Изображение шириной 1440: <input name="image1440" type="file" required><br>
                Изображение шириной 1920: <input name="image1920" type="file" required><br>
                Ссылка для перехода по клику: <input name="link"><br>
                Ссылка для пикселя (пустая, если не нужен): <input name="pixel"><br>
                Цвет фона: <input name="color" type="color"><br>
                <input type="submit">
            </form>
            <br>
            <h2>Брендирование для мобилок</h2>
            <?php for ($i = 0; $i < count($data['mobileBrandings']); $i++) { ?>
                <form action="/controllers/deleteMobileBranding.php" method="POST" class="brandingListItem">
                    <a href="<?php echo $data['mobileBrandings'][$i]->link ?>">
                        <input type="hidden" name="id" value="<?php echo $data['mobileBrandings'][$i]->id ?>">
                        <img src="/photo/rek/branding/<?php echo $data['mobileBrandings'][$i]->id ?>_761.jpg"
                             style="border: 3px solid <?php echo $data['mobileBrandings'][$i]->color ?>">
                    </a>
                    <input type="submit" value="Удалить">
                </form>
            <?php } ?>
            <form action="/controllers/addMobileBranding.php" method="POST" enctype="multipart/form-data">
                <b>Добавить:</b><br>
                Изображение шириной 761: <input name="image761" type="file" required><br>
                Ссылка для перехода по клику: <input name="link"><br>
                Ссылка для пикселя (пустая, если не нужен): <input name="pixel"><br>
                Цвет фона: <input name="color" type="color"><br>
                <input type="submit">
            </form>
        </div>
        <?php
        $this->template->getFooter($data['ads']);
    }
}