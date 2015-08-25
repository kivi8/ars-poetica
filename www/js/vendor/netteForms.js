!function(e,t){"function"==typeof define&&define.amd?define(function(){return t(e)}):"object"==typeof module&&"object"==typeof module.exports?module.exports=t(e):(e.Nette=t(e),e.Nette.initOnLoad())}("undefined"!=typeof window?window:this,function(window){"use strict";var Nette={};return Nette.addEvent=function(e,t,n){var r=e["on"+t];e["on"+t]=function(){return"function"==typeof r&&r.apply(e,arguments)===!1?!1:n.apply(e,arguments)}},Nette.getValue=function(e){var t;if(e){if(e.tagName){if("radio"===e.type){var n=e.form.elements;for(t=0;t<n.length;t++)if(n[t].name===e.name&&n[t].checked)return n[t].value;return null}if("file"===e.type)return e.files||e.value;if("select"===e.tagName.toLowerCase()){var r=e.selectedIndex,a=e.options,u=[];if("select-one"===e.type)return 0>r?null:a[r].value;for(t=0;t<a.length;t++)a[t].selected&&u.push(a[t].value);return u}if(e.name&&e.name.match(/\[\]$/)){var n=e.form.elements[e.name].tagName?[e]:e.form.elements[e.name],u=[];for(t=0;t<n.length;t++)("checkbox"!==n[t].type||n[t].checked)&&u.push(n[t].value);return u}return"checkbox"===e.type?e.checked:"textarea"===e.tagName.toLowerCase()?e.value.replace("\r",""):e.value.replace("\r","").replace(/^\s+|\s+$/g,"")}return e[0]?Nette.getValue(e[0]):null}return null},Nette.getEffectiveValue=function(e){var t=Nette.getValue(e);return e.getAttribute&&t===e.getAttribute("data-nette-empty-value")&&(t=""),t},Nette.validateControl=function(e,t,n,r){e=e.tagName?e:e[0],t=t||Nette.parseJSON(e.getAttribute("data-nette-rules")),r=void 0===r?{value:Nette.getEffectiveValue(e)}:r;for(var a=0,u=t.length;u>a;a++){var l=t[a],o=l.op.match(/(~)?([^?]+)/),i=l.control?e.form.elements.namedItem(l.control):e;if(i){l.neg=o[1],l.op=o[2],l.condition=!!l.rules,i=i.tagName?i:i[0];var f=e===i?r:{value:Nette.getEffectiveValue(i)},c=Nette.validateRule(i,l.op,l.arg,f);if(null!==c)if(l.neg&&(c=!c),l.condition&&c){if(!Nette.validateControl(e,l.rules,n,r))return!1}else if(!l.condition&&!c){if(Nette.isDisabled(i))continue;if(!n){var s=Nette.isArray(l.arg)?l.arg:[l.arg],g=l.msg.replace(/%(value|\d+)/g,function(t,n){return Nette.getValue("value"===n?i:e.form.elements.namedItem(s[n].control))});Nette.addError(i,g)}return!1}}}return!0},Nette.validateForm=function(e){var t=e.form||e,n=!1;if(t["nette-submittedBy"]&&null!==t["nette-submittedBy"].getAttribute("formnovalidate")){var r=Nette.parseJSON(t["nette-submittedBy"].getAttribute("data-nette-validation-scope"));if(!r.length)return!0;n=new RegExp("^("+r.join("-|")+"-)")}var a,u,l={};for(a=0;a<t.elements.length;a++)if(u=t.elements[a],!u.tagName||u.tagName.toLowerCase()in{input:1,select:1,textarea:1,button:1}){if("radio"===u.type){if(l[u.name])continue;l[u.name]=!0}if(!(n&&!u.name.replace(/]\[|\[|]|$/g,"-").match(n)||Nette.isDisabled(u)||Nette.validateControl(u)))return!1}return!0},Nette.isDisabled=function(e){if("radio"===e.type){for(var t=0,n=e.form.elements;t<n.length;t++)if(n[t].name===e.name&&!n[t].disabled)return!1;return!0}return e.disabled},Nette.addError=function(e,t){t&&alert(t),e.focus&&e.focus()},Nette.expandRuleArgument=function(e,t){return t&&t.control&&(t=Nette.getEffectiveValue(e.elements.namedItem(t.control))),t},Nette.validateRule=function(e,t,n,r){r=void 0===r?{value:Nette.getEffectiveValue(e)}:r,":"===t.charAt(0)&&(t=t.substr(1)),t=t.replace("::","_"),t=t.replace(/\\/g,"");for(var a=Nette.isArray(n)?n.slice(0):[n],u=0,l=a.length;l>u;u++)a[u]=Nette.expandRuleArgument(e.form,a[u]);return Nette.validators[t]?Nette.validators[t](e,Nette.isArray(n)?a:a[0],r.value,r):null},Nette.validators={filled:function(e,t,n){return!(""===n||n===!1||null===n||Nette.isArray(n)&&!n.length||window.FileList&&n instanceof window.FileList&&!n.length)},blank:function(e,t,n){return!Nette.validators.filled(e,t,n)},valid:function(e,t,n){return Nette.validateControl(e,null,!0)},equal:function(e,t,n){if(void 0===t)return null;n=Nette.isArray(n)?n:[n],t=Nette.isArray(t)?t:[t];e:for(var r=0,a=n.length;a>r;r++){for(var u=0,l=t.length;l>u;u++)if(n[r]==t[u])continue e;return!1}return!0},notEqual:function(e,t,n){return void 0===t?null:!Nette.validators.equal(e,t,n)},minLength:function(e,t,n){return n.length>=t},maxLength:function(e,t,n){return n.length<=t},length:function(e,t,n){return t=Nette.isArray(t)?t:[t,t],(null===t[0]||n.length>=t[0])&&(null===t[1]||n.length<=t[1])},email:function(e,t,n){return/^("([ !\x23-\x5B\x5D-\x7E]*|\\[ -~])+"|[-a-z0-9!#$%&'*+\/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+\/=?^_`{|}~]+)*)@([0-9a-z\u00C0-\u02FF\u0370-\u1EFF]([-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,61}[0-9a-z\u00C0-\u02FF\u0370-\u1EFF])?\.)+[a-z\u00C0-\u02FF\u0370-\u1EFF][-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,17}[a-z\u00C0-\u02FF\u0370-\u1EFF]$/i.test(n)},url:function(e,t,n,r){return/^[a-z\d+.-]+:/.test(n)||(n="http://"+n),/^https?:\/\/([0-9a-z\u00C0-\u02FF\u0370-\u1EFF](([-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,61}[0-9a-z\u00C0-\u02FF\u0370-\u1EFF])?\.)*[a-z\u00C0-\u02FF\u0370-\u1EFF][-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,17}[a-z\u00C0-\u02FF\u0370-\u1EFF]|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}|\[[0-9a-f:]{3,39}\])(:\d{1,5})?(\/\S*)?$/i.test(n)?(r.value=n,!0):!1},regexp:function(e,t,n){var r="string"==typeof t?t.match(/^\/(.*)\/([imu]*)$/):!1;try{return r&&new RegExp(r[1],r[2].replace("u","")).test(n)}catch(a){}},pattern:function(e,t,n){try{return"string"==typeof t?new RegExp("^("+t+")$").test(n):null}catch(r){}},integer:function(e,t,n){return/^-?[0-9]+$/.test(n)},"float":function(e,t,n,r){return n=n.replace(" ","").replace(",","."),/^-?[0-9]*[.,]?[0-9]+$/.test(n)?(r.value=n,!0):!1},min:function(e,t,n){return Nette.validators.range(e,[t,null],n)},max:function(e,t,n){return Nette.validators.range(e,[null,t],n)},range:function(e,t,n){return Nette.isArray(t)?(null===t[0]||parseFloat(n)>=t[0])&&(null===t[1]||parseFloat(n)<=t[1]):null},submitted:function(e,t,n){return e.form["nette-submittedBy"]===e},fileSize:function(e,t,n){if(window.FileList)for(var r=0;r<n.length;r++)if(n[r].size>t)return!1;return!0},image:function(e,t,n){if(window.FileList&&n instanceof window.FileList)for(var r=0;r<n.length;r++){var a=n[r].type;if(a&&"image/gif"!==a&&"image/png"!==a&&"image/jpeg"!==a)return!1}return!0}},Nette.toggleForm=function(e,t){var n;for(Nette.toggles={},n=0;n<e.elements.length;n++)e.elements[n].tagName.toLowerCase()in{input:1,select:1,textarea:1,button:1}&&Nette.toggleControl(e.elements[n],null,null,!t);for(n in Nette.toggles)Nette.toggle(n,Nette.toggles[n],t)},Nette.toggleControl=function(e,t,n,r,a){t=t||Nette.parseJSON(e.getAttribute("data-nette-rules")),a=void 0===a?{value:Nette.getEffectiveValue(e)}:a;for(var u,l=!1,o=[],i=function(){Nette.toggleForm(e.form,e)},f=0,c=t.length;c>f;f++){var s=t[f],g=s.op.match(/(~)?([^?]+)/),d=s.control?e.form.elements.namedItem(s.control):e;if(d){if(u=n,n!==!1){s.neg=g[1],s.op=g[2];var m=e===d?a:{value:Nette.getEffectiveValue(d)};if(u=Nette.validateRule(d,s.op,s.arg,m),null===u)continue;s.neg&&(u=!u),s.rules||(n=u)}if(s.rules&&Nette.toggleControl(e,s.rules,u,r,a)||s.toggle){if(l=!0,r)for(var v=!document.addEventListener,N=d.tagName?d.name:d[0].name,p=d.tagName?d.form.elements:d,F=0;F<p.length;F++)p[F].name!==N||Nette.inArray(o,p[F])||(Nette.addEvent(p[F],v&&p[F].type in{checkbox:1,radio:1}?"click":"change",i),o.push(p[F]));for(var h in s.toggle||[])Object.prototype.hasOwnProperty.call(s.toggle,h)&&(Nette.toggles[h]=Nette.toggles[h]||(s.toggle[h]?u:!u))}}}return l},Nette.parseJSON=function(s){return s=s||"[]","{op"===s.substr(0,3)?eval("["+s+"]"):window.JSON&&window.JSON.parse?JSON.parse(s):eval(s)},Nette.toggle=function(e,t,n){var r=document.getElementById(e);r&&(r.style.display=t?"":"none")},Nette.initForm=function(e){e.noValidate="novalidate",Nette.addEvent(e,"submit",function(t){return Nette.validateForm(e)?void 0:(t&&t.stopPropagation?t.stopPropagation():window.event&&(event.cancelBubble=!0),!1)}),Nette.addEvent(e,"click",function(t){t=t||event;var n=t.target||t.srcElement;e["nette-submittedBy"]=n.type in{submit:1,image:1}?n:null}),Nette.toggleForm(e)},Nette.initOnLoad=function(){Nette.addEvent(window,"load",function(){for(var e=0;e<document.forms.length;e++)for(var t=document.forms[e],n=0;n<t.elements.length;n++)if(t.elements[n].getAttribute("data-nette-rules")){Nette.initForm(t);break}})},Nette.isArray=function(e){return"[object Array]"===Object.prototype.toString.call(e)},Nette.inArray=function(e,t){if([].indexOf)return e.indexOf(t)>-1;for(var n=0;n<e.length;n++)if(e[n]===t)return!0;return!1},Nette.webalize=function(e){e=e.toLowerCase();var t,n,r="";for(t=0;t<e.length;t++)n=Nette.webalizeTable[e.charAt(t)],r+=n?n:e.charAt(t);return r.replace(/[^a-z0-9]+/g,"-").replace(/^-|-$/g,"")},Nette.webalizeTable={"á":"a","ä":"a","č":"c","ď":"d","é":"e","ě":"e","í":"i","ľ":"l","ň":"n","ó":"o","ô":"o","ř":"r","š":"s","ť":"t","ú":"u","ů":"u","ý":"y","ž":"z"},Nette});