<?php
// source: /var/www/clients/client3/web28/web/app/AdminModule/templates/@layout.latte

class Template57f75029ec397e34121b69a22ddb5513 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('29b993a35f', 'html')
;
// prolog Latte\Macros\BlockMacros
// template extending

$_l->extends = '../../presenters/templates/@layout.latte'; $_g->extended = TRUE;

if ($_l->extends) { return $template->renderChildTemplate($_l->extends, get_defined_vars());}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
 
}}