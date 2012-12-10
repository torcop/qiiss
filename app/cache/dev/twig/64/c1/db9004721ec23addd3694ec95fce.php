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
\t\t\t<div id=\"propose_date_profile_picture\"></div>
\t\t\t<div id=\"date_target_name\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, "username"), "html", null, true);
        echo "</div>
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_profile_propose_date", array("profileid" => $this->getContext($context, "profileid"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t<div class=\"content_header\">Date Overview</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t<div class=\"content_upper_text\">
\t\t\t\t\t\t\t    \t\tPut your creative hat on – it’s time to suggest a date.
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    \t";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event_description"), 'widget', array("attr" => array("placeholder" => "Date Overview", "rows" => 6)));
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "event_date"), "date"), "day"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t\t";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "event_date"), "date"), "month"), 'widget');
        echo "
\t\t\t\t\t\t\t\t    \t";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "event_date"), "date"), "year"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t</div>
\t\t\t\t\t\t\t    \t<div id=\"date_time\">
\t\t\t\t\t\t\t    \t\t";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "event_date"), "time"), "hour"), 'widget');
        echo "
\t\t\t\t\t\t\t    \t\t";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "event_date"), "time"), "minute"), 'widget');
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event_place"), 'widget', array("attr" => array("placeholder" => "Event Location")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Media</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event_media"), 'widget', array("attr" => array("placeholder" => "Event Media")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Links</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event_link"), 'widget', array("attr" => array("placeholder" => "Event Links")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"content\">
\t\t\t\t\t\t\t    <div class=\"content_header\">Price (Optional)</div>
\t\t\t\t\t\t\t    <div class=\"content_block\">
\t\t\t\t\t\t\t    \t";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event_price"), 'widget', array("attr" => array("placeholder" => "Price")));
        echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    ";
        // line 100
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
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
        return array (  230 => 12,  226 => 11,  222 => 10,  214 => 8,  208 => 7,  190 => 100,  166 => 85,  110 => 50,  56 => 19,  49 => 26,  164 => 60,  158 => 59,  156 => 58,  148 => 55,  134 => 65,  124 => 49,  117 => 45,  99 => 52,  113 => 7,  175 => 91,  167 => 6,  161 => 5,  221 => 9,  217 => 9,  209 => 6,  203 => 5,  140 => 68,  23 => 2,  86 => 34,  77 => 33,  69 => 22,  82 => 34,  62 => 20,  40 => 15,  53 => 17,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 98,  176 => 65,  170 => 7,  168 => 61,  146 => 58,  142 => 54,  128 => 50,  125 => 44,  107 => 42,  38 => 12,  144 => 69,  141 => 51,  135 => 47,  126 => 63,  109 => 41,  103 => 41,  67 => 29,  61 => 13,  47 => 9,  94 => 39,  88 => 6,  59 => 22,  28 => 5,  91 => 38,  84 => 28,  44 => 16,  105 => 24,  93 => 39,  79 => 39,  76 => 26,  72 => 20,  68 => 22,  24 => 3,  31 => 6,  225 => 96,  216 => 90,  212 => 7,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 63,  159 => 61,  154 => 59,  147 => 55,  132 => 70,  127 => 10,  121 => 45,  118 => 44,  114 => 42,  104 => 9,  100 => 8,  78 => 21,  75 => 30,  71 => 48,  58 => 17,  34 => 5,  26 => 3,  27 => 5,  25 => 5,  21 => 1,  19 => 1,  70 => 20,  63 => 21,  46 => 11,  22 => 2,  163 => 59,  155 => 58,  152 => 57,  149 => 75,  145 => 46,  139 => 55,  131 => 11,  123 => 41,  120 => 40,  115 => 39,  106 => 36,  101 => 53,  96 => 21,  83 => 6,  80 => 25,  74 => 25,  66 => 22,  55 => 17,  52 => 18,  50 => 15,  43 => 7,  41 => 7,  37 => 8,  35 => 14,  32 => 7,  29 => 7,  184 => 97,  178 => 64,  171 => 91,  165 => 58,  162 => 57,  157 => 79,  153 => 76,  151 => 53,  143 => 54,  138 => 52,  136 => 71,  133 => 43,  130 => 64,  122 => 9,  119 => 8,  116 => 35,  111 => 44,  108 => 52,  102 => 30,  98 => 43,  95 => 7,  92 => 6,  89 => 25,  85 => 25,  81 => 31,  73 => 32,  64 => 21,  60 => 20,  57 => 11,  54 => 16,  51 => 11,  48 => 17,  45 => 8,  42 => 10,  39 => 19,  36 => 7,  33 => 8,  30 => 4,);
    }
}
