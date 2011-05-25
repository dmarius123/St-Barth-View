            <div id="footer">
                <div id="footer-bar">
                    <div id="footer-bar-content">
                        <div id="footer-point-icon"></div>
                        <p id="footer-point-description">Shop you favorite product and  <span class="footer-white">you'll earn Points !</span> <a href=""> <span id="footer-read-more-arrow">></span> read more</a></p>
                    </div>
                </div>
                <div id="footer-content">
                    <ul>
                        <li><h4><?=$footer_about?></h4></li>
                        <li><?=anchor('who-we-are/', $footer_who_we_are, 'target="_self"')?></li>
                        <li><?=anchor('commitments/', $footer_commitments, 'target="_self"')?></li>
                        <li><?=anchor('contact-us/', $footer_contact_us, 'target="_self"')?></li>
                    </ul>
                    <ul>
                        <li><h4><?=$footer_help?></h4></li>
                        <li><?=anchor('faq/', $footer_faq, 'target="_self"')?></li>
                        <li><?=anchor('useful-information/', $footer_useful_information, 'target="_self"')?></li>
                        <li><?=anchor('sitemap', $footer_sitemap, 'target="_self"')?></li>
                    </ul>
                    <ul>
                        <li><h4><?=$footer_languages?></h4></li>
                        <li><a href="javascript:void()" target="_self"><?=$footer_english?></a></li>
                        <li><a href="javascript:void()" target="_self"><?=$footer_french?></a></li>
                    </ul>
                    <ul>
                        <li><h4><?=$footer_legal?></h4></li>
                        <li><?=anchor('terms/', $footer_terms, 'target="_self"')?></li>
                        <li><?=anchor('security/', $footer_security, 'target="_self"')?></li>
                    </ul>
                    <div id="footer-social-links">
                        <h4><?=$footer_follow_us?></h4>
                        <a id="footer-social-tw" href="javascript:void()"></a>
                        <a id="footer-social-fb" href="javascript:void()"></a>
                        <a id="footer-social-rss" href="javascript:void()"></a>
                        <a id="footer-social-mail" href="javascript:void()"></a>
                    </div>
                    <br class="clear" />
                    <p id="footer-copy"><?=$footer_copyright?></p>
                </div>
            </div>
        </div>
    </body>
</html>