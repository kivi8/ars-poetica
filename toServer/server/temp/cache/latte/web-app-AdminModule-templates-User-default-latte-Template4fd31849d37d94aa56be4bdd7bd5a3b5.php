<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/User/default.latte

class Template4fd31849d37d94aa56be4bdd7bd5a3b5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('0ae1c18c8b', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb488aeac18b_title')) { function _lb488aeac18b_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Seznam uživatelů<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbbbd3fee989_content')) { function _lbbbd3fee989_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('users') ?>"><?php call_user_func(reset($_b->blocks['_users']), $_b, $template->getParameters()) ?>
</div>
<h2>Přidat uživatele</h2>

<?php if ($user->isAllowed('User','add') && isset($userList)) { $_l->tmp = $_control->getComponent("addUserForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;} 
}}

//
// block _users
//
if (!function_exists($_b->blocks['_users'][] = '_lb10266f556d__users')) { function _lb10266f556d__users($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('users', FALSE)
?>   <table class="table table-hover">           
        <thead>
            <tr>
                <td>Jméno</td>
                <td></td>
            </tr> 
        </thead>  
  <tbody>      
<?php $iterations = 0; foreach ($userList['allowed'] as $id=>$name) { ?>      <tr>
          
          <td>
<?php if ($user->isAllowed('User', 'moderate')) { ?>
                <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:moderate", array($id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($name, ENT_NOQUOTES) ?></a>
<?php } else { ?>
                  <?php echo Latte\Runtime\Filters::escapeHtml($name, ENT_NOQUOTES) ?>

<?php } ?>
          </td>
          
<?php if ($user->isAllowed('User', 'prohibit')) { ?>          <td>
              <a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("prohibitUser!", array($id, true)), ENT_COMPAT) ?>
">Zablokovat</a>
          </td>
<?php } ?>
      </tr> 
<?php $iterations++; } ?>
    </tbody>  
   </table>
              
   <h2>Blokovaní uživatelé</h2>
   
   <table class="table table-hover"> 
       <thead>
        <tr>
          <td>Jméno</td>
          <td></td>
        </tr>   
       </thead> 
       <tbody>
<?php $iterations = 0; foreach ($userList['deleted'] as $id=>$name) { ?>      <tr>
        <td>
<?php if ($user->isAllowed('User', 'moderate')) { ?>
                <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:moderate", array($id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($name, ENT_NOQUOTES) ?></a>
<?php } else { ?>
                <?php echo Latte\Runtime\Filters::escapeHtml($name, ENT_NOQUOTES) ?>

<?php } ?>
        </td>
<?php if ($user->isAllowed('User', 'prohibit')) { ?>          <td>
              <a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("prohibitUser!", array($id, false)), ENT_COMPAT) ?>
">Povolit</a>
          </td>
<?php } ?>
      </tr> 
<?php $iterations++; } ?>
      </tbody>
   </table>  
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