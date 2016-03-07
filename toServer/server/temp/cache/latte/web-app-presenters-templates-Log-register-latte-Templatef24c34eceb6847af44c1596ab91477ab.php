<?php
// source: /var/www/clients/client3/web28/web/app/presenters/templates/Log/register.latte

class Templatef24c34eceb6847af44c1596ab91477ab extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('a0f8b7ac51', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb119563c30f_title')) { function _lb119563c30f_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Registrace<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb169054e307_content')) { function _lb169054e307_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('captcha') ?>"><?php call_user_func(reset($_b->blocks['_captcha']), $_b, $template->getParameters()) ?>
</div>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Log:lostPass"), ENT_COMPAT) ?>
">Ztracené heslo</a><?php
}}

//
// block _captcha
//
if (!function_exists($_b->blocks['_captcha'][] = '_lb22d5830f93__captcha')) { function _lb22d5830f93__captcha($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('captcha', FALSE)
;echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["registerForm"], array()) ?>

    
<?php if ($form->hasErrors()) { ?>    <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>        <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
    </ul>
<?php } ?>
    
    <table>
    <tr class="required">
        <th><?php if ($_label = $_form["mail"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["mail"]->getControl() ?></td>   
    </tr> 
    
    <tr class="required">
        <th><?php if ($_label = $_form["password"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["password"]->getControl() ?></td>   
    </tr> 
    
    <tr class="required">
        <th><?php if ($_label = $_form["passwordVerify"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["passwordVerify"]->getControl() ?></td>   
    </tr> 
    
    <tr>
        <th><?php if ($_label = $_form["nickName"]->getLabel()) echo $_label  ?></th>     
        <td><?php echo $_form["nickName"]->getControl() ?></td>   
    </tr>      
    </table>
    
    <p>Pokud chcete, můžete pro jednodušší přihlašování zadat jméno</p>
    
    <div class="captcha">
        <img src="/captcha?t=<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl(rand(0,10000)), ENT_COMPAT) ?>" src="captcha image">
        <a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("NewCaptcha!"), ENT_COMPAT) ?>
">Nová otázka</a>
        <div>
            <?php echo $_form["captcha"]->getControl() ?>

        </div>
    </div>    
     
    <?php echo $_form["submit"]->getControl()->addAttributes(array('class'=>'bigSubmit')) ?>

<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

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