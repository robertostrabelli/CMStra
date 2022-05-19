<?php
defined('rodape') or die ("Error" . htmlentities($Error_footer, ENT_QUOTES, "utf-8"));
$Error_footer = 'Error';
$parte_footer = '
</div>
</article>
</div>
</main>
<footer>
<div class="footer">
<hr/>
'.$SiteFooterCode.'
'.$SiteFooterCopy.'
<p class="top"><a href="#top">[Top]</a></p>
</div>
</footer>
'.$SiteBodyCode.'
</body>
</html>
';

echo html_entity_decode($parte_footer, ENT_HTML5, "utf-8");
