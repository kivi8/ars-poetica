<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/Article/updateArticle.latte

class Template0e8c4601f213de3e160005acee159ed2 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4e2a8f584a', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb2e4a323e04_title')) { function _lb2e4a323e04_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Upravit článek<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb5d30288345_content')) { function _lb5d30288345_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><script>
    
    function actual(){    
        $("#subSection").text($('#frm-updateArticle-underSection option:selected').text());
        $("#serial").text($('#frm-updateArticle-underSubSection option:selected').text());
        
        if(!$('#frm-updateArticle-underSection').val()){
            $("#subSection").parent().parent("div").css('display','none');                     
        }
        
        if(!$('#frm-updateArticle-underSubSection').val()){
            $("#serial").parent().parent("div").css('display','none');          
        }
    }
    
    $(document).ready(function(){       
        actual();        
    });
</script>    

<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = is_object($_form) ? $_form : $_control[$_form], array()) ?>

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
  
    <h2><?php if ($_label = $_form["underSection"]->getLabel()) echo $_label  ?></h2>
    
<div id="<?php echo $_control->getSnippetId('underSection') ?>"><?php call_user_func(reset($_b->blocks['_underSection']), $_b, $template->getParameters()) ?>
</div>    
<div id="<?php echo $_control->getSnippetId('underSubSectionSnippet') ?>"><?php call_user_func(reset($_b->blocks['_underSubSectionSnippet']), $_b, $template->getParameters()) ?>
</div>    <script>
        $('#addNewAjaxSection').on('click', function() {
            $.nette.ajax({
                type: 'GET',
                url: '/administrace/clanky/upravit-clanek?id=<?php echo Latte\Runtime\Filters::escapeJs($values->id) ?>&do=addNewAjaxSection',
                data: {
                    'name': $(this).prev('input:text').val()
                }                   
            });
        });
        
        $('#addNewAjaxSubSection').on('click',function() {
            $.nette.ajax({
                type: 'GET',
                url: '/administrace/clanky/upravit-clanek?id=<?php echo Latte\Runtime\Filters::escapeJs($values->id) ?>&do=addNewAjaxSection',
                data: {
                    'name': $(this).prev('input:text').val(),
                    'underSection': $('#frm-updateArticle-underSection').val()
                }                   
            });
        });
        
        $('#addNewAjaxSerial').on('click',function() {
            $.nette.ajax({
                type: 'GET',
                url: '/administrace/clanky/upravit-clanek?id=<?php echo Latte\Runtime\Filters::escapeJs($values->id) ?>&do=addNewAjaxSection',
                data: {
                    'name': $(this).prev('input:text').val(),
                    'underSection': $('#frm-updateArticle-underSection').val(),
                    'underSubSection': $('#frm-updateArticle-underSubSection').val()
                }                   
            });
        });
        
    </script>    
    
            <?php echo $_form["submitArticle"]->getControl() ?>

<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>


<?php
}}

//
// block _underSection
//
if (!function_exists($_b->blocks['_underSection'][] = '_lb631822dae8__underSection')) { function _lb631822dae8__underSection($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('underSection', FALSE)
?>    
    <?php if ($values->underSection) { echo Latte\Runtime\Filters::escapeHtml($values->ref('underSection')->name, ENT_NOQUOTES) ;} ?>

    <?php echo $_form["underSection"]->getControl() ?>

    
    <div>
        <h4 class="arrowText">Přidat sekci <img class="arrow" alt="click" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/arrow.png"></h4>
        <div class="hide-box">
            <input type="text" name="addSection">
            <span class="btn btn-default" id="addNewAjaxSection">Přidat</span>
        </div>
    </div>
<?php
}}

//
// block _underSubSectionSnippet
//
if (!function_exists($_b->blocks['_underSubSectionSnippet'][] = '_lbf847946d31__underSubSectionSnippet')) { function _lbf847946d31__underSubSectionSnippet($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('underSubSectionSnippet', FALSE)
?>        
        <h2><?php if ($_label = $_form["underSubSection"]->getLabel()) echo $_label  ?></h2>
               
        <?php if ($values->underSubSection) { echo Latte\Runtime\Filters::escapeHtml($values->ref('underSubSection')->name, ENT_NOQUOTES) ;} ?>

        <?php echo $_form["underSubSection"]->getControl() ?>

               
        <div>
        <h4 class="arrowText">Přidat podsekci pod: <span id = "subSection"></span> <img class="arrow" alt="click" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/arrow.png"></h4>
        <div class="hide-box">
            <input type="text" name="addSection">
            <span class="btn btn-default" id="addNewAjaxSubSection">Přidat</span>
        </div>
        </div>
    
<div id="<?php echo $_control->getSnippetId('underSerialSnippet') ?>"><?php call_user_func(reset($_b->blocks['_underSerialSnippet']), $_b, $template->getParameters()) ?>
</div>        
        
        <script>
    
            $('#frm-updateArticle-underSection').on('change', function() {
                $.nette.ajax({
                    type: 'GET',
                    url: '/administrace/clanky/upravit-clanek?id=<?php echo Latte\Runtime\Filters::escapeJs($values->id) ?>&do=underSectionChange',
                    data: {
                        'value': $(this).val()
                    }
                });
            });

            $('#frm-updateArticle-underSubSection').on('change', function() {
                $.nette.ajax({
                    type: 'GET',
                    url: '/administrace/clanky/upravit-clanek?id=<?php echo Latte\Runtime\Filters::escapeJs($values->id) ?>&do=subSectionChange',
                    data: {
                        'value': $(this).val()
                    }
                });
            });   
</script>
        
<?php
}}

//
// block _underSerialSnippet
//
if (!function_exists($_b->blocks['_underSerialSnippet'][] = '_lb5c0f0f52a7__underSerialSnippet')) { function _lb5c0f0f52a7__underSerialSnippet($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('underSerialSnippet', FALSE)
?>            
            <h2><?php if ($_label = $_form["underSerial"]->getLabel()) echo $_label  ?></h2>
                       
            <?php if ($values->underSerial) { echo Latte\Runtime\Filters::escapeHtml($values->ref('underSerial')->name, ENT_NOQUOTES) ;} ?>

            <?php echo $_form["underSerial"]->getControl() ?>

        
            <div>
                <h4 class="arrowText">Přidat serial pod: <span id = "serial"></span> <img class="arrow" alt="click" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/arrow.png"></h4>
                               
                <div class="hide-box">
                    <input type="text" name="addSection">
                    <span class="btn btn-default" id="addNewAjaxSerial">Přidat</span>
                </div>
            </div>
<?php
}}

//
// block script
//
if (!function_exists($_b->blocks['script'][] = '_lb3ef8f60648_script')) { function _lb3ef8f60648_script($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
                        language: "cs",    
                        theme: "modern",                        
                        selector: "#frm-updateArticle-text",
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
// block hide
//
if (!function_exists($_b->blocks['hide'][] = '_lb5350c001fb_hide')) { function _lb5350c001fb_hide($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
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