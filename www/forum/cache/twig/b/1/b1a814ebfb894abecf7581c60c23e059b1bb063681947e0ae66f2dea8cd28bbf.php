<?php

/* forumlist_body.html */
class __TwigTemplate_b1a814ebfb894abecf7581c60c23e059b1bb063681947e0ae66f2dea8cd28bbf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "forumrow", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["forumrow"]) {
            // line 3
            echo "\t";
            if ((($this->getAttribute($context["forumrow"], "S_IS_CAT", array()) &&  !$this->getAttribute($context["forumrow"], "S_FIRST_ROW", array())) || $this->getAttribute($context["forumrow"], "S_NO_CAT", array()))) {
                // line 4
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t";
            }
            // line 9
            echo "
\t";
            // line 10
            // line 11
            echo "\t";
            if ((($this->getAttribute($context["forumrow"], "S_IS_CAT", array()) || $this->getAttribute($context["forumrow"], "S_FIRST_ROW", array())) || $this->getAttribute($context["forumrow"], "S_NO_CAT", array()))) {
                // line 12
                echo "\t\t<div class=\"forabg category-";
                echo $this->getAttribute($context["forumrow"], "FORUM_ID", array());
                if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", array()) == 0)) {
                    echo " elegant";
                }
                echo "\" data-hide-description=\"";
                echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "HIDE_FORUM_DESCRIPTION", array());
                echo "\">
\t\t\t<div class=\"inner\">
\t\t\t<ul class=\"topiclist\">
\t\t\t\t<li class=\"header\">
\t\t\t\t\t";
                // line 16
                // line 17
                echo "\t\t\t\t\t<dl class=\"icon\">
\t\t\t\t\t\t<dt><div class=\"list-inner\">";
                // line 18
                if ($this->getAttribute($context["forumrow"], "S_IS_CAT", array())) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", array());
                    echo "\" data-id=\"";
                    echo $this->getAttribute($context["forumrow"], "FORUM_ID", array());
                    echo "\">";
                    echo $this->getAttribute($context["forumrow"], "FORUM_NAME", array());
                    echo "</a>";
                } else {
                    echo $this->env->getExtension('phpbb')->lang("FORUM");
                }
                echo "</div></dt>
\t\t\t\t\t\t<dd class=\"topics\">";
                // line 19
                echo $this->env->getExtension('phpbb')->lang("TOPICS");
                echo "</dd>
\t\t\t\t\t\t<dd class=\"posts\">";
                // line 20
                echo $this->env->getExtension('phpbb')->lang("POSTS");
                echo "</dd>
\t\t\t\t\t\t<dd class=\"lastpost\"><span>";
                // line 21
                echo $this->env->getExtension('phpbb')->lang("LAST_POST");
                echo "</span></dd>
\t\t\t\t\t</dl>
\t\t\t\t\t";
                // line 23
                // line 24
                echo "\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<ul class=\"topiclist forums\">
\t";
            }
            // line 28
            echo "\t";
            // line 29
            echo "
\t";
            // line 30
            if ( !$this->getAttribute($context["forumrow"], "S_IS_CAT", array())) {
                // line 31
                echo "\t\t";
                // line 32
                echo "\t\t<li class=\"row forum-";
                echo $this->getAttribute($context["forumrow"], "FORUM_ID", array());
                echo "\">
\t\t\t";
                // line 33
                // line 34
                echo "\t\t\t";
                ob_start();
                // line 35
                echo "\t\t\t";
                if (((($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", array()) == 0) &&  !$this->getAttribute($context["forumrow"], "CLICKS", array())) &&  !$this->getAttribute($context["forumrow"], "S_IS_LINK", array()))) {
                    // line 36
                    echo "\t\t\t\t<div class=\"forum-statistics\">
\t\t\t\t\t<span class=\"dfn\">";
                    // line 37
                    echo $this->env->getExtension('phpbb')->lang("TOPICS");
                    echo "</span>";
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo " <span class=\"value\">";
                    echo $this->getAttribute($context["forumrow"], "TOPICS", array());
                    echo "</span><span class=\"comma\">";
                    echo $this->env->getExtension('phpbb')->lang("COMMA_SEPARATOR");
                    echo "</span>
\t\t\t\t\t<span class=\"dfn\">";
                    // line 38
                    echo $this->env->getExtension('phpbb')->lang("POSTS");
                    echo "</span>";
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo " <span class=\"value\">";
                    echo $this->getAttribute($context["forumrow"], "POSTS", array());
                    echo "</span>
\t\t\t\t</div>
\t\t\t";
                }
                // line 41
                echo "\t\t\t";
                $value = ('' === $value = ob_get_clean()) ? '' : new \Twig_Markup($value, $this->env->getCharset());
                $context['definition']->set('EXTRA_DESC', $value);
                // line 42
                echo "\t\t\t<dl class=\"icon ";
                echo $this->getAttribute($context["forumrow"], "FORUM_IMG_STYLE", array());
                if (trim($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "EXTRA_DESC", array()))) {
                    echo " elegant-row";
                }
                echo "\">
\t\t\t\t<dt title=\"";
                // line 43
                echo $this->getAttribute($context["forumrow"], "FORUM_FOLDER_IMG_ALT", array());
                echo "\">
\t\t\t\t\t";
                // line 44
                if ($this->getAttribute($context["forumrow"], "S_UNREAD_FORUM", array())) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", array());
                    echo "\" class=\"icon-link\"></a>";
                }
                // line 45
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t";
                // line 46
                if (((isset($context["S_ENABLE_FEEDS"]) ? $context["S_ENABLE_FEEDS"] : null) && $this->getAttribute($context["forumrow"], "S_FEED_ENABLED", array()))) {
                    echo "<!-- <a class=\"feed-icon-forum\" title=\"";
                    echo $this->env->getExtension('phpbb')->lang("FEED");
                    echo " - ";
                    echo $this->getAttribute($context["forumrow"], "FORUM_NAME", array());
                    echo "\" href=\"";
                    echo (isset($context["U_FEED"]) ? $context["U_FEED"] : null);
                    echo "?f=";
                    echo $this->getAttribute($context["forumrow"], "FORUM_ID", array());
                    echo "\"></a> -->";
                }
                // line 47
                echo "
\t\t\t\t\t\t";
                // line 48
                if ($this->getAttribute($context["forumrow"], "FORUM_IMAGE", array())) {
                    echo "<span class=\"forum-image\">";
                    echo $this->getAttribute($context["forumrow"], "FORUM_IMAGE", array());
                    echo "</span>";
                }
                // line 49
                echo "\t\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", array());
                echo "\" class=\"forumtitle\" data-id=\"";
                echo $this->getAttribute($context["forumrow"], "FORUM_ID", array());
                echo "\">";
                echo $this->getAttribute($context["forumrow"], "FORUM_NAME", array());
                echo "</a>
\t\t\t\t\t\t";
                // line 50
                if ($this->getAttribute($context["forumrow"], "FORUM_DESC", array())) {
                    echo "<div class=\"forum-description\">";
                    echo $this->getAttribute($context["forumrow"], "FORUM_DESC", array());
                    echo "</div>";
                }
                // line 51
                echo "\t\t\t\t\t\t";
                echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "EXTRA_DESC", array());
                echo "
\t\t\t\t\t\t";
                // line 52
                if ($this->getAttribute($context["forumrow"], "MODERATORS", array())) {
                    // line 53
                    echo "\t\t\t\t\t\t\t<div class=\"forum-moderators\"><strong>";
                    echo $this->getAttribute($context["forumrow"], "L_MODERATOR_STR", array());
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</strong> ";
                    echo $this->getAttribute($context["forumrow"], "MODERATORS", array());
                    echo "</div>
\t\t\t\t\t\t";
                }
                // line 55
                echo "\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, $this->getAttribute($context["forumrow"], "subforum", array())) && $this->getAttribute($context["forumrow"], "S_LIST_SUBFORUMS", array()))) {
                    // line 56
                    echo "\t\t\t\t\t\t\t<div class=\"subforums-list\">
\t\t\t\t\t\t\t";
                    // line 57
                    // line 58
                    echo "\t\t\t\t\t\t\t<strong>";
                    echo $this->getAttribute($context["forumrow"], "L_SUBFORUM_STR", array());
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</strong>
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
                    // line 60
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["forumrow"], "subforum", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["subforum"]) {
                        // line 61
                        echo "\t\t\t\t\t\t\t\t<li><a href=\"";
                        echo $this->getAttribute($context["subforum"], "U_SUBFORUM", array());
                        echo "\" class=\"subforum";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", array())) {
                            echo " unread";
                        } else {
                            echo " read";
                        }
                        echo "\" title=\"";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", array())) {
                            echo $this->env->getExtension('phpbb')->lang("UNREAD_POSTS");
                        } else {
                            echo $this->env->getExtension('phpbb')->lang("NO_UNREAD_POSTS");
                        }
                        echo "\">";
                        echo $this->getAttribute($context["subforum"], "SUBFORUM_NAME", array());
                        echo "</a>";
                        if ( !$this->getAttribute($context["subforum"], "S_LAST_ROW", array())) {
                            echo "<span>";
                            echo $this->env->getExtension('phpbb')->lang("COMMA_SEPARATOR");
                            echo "</span>";
                        }
                        echo "</li>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subforum'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 63
                    echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t";
                    // line 64
                    // line 65
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 67
                echo "
\t\t\t\t\t\t";
                // line 68
                if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
                    // line 69
                    echo "\t\t\t\t\t\t";
                    if ((trim($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "EXTRA_DESC", array())) == "")) {
                        // line 70
                        echo "\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t";
                        // line 71
                        if ($this->getAttribute($context["forumrow"], "CLICKS", array())) {
                            // line 72
                            echo "\t\t\t\t\t\t\t\t";
                            echo $this->env->getExtension('phpbb')->lang("REDIRECTS");
                            echo $this->env->getExtension('phpbb')->lang("COLON");
                            echo " <strong>";
                            echo $this->getAttribute($context["forumrow"], "CLICKS", array());
                            echo "</strong>
\t\t\t\t\t\t\t";
                        } elseif (( !$this->getAttribute(                        // line 73
$context["forumrow"], "S_IS_LINK", array()) && $this->getAttribute($context["forumrow"], "TOPICS", array()))) {
                            // line 74
                            echo "\t\t\t\t\t\t\t\t";
                            echo $this->env->getExtension('phpbb')->lang("TOPICS");
                            echo $this->env->getExtension('phpbb')->lang("COLON");
                            echo " <strong>";
                            echo $this->getAttribute($context["forumrow"], "TOPICS", array());
                            echo "</strong>
\t\t\t\t\t\t\t";
                        }
                        // line 76
                        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 78
                    echo "\t\t\t\t\t\t\t";
                    if (( !$this->getAttribute($context["forumrow"], "S_IS_LINK", array()) && $this->getAttribute($context["forumrow"], "LAST_POST_TIME", array()))) {
                        // line 79
                        echo "\t\t\t\t\t\t\t<div class=\"forum-lastpost\" style=\"display: none;\">
\t\t\t\t\t\t\t\t<span><strong>";
                        // line 80
                        echo $this->env->getExtension('phpbb')->lang("LAST_POST");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
                        echo "</strong> <a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_LAST_POST", array());
                        echo "\" title=\"";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT", array());
                        echo "\" class=\"lastsubject\">";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT_TRUNCATED", array());
                        echo "</a></span>
\t\t\t\t\t\t\t\t<span>";
                        // line 81
                        echo $this->env->getExtension('phpbb')->lang("POST_BY_AUTHOR");
                        echo " ";
                        echo $this->getAttribute($context["forumrow"], "LAST_POSTER_FULL", array());
                        echo ", ";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_TIME", array());
                        echo "</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    // line 84
                    echo "\t\t\t\t\t\t";
                }
                // line 85
                echo "
\t\t\t\t\t\t";
                // line 86
                if ($this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", array())) {
                    // line 87
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", array());
                    echo "\" class=\"forum-mcplink\">";
                    echo (isset($context["UNAPPROVED_IMG"]) ? $context["UNAPPROVED_IMG"] : null);
                    echo "</a>
\t\t\t\t\t\t";
                } elseif ($this->getAttribute(                // line 88
$context["forumrow"], "U_UNAPPROVED_POSTS", array())) {
                    // line 89
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["forumrow"], "U_UNAPPROVED_POSTS", array());
                    echo "\" class=\"forum-mcplink\">";
                    echo (isset($context["UNAPPROVED_POST_IMG"]) ? $context["UNAPPROVED_POST_IMG"] : null);
                    echo "</a>
\t\t\t\t\t\t";
                }
                // line 91
                echo "\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t";
                // line 93
                if ($this->getAttribute($context["forumrow"], "CLICKS", array())) {
                    // line 94
                    echo "\t\t\t\t\t<dd class=\"redirect\"><span>";
                    echo $this->env->getExtension('phpbb')->lang("REDIRECTS");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute($context["forumrow"], "CLICKS", array());
                    echo "</span></dd>
\t\t\t\t";
                } elseif ( !$this->getAttribute(                // line 95
$context["forumrow"], "S_IS_LINK", array())) {
                    // line 96
                    echo "\t\t\t\t\t";
                    if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", array()) != 0)) {
                        // line 97
                        echo "\t\t\t\t\t<dd class=\"topics\">";
                        echo $this->getAttribute($context["forumrow"], "TOPICS", array());
                        echo " <dfn>";
                        echo $this->env->getExtension('phpbb')->lang("TOPICS");
                        echo "</dfn></dd>
\t\t\t\t\t<dd class=\"posts\">";
                        // line 98
                        echo $this->getAttribute($context["forumrow"], "POSTS", array());
                        echo " <dfn>";
                        echo $this->env->getExtension('phpbb')->lang("POSTS");
                        echo "</dfn></dd>
\t\t\t\t\t";
                    }
                    // line 100
                    echo "\t\t\t\t\t<dd class=\"lastpost\"><span>
\t\t\t\t\t\t";
                    // line 101
                    if ($this->getAttribute($context["forumrow"], "LAST_POST_TIME", array())) {
                        echo "<dfn>";
                        echo $this->env->getExtension('phpbb')->lang("LAST_POST");
                        echo "</dfn>
\t\t\t\t\t\t";
                        // line 102
                        if ($this->getAttribute($context["forumrow"], "S_DISPLAY_SUBJECT", array())) {
                            // line 103
                            echo "\t\t\t\t\t\t\t";
                            // line 104
                            echo "\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["forumrow"], "U_LAST_POST", array());
                            echo "\" title=\"";
                            echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT", array());
                            echo "\" class=\"lastsubject\">";
                            echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT_TRUNCATED", array());
                            echo "</a> <br />
\t\t\t\t\t\t";
                        }
                        // line 105
                        echo " 
\t\t\t\t\t\t";
                        // line 106
                        echo $this->env->getExtension('phpbb')->lang("POST_BY_AUTHOR");
                        echo " ";
                        echo $this->getAttribute($context["forumrow"], "LAST_POSTER_FULL", array());
                        echo "
\t\t\t\t\t\t";
                        // line 107
                        if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
                            echo "<a href=\"";
                            echo $this->getAttribute($context["forumrow"], "U_LAST_POST", array());
                            echo "\">";
                            echo (isset($context["LAST_POST_IMG"]) ? $context["LAST_POST_IMG"] : null);
                            echo "</a> ";
                        }
                        echo "<br />";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_TIME", array());
                    } else {
                        echo $this->env->getExtension('phpbb')->lang("NO_POSTS");
                        echo "<br />&nbsp;";
                    }
                    echo "</span>
\t\t\t\t\t</dd>
\t\t\t\t";
                } else {
                    // line 110
                    echo "\t\t\t\t\t<dd>&nbsp;</dd>
\t\t\t\t";
                }
                // line 112
                echo "\t\t\t</dl>
\t\t\t";
                // line 113
                // line 114
                echo "\t\t</li>
\t\t";
                // line 115
                // line 116
                echo "\t";
            }
            // line 117
            echo "
\t";
            // line 118
            if ($this->getAttribute($context["forumrow"], "S_LAST_ROW", array())) {
                // line 119
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t";
                // line 123
                // line 124
                echo "\t";
            }
            // line 125
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 127
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<strong>";
            // line 129
            echo $this->env->getExtension('phpbb')->lang("NO_FORUMS");
            echo "</strong>
\t\t</div>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forumrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forumlist_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 129,  478 => 127,  472 => 125,  469 => 124,  468 => 123,  462 => 119,  460 => 118,  457 => 117,  454 => 116,  453 => 115,  450 => 114,  449 => 113,  446 => 112,  442 => 110,  424 => 107,  418 => 106,  415 => 105,  405 => 104,  403 => 103,  401 => 102,  395 => 101,  392 => 100,  385 => 98,  378 => 97,  375 => 96,  373 => 95,  365 => 94,  363 => 93,  359 => 91,  351 => 89,  349 => 88,  342 => 87,  340 => 86,  337 => 85,  334 => 84,  324 => 81,  313 => 80,  310 => 79,  307 => 78,  303 => 76,  294 => 74,  292 => 73,  284 => 72,  282 => 71,  279 => 70,  276 => 69,  274 => 68,  271 => 67,  267 => 65,  266 => 64,  263 => 63,  234 => 61,  230 => 60,  223 => 58,  222 => 57,  219 => 56,  216 => 55,  207 => 53,  205 => 52,  200 => 51,  194 => 50,  185 => 49,  179 => 48,  176 => 47,  164 => 46,  161 => 45,  155 => 44,  151 => 43,  143 => 42,  139 => 41,  129 => 38,  119 => 37,  116 => 36,  113 => 35,  110 => 34,  109 => 33,  104 => 32,  102 => 31,  100 => 30,  97 => 29,  95 => 28,  89 => 24,  88 => 23,  83 => 21,  79 => 20,  75 => 19,  61 => 18,  58 => 17,  57 => 16,  44 => 12,  41 => 11,  40 => 10,  37 => 9,  30 => 4,  27 => 3,  22 => 2,  19 => 1,);
    }
}
