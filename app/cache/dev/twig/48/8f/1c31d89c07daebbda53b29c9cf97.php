<?php

/* QiissUserBundle:Profile:header.html.twig */
class __TwigTemplate_488f1c31d89c07daebbda53b29c9cf97 extends Twig_Template
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
        echo "<div id=\"upper_top_banner\">
\t<div id=\"date_icon\" class=\"notifications\"><img src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/images/Qiiss-Date-Icon.png"), "html", null, true);
        echo "\" /></div>
\t<div id=\"message_icon\" class=\"notifications\"><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/images/Qiiss-Message-Icon.png"), "html", null, true);
        echo "\" /></div>
\t<div id=\"notification_icon\" class=\"notifications\"><img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/images/Qiiss-Notification-Icon.png"), "html", null, true);
        echo "\" /></div>
\t<div><a href=\"/faq\"><div id=\"faq\">About</div></a></div>
\t<div id=\"logout_div\">
\t\t<div id=\"logout_div_profile\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        echo "</div>
\t\t<div id=\"logout_div_seperator\"></div>
\t\t<div id=\"logout_div_button\">
\t\t\t<a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
        echo "\">
                ";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Log Out", array(), "FOSUserBundle"), "html", null, true);
        echo "
            </a>
        </div>
\t</div>
\t<div id=\"notification_popup\" class=\"popup\">
\t\t<div class=\"popup_header\">Notifications</div>
\t\t<div class=\"popup_content\"></div>
\t</div>
\t<div id=\"message_popup\" class=\"popup\">
\t\t<div class=\"popup_header\">Messages</div>
\t\t<div class=\"popup_content\"></div>
\t</div>
\t<div id=\"date_popup\" class=\"popup\">
\t\t<div class=\"popup_header\">Dates</div>
\t\t<div class=\"popup_content\"></div>
\t</div>
</div>
<div id=\"lower_top_banner\">
\t<a href=\"/home\"><img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/qiiss-graphics/blue/Logo.png"), "html", null, true);
        echo "\" /></a>
</div>
<div id=\"lower_top_nav\">
\t<a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_show"), "html", null, true);
        echo "\"><div id=\"nav_profile\" class=\"
\t\t";
        // line 33
        if ((array_key_exists("navSelection", $context) && ((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "profile"))) {
            echo " selected left
\t\t";
        } else {
            // line 34
            echo " left
\t\t";
        }
        // line 35
        echo "\">Profile
\t</div></a>
\t<a href=\"/search\"><div id=\"nav_find_dates\" class=\"
\t\t";
        // line 38
        if (array_key_exists("navSelection", $context)) {
            // line 39
            echo "\t\t\t";
            if (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "findDates")) {
                echo " selected left right
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "profile")) {
                // line 40
                echo " left left-shadow
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "searchPeople")) {
                // line 41
                echo " right right-shadow
\t\t\t";
            } else {
                // line 42
                echo " left
\t\t\t";
            }
            // line 44
            echo "\t\t";
        } else {
            echo " left
\t\t";
        }
        // line 45
        echo "\">Search People
\t</div></a>
\t<a href=\"/global-canvas\"><div id=\"nav_global_canvas\" class=\"
\t\t";
        // line 48
        if (array_key_exists("navSelection", $context)) {
            // line 49
            echo "\t\t\t";
            if (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "globalCanvas")) {
                echo " selected left right
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "findDates")) {
                // line 50
                echo " left left-shadow
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "settings")) {
                // line 51
                echo " left right right-shadow
\t\t\t";
            } else {
                // line 52
                echo " left
\t\t\t";
            }
            // line 54
            echo "\t\t";
        } else {
            echo " left
\t\t";
        }
        // line 55
        echo "\">Global Canvas
\t</div></a>
\t<a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_self_admin"), "html", null, true);
        echo "\"><div id=\"nav_settings\" class=\"
\t\t";
        // line 58
        if (array_key_exists("navSelection", $context)) {
            // line 59
            echo "\t\t\t";
            if (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "settings")) {
                echo " selected
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "findDates")) {
                // line 60
                echo " left left-shadow
\t\t\t";
            } else {
                // line 61
                echo " left
\t\t\t";
            }
            // line 63
            echo "\t\t";
        } else {
            echo " left
\t\t";
        }
        // line 64
        echo "\">Settings
\t</div></a>
</div>
";
    }

    public function getTemplateName()
    {
        return "QiissUserBundle:Profile:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 64,  172 => 63,  168 => 61,  164 => 60,  158 => 59,  156 => 58,  152 => 57,  148 => 55,  142 => 54,  138 => 52,  134 => 51,  130 => 50,  124 => 49,  122 => 48,  117 => 45,  111 => 44,  107 => 42,  103 => 41,  99 => 40,  93 => 39,  82 => 34,  73 => 32,  67 => 29,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  95 => 9,  91 => 38,  86 => 35,  83 => 6,  77 => 33,  71 => 23,  69 => 22,  66 => 21,  64 => 20,  58 => 17,  54 => 16,  50 => 15,  46 => 11,  42 => 10,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,  32 => 4,  29 => 3,);
    }
}
