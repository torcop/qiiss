<?php

/* QiissUserBundle::/Profile/profile.html.twig */
class __TwigTemplate_08bef6242a39b56b4b508af607dfea4f extends Twig_Template
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
  <meta charset=\"utf-8\">
  <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/modernizr.2.6.2-min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/yepnope.1.5.4-min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/polyfiller.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/globalFunctions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/js/profile/profile.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/js/header.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
\t";
        // line 20
        $this->env->loadTemplate("QiissUserBundle:Profile:header.html.twig")->display($context);
        // line 21
        echo "\t<div id=\"main_container\">
\t\t";
        // line 22
        $this->env->loadTemplate("QiissUserBundle:Profile:canvas.html.twig")->display($context);
        // line 23
        echo "\t</div>
</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Qiiss - Profile";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/css/profile.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/globalFunctions.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/cssreset-context-min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    ";
    }

    public function getTemplateName()
    {
        return "QiissUserBundle::/Profile/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 9,  91 => 8,  86 => 7,  83 => 6,  77 => 5,  71 => 23,  69 => 22,  66 => 21,  64 => 20,  58 => 17,  54 => 16,  50 => 15,  46 => 14,  42 => 13,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,  32 => 4,  29 => 3,);
    }
}
