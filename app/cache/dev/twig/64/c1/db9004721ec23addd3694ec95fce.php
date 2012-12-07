<?php

/* QiissProfileBundle:Profile:date.html.twig */
class __TwigTemplate_64c1db9004721ec23addd3694ec95fce extends Twig_Template
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
<pre>
</pre>
<head>
\t<meta charset=\"utf-8\">
\t<title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/modernizr.2.6.2-min.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/yepnope.1.5.4-min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/polyfiller.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/globalFunctions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissprofile/js/jquery-calender-widget.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissprofile/js/timepicker-min.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissprofile/js/proposeDate.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/js/header.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
";
        // line 25
        $this->env->loadTemplate("QiissUserBundle:Profile:header.html.twig")->display($context);
        // line 26
        echo "<div id=\"main_container\">
\t<div id=\"propose_date_main_border\">
\t\t<div id=\"propose_date_main_header\">
\t\t\tPropose A Date
\t\t</div>
\t\t<div id=\"propose_date_main_left\">
\t\t\t<div class=\"section_header\">Your Date</div>
\t\t\t<div id=\"propose_date_profile_picture\">
\t\t\t</div>
\t\t</div>
\t\t<div class=\"propose_date_main_right\">
\t\t\t<div class=\"section_container\">
\t\t\t\t<div class=\"header\">
\t\t\t\t\t<div class=\"inner\">The Details (Click to contract)</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"section\">
\t\t\t\t\t<div class=\"section_body\">
\t\t\t\t\t\t<form action=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_profile_propose_date"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t<div class=\"content_header\">Date Overview</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t<div class=\"content_upper_text\">
\t\t\t\t\t\t\t    \t\tPut your creative hat on – it’s time to suggest a date.
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    \t";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_description"), 'widget', array("attr" => array("placeholder" => "Date Overview", "rows" => 6)));
        echo "
\t\t\t\t\t\t\t    \t<div class=\"content_lower_text\">
\t\t\t\t\t\t\t    \t\tCapture their imagination! Don’t be afraid to suggest something unique; after all, it could be an unforgettable experience.
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t    \t<div class=\"content_header\">Date / Time</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t<div id=\"calendar\" class=\"calendar\"></div>
\t\t\t\t\t\t\t    \t<div id=\"calendar_one_month\" class=\"calendar\"></div>
\t\t\t\t\t\t\t    \t<div id=\"calendar_two_month\" class=\"calendar\"></div>
\t\t\t\t\t\t\t    \t<div id=\"date_date\">
\t\t\t\t\t\t\t    \t\t";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_date"), "date"), "day"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t\t";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_date"), "date"), "month"), 'widget');
        echo "
\t\t\t\t\t\t\t\t    \t";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_date"), "date"), "year"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    \t<div id=\"date_time\">
\t\t\t\t\t\t\t    \t\t";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_date"), "time"), "hour"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t\t";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_date"), "time"), "minute"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    \t<div id=\"time_picker_container\">
\t\t\t\t\t\t\t    \t\t<input type=\"text\" id=\"time_picker\" placeholder=\"Time\" required=\"required\"/>
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Location</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_place"), 'widget', array("attr" => array("placeholder" => "Event Location")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Media</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_media"), 'widget', array("attr" => array("placeholder" => "Event Media")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Links</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_link"), 'widget', array("attr" => array("placeholder" => "Event Links")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Price (Optional)</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "event_price"), 'widget', array("attr" => array("placeholder" => "Price")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    ";
        // line 100
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
\t\t\t\t\t\t    <div class=\"content_submit\">
\t\t\t\t\t\t    \t<input type=\"submit\" class=\"submit\" value=\"Submit\" />
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Qiiss - Propose A Date";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "\t\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissprofile/css/proposeDate.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/globalFunctions.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/cssreset-context-min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t\t<link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissprofile/css/timepicker.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t";
    }

    public function getTemplateName()
    {
        return "QiissProfileBundle:Profile:date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 12,  223 => 11,  219 => 10,  214 => 9,  211 => 8,  205 => 7,  187 => 100,  181 => 97,  172 => 91,  163 => 85,  154 => 79,  141 => 69,  137 => 68,  131 => 65,  127 => 64,  123 => 63,  107 => 50,  95 => 43,  76 => 26,  74 => 25,  68 => 22,  64 => 21,  60 => 20,  56 => 19,  52 => 18,  48 => 17,  44 => 16,  40 => 15,  35 => 14,  33 => 8,  29 => 7,  21 => 1,);
    }
}
