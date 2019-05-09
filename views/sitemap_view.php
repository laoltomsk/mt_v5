<?php
require_once("view.php");

class SiteMapView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Mobiltelefon.ru: карта сайта", siteDescription, '', siteLogo, false);
        ?><div id="news"><?php
            for ($i = 0; $i < count($data['news']); $i++) {
                ?>
                <p><?php print date("d.m.Y", $data['news'][$i]['id']) ?> :
                    <a href="/post_<?php echo $data['news'][$i]['id']?>.html"><?php print $data['news'][$i]['title'] ?></a></p>
                <?php
            }

            ?>
        </div>
        <?php
        $from = max($data['page']-5, 0); $to = min($from+10, $data['numberOfPages']-1);
        for ($i = $from; $i < $to; $i++) {
            if ($i != $data['page']) {
                echo "<a href='/contents_all_".$i.".html'>".($i+1)."</a> ";
            }
            else {
                echo "<b>".($i+1)."</b> ";
            }
        }
        $this->template->getFooter();
    }
}