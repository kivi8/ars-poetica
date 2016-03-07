<?php
// source: /var/www/clients/client3/web28/web/app/AdminModule/templates/Article/addArticle.latte

class Template5de0cb0f9aa7f466b2f78860338bc52c extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('ecabe62d13', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb0f38fc8930_title')) { function _lb0f38fc8930_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Přidat článek<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbde7148cc80_content')) { function _lbde7148cc80_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["addArticle"], array()) ?>

    <table>
        
        <tr class="required">
            <th><?php if ($_label = $_form["title"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["title"]->getControl() ?></td>
        </tr>
        
        <tr class="required">
            <th><?php if ($_label = $_form["description"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["description"]->getControl() ?></td>
        </tr>
        
        <tr class="required">
            <th><?php if ($_label = $_form["text"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["text"]->getControl() ?></td>
        </tr>
        
        <tr>
            <th><?php if ($_label = $_form["keyWords"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["keyWords"]->getControl() ?></td>
        </tr>
        
        <tr>
            <th><?php if ($_label = $_form["commentsAllow"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["commentsAllow"]->getControl() ?></td>
        </tr>
        
        <tr>
            <th><?php if ($_label = $_form["voteAllow"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["voteAllow"]->getControl() ?></td>
        </tr>
        
          
        
<?php if (isset($form['published'])) { ?>        <tr>
            <th><?php if ($_label = $_form["published"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["published"]->getControl() ?></td>
        </tr>
<?php } ?>
        
<?php if (isset($form['deleted'])) { ?>        <tr>
            <th><?php if ($_label = $_form["deleted"]->getLabel()) echo $_label  ?></th>
            <td><?php echo $_form["deleted"]->getControl() ?></td>
        </tr>
<?php } ?>
                
    </table>  
            
    <?php if ($_label = $_form["underSection"]->getLabel()) echo $_label  ?>

    <?php echo $_form["underSection"]->getControl() ?>

        
<div id="<?php echo $_control->getSnippetId('underSubSectionSnippet') ?>"><?php call_user_func(reset($_b->blocks['_underSubSectionSnippet']), $_b, $template->getParameters()) ?>
</div>        
        
            <?php echo $_form["submitArticle"]->getControl() ?>

<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>


<?php
}}

//
// block _underSubSectionSnippet
//
if (!function_exists($_b->blocks['_underSubSectionSnippet'][] = '_lba3ad78af92__underSubSectionSnippet')) { function _lba3ad78af92__underSubSectionSnippet($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('underSubSectionSnippet', FALSE)
?>        
        <?php if ($_label = $_form["underSubSection"]->getLabel()) echo $_label  ?>

        <?php echo $_form["underSubSection"]->getControl() ?>

        
<div id="<?php echo $_control->getSnippetId('underSerialSnippet') ?>"><?php call_user_func(reset($_b->blocks['_underSerialSnippet']), $_b, $template->getParameters()) ?>
</div>        
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'js', $template->getParameters()) ?>
        
<?php
}}

//
// block _underSerialSnippet
//
if (!function_exists($_b->blocks['_underSerialSnippet'][] = '_lbaef8d9dc3f__underSerialSnippet')) { function _lbaef8d9dc3f__underSerialSnippet($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('underSerialSnippet', FALSE)
?>            
            <?php if ($_label = $_form["underSerial"]->getLabel()) echo $_label  ?>

            <?php echo $_form["underSerial"]->getControl() ?>

        
<?php
}}

//
// block js
//
if (!function_exists($_b->blocks['js'][] = '_lbf0b90ca32b_js')) { function _lbf0b90ca32b_js($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><script type="text/javascript">
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'jsCallback', array('input' => 'underSection', 'link' => 'underSectionChange') + $template->getParameters()) ;Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'jsCallback', array('input' => 'underSubSection', 'link' => 'subSectionChange') + $template->getParameters()) ?>
</script>

<?php
}}

//
// block jsCallback
//
if (!function_exists($_b->blocks['jsCallback'][] = '_lbab4cd1705a_jsCallback')) { function _lbab4cd1705a_jsCallback($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>$('#<?php echo Latte\Runtime\Filters::escapeHtml($control["addArticle"][$input]->htmlId, ENT_NOQUOTES) ?>').on('change', function() {
    $.nette.ajax({
        type: 'GET',
        url: '<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("{$link}!"), ENT_NOQUOTES) ?>',
        data: {
            'value': $(this).val(),
        }
    });
});

<?php
}}

//
// block script
//
if (!function_exists($_b->blocks['script'][] = '_lbfb40343c40_script')) { function _lbfb40343c40_script($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
                        language: "cs",    
                        theme: "modern",                        
                        selector: "#frm-addArticle-text",
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



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>






<?php
}}