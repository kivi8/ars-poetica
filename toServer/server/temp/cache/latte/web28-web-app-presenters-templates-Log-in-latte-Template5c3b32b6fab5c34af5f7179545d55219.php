<?php
// source: /var/www/clients/client3/web28/web/app/presenters/templates/Log/in.latte

class Template5c3b32b6fab5c34af5f7179545d55219 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6a7e0ad8d9', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb7f88dca38a_title')) { function _lb7f88dca38a_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Přihlášení<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb2ae97b6db3_content')) { function _lb2ae97b6db3_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$_l->tmp = $_control->getComponent("logForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>

<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Log:lostPass"), ENT_COMPAT) ?>
">Ztracené heslo</a><?php
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