<?php
require_once("view.php");

class SiteMapView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Mobiltelefon.ru: карта сайта", siteDescription, '', siteLogo, false, $data['ads']);
        if ($this->template instanceof MobileTemplate) {
            print "<h1 class='head_dTable_v2'>Карта сайта</h1>";
        }
        else {
            print "<h1>Карта сайта</h1>";
        }
        ?><div id="list_news"><?php
            for ($i = 0; $i < count($data['news']); $i++) {
                ?>
                <p><?php print date("d.m.Y", $data['news'][$i]['id']) ?>:
                    <a class="traditional_link" href="/post_<?php echo $data['news'][$i]['id']?>.html"><?php print $data['news'][$i]['title'] ?></a></p>
                <?php
            }
            ?>
            <div id="page_links">
                <?php
                $from = max($data['page']-5, 0); $to = min($from+10, $data['numberOfPages']-1);
                for ($i = $from; $i < $to; $i++) {
                    if ($i != $data['page']) {
                        echo "<a class='sitemap_pagelink' href='/contents_all_".$i.".html'>".($i+1)."</a> ";
                    }
                    else {
                        echo "<b>".($i+1)."</b> ";
                    }
                }
                ?>
            </div>
        </div>
        <?php
        $this->template->getFooter($data['ads']);
    }
}