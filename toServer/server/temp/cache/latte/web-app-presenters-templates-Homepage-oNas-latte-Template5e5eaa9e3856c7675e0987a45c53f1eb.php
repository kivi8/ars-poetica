<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Homepage/oNas.latte

class Template5e5eaa9e3856c7675e0987a45c53f1eb extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('74bc132091', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb722f1b0929_title')) { function _lb722f1b0929_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>O nás<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbed80d549f8_content')) { function _lbed80d549f8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h4>
Kdo jsme?
</h4>
<p>
Jsme projekt, který si klade za cíl, být co nejvíce otevřený a nechat sdílet své myšlenky všem, kdo mají zajímavé nápady a chtějí se o ně podělit. Toho se snažíme docílit dvěma způsoby. 
Zaprvé prostřednictvím našeho internetového časopisu, ve kterém sdílíme všechny zajímavé projekty, reportáže, recenze a mnoho dalšího. Nebo formou námi pořádaných akcí, jako jsou výstavy, koncerty nebo autorská čtení. 
</p>
<h4>
Jak se můžu zapojit?
</h4>
<p>
Jednoduše. Stačí nám napsat na naší facebookovou stránku, případně nám pomocí redakčního emailu sdělit svůj nápad, představu nebo názor. Všem podnětům jsme otevření a za každý jsme velice rádi! Emotikona smile 
</p>
<h4>
Kde se o projektu můžu dozvědět víc?
</h4>
<p>
Více informací o nás můžete získat buď na stránkách našeho časopisu nebo na našem instagramu, kam přidáváme nejčerstvější novinky a informace přímo z naší redakce.
</p>
<h3>
Těšíme se na vaše nápady!
</h3>
<p>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:kontakt"), ENT_COMPAT) ?>
">Kontaktujte nás! </a>
</p>

<hr>
<p>Server hosting - <a href="http://host-atlantida.eu/">Atlantida hosting</a>  </p>
<p><a href="https://github.com/kivi8/ars-poetica">Github</a> </p>
<p>Design: Jindřich Čech st.</p><?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); } ?>


<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}