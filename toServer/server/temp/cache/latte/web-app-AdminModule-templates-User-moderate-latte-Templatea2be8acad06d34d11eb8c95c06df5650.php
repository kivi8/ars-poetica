<?php
// source: /var/www/clients/client3/web28/web/app/AdminModule/templates/User/moderate.latte

class Templatea2be8acad06d34d11eb8c95c06df5650 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('d684835117', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb284f5eaf66_title')) { function _lb284f5eaf66_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Uživatel <?php echo Latte\Runtime\Filters::escapeHtml($combinatedName, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbf2e6d0130c_content')) { function _lbf2e6d0130c_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$_l->tmp = $_control->getComponent("moderateUserForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:default"), ENT_COMPAT) ?>
">Zpět</a>

<?php call_user_func(reset($_b->blocks['script']), $_b, get_defined_vars()) ; 
}}

//
// block script
//
if (!function_exists($_b->blocks['script'][] = '_lb1da2976825_script')) { function _lb1da2976825_script($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><script>
    $("Form input[type=checkbox]").click(function(){
       var name = $(this).attr("name");
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}