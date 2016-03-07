<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Homepage/diskuze.latte

class Template9a223b4311d146388b90e6ae6e13b76a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f59768bbc4', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb7ecc141bb7_title')) { function _lb7ecc141bb7_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Diskuze<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb50c9a3f845_content')) { function _lb50c9a3f845_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Diskuze - připravujeme
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