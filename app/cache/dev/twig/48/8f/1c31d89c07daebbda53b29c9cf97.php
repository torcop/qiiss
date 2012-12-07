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
\t<div id=\"dates_icon\" class=\"notifications\"><img src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/images/Qiiss-Date-Icon.png"), "html", null, true);
        echo "\" /></div>
\t<div id=\"messages_icon\" class=\"notifications\"><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/images/Qiiss-Message-Icon.png"), "html", null, true);
        echo "\" /></div>
\t<div id=\"notifications_icon\" class=\"notifications\"><img src=\"";
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
\t<div id=\"notifications_popup\" class=\"popup\">
\t\t<div class=\"popup_header\">Notifications</div>
\t\t<div class=\"popup_content\">
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"popup_item\">
\t\t\t\t<div class=\"popup_item_dp\"><img src=\"#\" class=\"popup_item_dp_img\"></div>
\t\t\t\t<div class=\"popup_item_content\">
\t\t\t\t\t<div class=\"popup_item_text\">Nic Barker liked your post</div>
\t\t\t\t\t<div class=\"popup_item_time\">20 Minutes ago</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div id=\"messages_popup\" class=\"popup\">
\t\t<div class=\"popup_header\">Messages</div>
\t</div>
\t<div id=\"dates_popup\" class=\"popup\">
\t\t<div class=\"popup_header\">Dates</div>
\t</div>
</div>
<div id=\"lower_top_banner\">
\t<a href=\"/home\"><img src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/qiiss-graphics/blue/Logo.png"), "html", null, true);
        echo "\" /></a>
</div>
<div id=\"lower_top_nav\">
\t<a href=\"/profile\"><div id=\"nav_profile\" class=\"
\t\t";
        // line 95
        if ((array_key_exists("navSelection", $context) && ((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "profile"))) {
            echo " selected left
\t\t";
        } else {
            // line 96
            echo " left
\t\t";
        }
        // line 97
        echo "\">Profile
\t</div></a>
\t<a href=\"/search\"><div id=\"nav_find_dates\" class=\"
\t\t";
        // line 100
        if (array_key_exists("navSelection", $context)) {
            // line 101
            echo "\t\t\t";
            if (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "findDates")) {
                echo " selected left right
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "profile")) {
                // line 102
                echo " left left-shadow
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "searchPeople")) {
                // line 103
                echo " right right-shadow
\t\t\t";
            } else {
                // line 104
                echo " left
\t\t\t";
            }
            // line 106
            echo "\t\t";
        } else {
            echo " left
\t\t";
        }
        // line 107
        echo "\">Search People
\t</div></a>
\t<a href=\"/global-canvas\"><div id=\"nav_global_canvas\" class=\"
\t\t";
        // line 110
        if (array_key_exists("navSelection", $context)) {
            // line 111
            echo "\t\t\t";
            if (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "globalCanvas")) {
                echo " selected left right
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "findDates")) {
                // line 112
                echo " left left-shadow
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "settings")) {
                // line 113
                echo " left right right-shadow
\t\t\t";
            } else {
                // line 114
                echo " left
\t\t\t";
            }
            // line 116
            echo "\t\t";
        } else {
            echo " left
\t\t";
        }
        // line 117
        echo "\">Global Canvas
\t</div></a>
\t<a href=\"/settings\"><div id=\"nav_settings\" class=\"
\t\t";
        // line 120
        if (array_key_exists("navSelection", $context)) {
            // line 121
            echo "\t\t\t";
            if (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "settings")) {
                echo " selected
\t\t\t";
            } elseif (((isset($context["navSelection"]) ? $context["navSelection"] : $this->getContext($context, "navSelection")) == "findDates")) {
                // line 122
                echo " left left-shadow
\t\t\t";
            } else {
                // line 123
                echo " left
\t\t\t";
            }
            // line 125
            echo "\t\t";
        } else {
            echo " left
\t\t";
        }
        // line 126
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
        return array (  234 => 126,  228 => 125,  224 => 123,  220 => 122,  214 => 121,  212 => 120,  207 => 117,  201 => 116,  197 => 114,  193 => 113,  189 => 112,  183 => 111,  181 => 110,  176 => 107,  170 => 106,  166 => 104,  162 => 103,  158 => 102,  152 => 101,  150 => 100,  145 => 97,  141 => 96,  136 => 95,  129 => 91,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  95 => 9,  91 => 8,  86 => 7,  83 => 6,  77 => 5,  71 => 23,  69 => 22,  66 => 21,  64 => 20,  58 => 17,  54 => 16,  50 => 15,  46 => 11,  42 => 10,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,  32 => 4,  29 => 3,);
    }
}
