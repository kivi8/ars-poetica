<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/News/moderate.latte

class Template1b938a17e5b489919387aee8f90eee89 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c0686fe9f1', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbc92a903216_title')) { function _lbc92a903216_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Upravit: <?php echo Latte\Runtime\Filters::escapeHtml($news->title, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbff2319caed_content')) { function _lbff2319caed_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Napsal: <?php echo Latte\Runtime\Filters::escapeHtml(\App\Helper\Helper::combineUserName($news->ref('user')), ENT_NOQUOTES) ?>


Datum: <?php echo Latte\Runtime\Filters::escapeHtml($template->date($news->date, '%d.%m.%Y %H:%M'), ENT_NOQUOTES) ?>


<?php $_l->tmp = $_control->getComponent("editNewsForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}