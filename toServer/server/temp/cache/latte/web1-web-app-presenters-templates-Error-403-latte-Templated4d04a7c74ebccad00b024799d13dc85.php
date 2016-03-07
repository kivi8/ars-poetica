<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Error/403.latte

class Templated4d04a7c74ebccad00b024799d13dc85 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3a4757ff35', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb068ff222f8_title')) { function _lb068ff222f8_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Přístup zamítnut<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbae1fdd0334_content')) { function _lbae1fdd0334_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p>You do not have permission to view this page. Please try contact the web
site administrator if you believe you should be able to view this page.</p>

<p><small>error 403</small></p>
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>


<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}