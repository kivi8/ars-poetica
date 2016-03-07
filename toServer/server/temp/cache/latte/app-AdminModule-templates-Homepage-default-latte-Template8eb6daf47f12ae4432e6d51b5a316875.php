<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/Homepage/default.latte

class Template8eb6daf47f12ae4432e6d51b5a316875 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c273fd424a', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb75e8035058_content')) { function _lb75e8035058_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($user->isAllowed('FastNews', 'add') || $user->isAllowed('FastNews', 'moderate')) { ?>
    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("News:"), ENT_COMPAT) ?>
">Rychlé zprávy</a>
<?php } ?>

<?php if ($user->isAllowed('Comments', 'moderate')) { ?>
    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Comments:"), ENT_COMPAT) ?>
">Komentáře</a>
<?php } ?>

<?php if ($user->isAllowed('User', 'moderate') || $user->isAllowed('User', 'see')|| $user->isAllowed('User', 'add') || $user->isAllowed('User', 'prohibit')) { ?>
    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:"), ENT_COMPAT) ?>
">Uživatelé</a>
<?php } ?>

<?php if ($user->isAllowed('Section', 'moderate') || $user->isAllowed('Article', 'moderate') || $user->isAllowed('Article', 'add')) { ?>
    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:"), ENT_COMPAT) ?>
">Články, sekce</a>
<?php } 
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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}