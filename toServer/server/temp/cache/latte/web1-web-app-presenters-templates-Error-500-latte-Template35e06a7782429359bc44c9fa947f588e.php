<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Error/500.latte

class Template35e06a7782429359bc44c9fa947f588e extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5fa254d752', 'html')
;
// prolog Latte\Macros\BlockMacros
// template extending

$_l->extends = FALSE; $_g->extended = TRUE;

if ($_l->extends) { return $template->renderChildTemplate($_l->extends, get_defined_vars());}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
// ?>
<!DOCTYPE html><!-- "' --></script></style></noscript></xmp>
<meta charset="utf-8">
<meta name="robots" content="noindex">
<title>Server Error</title>

<style>
	#error-body { background: white; width: 500px; margin: 70px auto; padding: 10px 20px }
	#error-body h1 { font: bold 47px/1.5 sans-serif; background: none; color: #333; margin: .6em 0 }
	#error-body p { font: 21px/1.5 Georgia,serif; background: none; color: #333; margin: 1.5em 0 }
	#error-body small { font-size: 70%; color: gray }
</style>

<div id="error-body">
	<h1>Server Error</h1>

	<p>We're sorry! The server encountered an internal error and
	was unable to complete your request. Please try again later.</p>

	<p><small>error 500</small></p>
</div>
<?php
}}