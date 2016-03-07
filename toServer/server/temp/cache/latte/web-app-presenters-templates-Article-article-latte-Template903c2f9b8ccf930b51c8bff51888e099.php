<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Article/article.latte

class Template903c2f9b8ccf930b51c8bff51888e099 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('fc1daa4e25', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb752fbbfcdf_title')) { function _lb752fbbfcdf_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;echo Latte\Runtime\Filters::escapeHtml($article->title, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb80377054b5_content')) { function _lb80377054b5_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($presenter->resourceAuthorizator->canUse('Article', $article->id)) { ?>
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:Article:updateArticle", array($article->id)), ENT_COMPAT) ?>
">Upravit článek</a></p>
<?php } ?>

<?php echo $article->text ?>


<?php
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