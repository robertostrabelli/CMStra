<?php
defined('rodape') or die ("Error" . htmlentities($Erro2, ENT_QUOTES, "utf-8"));
$Erro2 = 'Error';
$conteudor1 = '
</div>
</article>
</div>
</main>
<footer>
<div class="footer">
<hr>
<p><small>Ⓒ CMStra <a target="_blank" rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons</a>.</small></p>
<p class="top"><a href="#toptop">[Top]</a></p>
</div>
</footer>

</body>
</html>
';
echo html_entity_decode($conteudor1, ENT_HTML5, "utf-8");
