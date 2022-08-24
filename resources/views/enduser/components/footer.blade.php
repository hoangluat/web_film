<?php
    $logo = \App\Models\Config::first();

?>
<div id="footer">
        <div class="content">
            <div class="views-row views-row-1" style="max-width:1000px">
                <div class="logo-footer"> <a href="index.html"> <img title="bilutv, phim mới chất lượng cao"
                            alt="bilutv phim mới" src="{{ \App\Helper\Functions::getImage('config',$logo-> logo) }}"  style="height:50px;wight: 60px;" /> </a> </div>
                <div class="copy-right">
                    <p> Copyright ® 2021 Anime Full ver 1.0 All Rights Reserved. <br> <b>Anime Full - xem anime mới
                            vietsub</b> <br>Liên hệ: <a href="cdn-cgi/l/email-protection.html" class="__cf_email__"
                            data-cfemail="23414a4f5657550d4c514463444e424a4f0d404c4e">[email&#160;protected]</a> <br> <a
                            href="sitemap.xml">sitemap</a> | <a href="page/lien-he.html">contact</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="s-gotop-wrap"> <button class="s-btn-gotop">Về đầu trang</button></div>