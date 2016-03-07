<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Homepage/redakce.latte

class Template68f9591ea8290fd26317fb6c629d70b1 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9d4757cfa8', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb6cc1b9eddd_title')) { function _lb6cc1b9eddd_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Redakce<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb40098ef71b_content')) { function _lb40098ef71b_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><table class="table table-bordered">
<thead>
    <tr>
        <td>
            Funkce
        </td>    
        <td>
             Jméno
        </td>    
    </tr>  
</thead>    
<tbody>
    <tr>
        <td>
            Šéfredaktor:
        </td>    
        <td>
             Jindřich Čech
        </td>    
    </tr>  
    
    <tr>
        <td>
            Mluvčí:
        </td>    
        <td>
            Hanka Do Thi
        </td>    
    </tr> 
    
    <tr>
        <td>
            IT podpora:
        </td>    
        <td>
            Kryštof Trkovský
        </td>    
    </tr> 
    
    <tr>
        <td>
            Korektura:
        </td>    
        <td>
            Kateřina Sutrová, Veronika Schöpferová, Sarah Piskunová, Petra Míková, Vanesa Bočková, Sandra Wolfová, Jakub Mikuláš
        </td>    
    </tr> 
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); } ?>



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}