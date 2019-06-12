<?php
require_once("view.php");

class PostCreateView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Редактирование рекламы", "Редактирование рекламы", '', siteLogo, false);
        ?><div id="news">
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
        </div>
        <?php
        $this->template->getFooter();
    }
}