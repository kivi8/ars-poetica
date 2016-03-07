<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/@layout.latte

class Templateff469dc2b4726e913538d072e48a581d extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('88f8735244', 'html')
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