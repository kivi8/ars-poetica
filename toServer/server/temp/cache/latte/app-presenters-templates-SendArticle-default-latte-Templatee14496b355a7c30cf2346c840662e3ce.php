<?php
// source: /var/www/clients/client3/web28/web/app/presenters/templates/SendArticle/default.latte

class Templatee14496b355a7c30cf2346c840662e3ce extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('b296b70bf2', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbd21b30f201_title')) { function _lbd21b30f201_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Poslat do reakce<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3093a7cb44_content')) { function _lb3093a7cb44_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('captcha') ?>"><?php call_user_func(reset($_b->blocks['_captcha']), $_b, $template->getParameters()) ?>
</div>
<?php
}}

//
// block _captcha
//
if (!function_exists($_b->blocks['_captcha'][] = '_lb878ae50ebe__captcha')) { function _lb878ae50ebe__captcha($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('captcha', FALSE)
;echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["newWriterForm"], array()) ?>

    <table>
    <tr>
        <th><?php if ($_label = $_form["title"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["title"]->getControl() ?></td>   
    </tr> 
    
    <tr>
        <th><?php if ($_label = $_form["aboutUser"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["aboutUser"]->getControl() ?></td>   
    </tr> 
    
    <tr>
        <th><?php if ($_label = $_form["text"]->getLabel()) echo $_label  ?></th>       
        <td><?php echo $_form["text"]->getControl()->addAttributes(array('class'=>'text')) ?></td>   
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
// block script
//
if (!function_exists($_b->blocks['script'][] = '_lb0af5de43ff_script')) { function _lb0af5de43ff_script($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
                        language: "cs",    
                        theme: "modern",                        
                        selector: ".text",
                        plugins: [
                                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                "searchreplace wordcount visualblocks visualchars code fullscreen",
                                "insertdatetime media nonbreaking save table contextmenu directionality",
                                "emoticons template paste textcolor colorpicker textpattern"
                                 ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons",
                });
    </script>
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