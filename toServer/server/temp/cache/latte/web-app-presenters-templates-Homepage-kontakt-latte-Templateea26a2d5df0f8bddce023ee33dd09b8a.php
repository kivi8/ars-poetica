<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Homepage/kontakt.latte

class Templateea26a2d5df0f8bddce023ee33dd09b8a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9ce04a6656', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lba064adb718_title')) { function _lba064adb718_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Kontakt<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb0c10c4cad3_content')) { function _lb0c10c4cad3_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p>Chcete se zapojit? Máte nápad, otázku, stížnost nebo pochvalu? Napište nám!</p>
<p>E-mail: <a href="mailto:arspoetica@email.cz">arspoetica@email.cz</a></p>
<p>Facebook: <a href="https://www.facebook.com/arspoetica.net">www.facebook.com/arspoetica.net</a></p>
<p>
    <h4 class="inline">Nebo nám cokoliv napište: </h4> <h3 class="inline"> <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("SendArticle:"), ENT_COMPAT) ?>
">Poslat rovnou do redakce</a> !</h3>
</p>

<hr>

<div id="<?php echo $_control->getSnippetId('captcha') ?>"><?php call_user_func(reset($_b->blocks['_captcha']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _captcha
//
if (!function_exists($_b->blocks['_captcha'][] = '_lb8f30831324__captcha')) { function _lb8f30831324__captcha($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('captcha', FALSE)
;echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["newWriterForm"], array()) ?>

    <table>
    
    <tr>
        <th><?php if ($_label = $_form["text"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["text"]->getControl() ?></td>   
    </tr> 
    
<?php if (!$user->isLoggedIn()) { ?>
        <tr class="required">
            <th><?php if ($_label = $_form["contact"]->getLabel()) echo $_label  ?></th>       
            <td><?php echo $_form["contact"]->getControl() ?></td>   
        </tr> 
<?php } ?>
    
    
    </table>
    

<?php if (!$user->isLoggedIn()) { ?>
    <div class="captcha">
        <img src="/captcha?t=<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl(rand(0,10000)), ENT_COMPAT) ?>" src="captcha image">
        <a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("NewCaptcha!"), ENT_COMPAT) ?>
">Nová otázka</a>
        <div>
            <?php echo $_form["captcha"]->getControl() ?>

        </div>
    </div>  
<?php } ?>
     
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