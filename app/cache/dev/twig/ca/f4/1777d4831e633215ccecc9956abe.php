<?php

/* QiissGeneralBundle:Default:resetPassword.html.twig */
class __TwigTemplate_caf41777d4831e633215ccecc9956abe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html class=\"yui3-cssreset\">
<head>
\t<meta charset=\"utf-8\">
\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/modernizr.2.6.2-min.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/yepnope.1.5.4-min.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/polyfiller.min.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/globalFunctions.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/reset/resetPassword.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
";
        // line 19
        $this->env->loadTemplate("QiissGeneralBundle:Default:header.html.twig")->display($context);
        // line 20
        echo "<div id=\"main_container\">
\t<div class=\"self_admin_main_border\">
\t\t<div id=\"self_admin_main_header\">
\t\t\tForgot Password
\t\t</div>
\t\t<div class=\"self_admin_main\">
\t\t\t<div class=\"section_container\">
\t\t\t\t<div class=\"section\">
\t\t\t\t\t<div class=\"section_body\">
\t\t\t\t\t\t";
        // line 29
        $this->env->loadTemplate("QiissUserBundle:Resetting:request.html.twig")->display($context);
        // line 30
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Qiiss - Settings";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/resetPassword.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/globalFunctions.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/cssreset-context-min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t";
    }

    public function getTemplateName()
    {
        return "QiissGeneralBundle:Default:resetPassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 8,  167 => 6,  161 => 5,  221 => 9,  217 => 8,  209 => 6,  203 => 5,  140 => 72,  23 => 2,  86 => 5,  77 => 5,  69 => 22,  82 => 27,  62 => 20,  40 => 12,  53 => 17,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 98,  176 => 65,  170 => 7,  168 => 60,  146 => 58,  142 => 56,  128 => 50,  125 => 44,  107 => 36,  38 => 12,  144 => 73,  141 => 51,  135 => 47,  126 => 45,  109 => 41,  103 => 37,  67 => 20,  61 => 13,  47 => 9,  94 => 39,  88 => 6,  59 => 22,  28 => 3,  91 => 8,  84 => 28,  44 => 11,  105 => 24,  93 => 28,  79 => 39,  76 => 23,  72 => 20,  68 => 12,  24 => 3,  31 => 6,  225 => 96,  216 => 90,  212 => 7,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  159 => 61,  154 => 59,  147 => 55,  132 => 70,  127 => 46,  121 => 45,  118 => 44,  114 => 42,  104 => 9,  100 => 8,  78 => 21,  75 => 30,  71 => 23,  58 => 17,  34 => 5,  26 => 2,  27 => 5,  25 => 4,  21 => 1,  19 => 1,  70 => 20,  63 => 21,  46 => 14,  22 => 2,  163 => 59,  155 => 58,  152 => 49,  149 => 75,  145 => 46,  139 => 55,  131 => 51,  123 => 41,  120 => 40,  115 => 39,  106 => 36,  101 => 32,  96 => 21,  83 => 6,  80 => 25,  74 => 16,  66 => 21,  55 => 17,  52 => 15,  50 => 15,  43 => 7,  41 => 7,  37 => 8,  35 => 8,  32 => 7,  29 => 3,  184 => 70,  178 => 71,  171 => 91,  165 => 58,  162 => 57,  157 => 60,  153 => 76,  151 => 53,  143 => 54,  138 => 51,  136 => 71,  133 => 43,  130 => 47,  122 => 43,  119 => 60,  116 => 35,  111 => 37,  108 => 52,  102 => 30,  98 => 31,  95 => 7,  92 => 6,  89 => 25,  85 => 25,  81 => 31,  73 => 29,  64 => 20,  60 => 19,  57 => 11,  54 => 16,  51 => 11,  48 => 11,  45 => 8,  42 => 13,  39 => 10,  36 => 5,  33 => 11,  30 => 5,);
    }
}
