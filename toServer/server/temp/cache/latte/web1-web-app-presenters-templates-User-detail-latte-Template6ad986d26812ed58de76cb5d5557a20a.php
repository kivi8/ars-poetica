<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/User/detail.latte

class Template6ad986d26812ed58de76cb5d5557a20a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6a3fe3ea65', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb0054cd8bf1_title')) { function _lb0054cd8bf1_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Uživatel <?php echo Latte\Runtime\Filters::escapeHtml(\App\Helper\Helper::combineUserName($userDat), ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbcf85006a51_content')) { function _lbcf85006a51_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($userDat->photo) { ?>
    
<?php $path = pathinfo($userDat->photo) ?>
    
    <a class="photo" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/user-photo/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($path['basename']), ENT_COMPAT) ?>">
        <img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/user-photo/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($path['filename']), ENT_COMPAT) ?>
-min.<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($path['extension']), ENT_COMPAT) ?>">   
    </a>
<?php } ?>

<p>
    O mě: <?php echo Latte\Runtime\Filters::escapeHtml($userDat->about, ENT_NOQUOTES) ?>

</p>

<p>
    Přezdívka: <?php echo Latte\Runtime\Filters::escapeHtml($userDat->nickName, ENT_NOQUOTES) ?>

</p>

<?php if ($userDat->name) { ?><p>
    Pravé jméno: <?php echo Latte\Runtime\Filters::escapeHtml($userDat->name, ENT_NOQUOTES) ?>

</p>
<?php } ?>

<?php if ($userDat->title) { ?><p>
    Titul: <?php echo Latte\Runtime\Filters::escapeHtml($userDat->title, ENT_NOQUOTES) ?>

</p>
<?php } ?>

<p>
    Pohlaví: <?php echo Latte\Runtime\Filters::escapeHtml(\App\Helper\Helper::translateGender($userDat->gender), ENT_NOQUOTES) ?>

</p>



<?php if ($userDat->wall) { ?>
    
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ?>
    <?php
}}