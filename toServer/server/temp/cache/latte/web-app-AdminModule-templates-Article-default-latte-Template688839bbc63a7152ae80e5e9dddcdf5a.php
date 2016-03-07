<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/Article/default.latte

class Template688839bbc63a7152ae80e5e9dddcdf5a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6d9dd9b717', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb7f59a3d410_title')) { function _lb7f59a3d410_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Články - administrace<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbf506466063_content')) { function _lbf506466063_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($user->isAllowed('Section', 'moderate')) { ?><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:section"), ENT_COMPAT) ?>
">Upravit sekce</a>
<?php } ?>

<?php if ($user->isAllowed('Article', 'add') || $user->isAllowed('Article', 'moderate')) { ?>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:addArticle"), ENT_COMPAT) ?>
">Přidat článek</a><?php } 
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