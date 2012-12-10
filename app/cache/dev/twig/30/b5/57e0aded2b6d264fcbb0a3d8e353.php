<?php

/* QiissGeneralBundle:Default:header.html.twig */
class __TwigTemplate_30b557e0aded2b6d264fcbb0a3d8e353 extends Twig_Template
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
  <div><a href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_general_faq"), "html", null, true);
        echo "\"><div id=\"faq\">About Qiiss</div></a></div>
</div>
<div id=\"lower_top_banner\">
  <a href=\"/home\"><img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/qiiss-graphics/blue/Logo.png"), "html", null, true);
        echo "\" /></a>
</div>";
    }

    public function getTemplateName()
    {
        return "QiissGeneralBundle:Default:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 5,  63 => 23,  55 => 17,  44 => 11,  39 => 10,  35 => 8,  30 => 5,  24 => 3,  22 => 2,  19 => 1,  222 => 9,  218 => 8,  213 => 7,  210 => 6,  204 => 5,  196 => 113,  178 => 98,  168 => 91,  150 => 76,  146 => 75,  141 => 73,  137 => 72,  133 => 71,  129 => 70,  116 => 60,  104 => 51,  81 => 31,  75 => 28,  66 => 21,  64 => 20,  60 => 19,  54 => 16,  50 => 15,  46 => 12,  42 => 13,  38 => 12,  33 => 7,  31 => 6,  27 => 5,  21 => 1,);
    }
}
