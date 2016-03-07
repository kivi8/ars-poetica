<?php
// source: /var/www/clients/client3/web28/web/app/presenters/templates/Setting/changeMail.latte

class Template9ea378be25af6a52740e8c2bd115809d extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('36df93ddb8', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbf222d1017f_title')) { function _lbf222d1017f_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Změnit mail<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb97197d8300_content')) { function _lb97197d8300_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p>Nastavený mail: <?php echo Latte\Runtime\Filters::escapeHtml($user->getIdentity()->mail, ENT_NOQUOTES) ?></p>
<?php if ($user->getIdentity()->oldMail) { ?><p>Starý mail: <?php echo Latte\Runtime\Filters::escapeHtml($user->getIdentity()->oldMail, ENT_NOQUOTES) ?></p>
<?php } ?>
<p>Pozor před odesláním si zkontrolujte svůj přístup k mailové adrese. Po odeslání se ještě můžete vrátit ke svému starému mailu, ale po odhlášení už ne.</p>
<?php if ($enterCode) { $_l->tmp = $_control->getComponent("enterCode"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;} else { $_l->tmp = $_control->getComponent("changeMail"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;} 
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