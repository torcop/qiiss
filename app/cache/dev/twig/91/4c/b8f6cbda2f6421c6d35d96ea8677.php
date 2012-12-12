<?php

/* AcmeDemoBundle::layout.html.twig */
class __TwigTemplate_914cb8f6cbda2f6421c6d35d96ea8677 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" sizes=\"16x16\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div id=\"symfony-wrapper\">
            <div id=\"symfony-header\">
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_welcome"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/images/logo.gif"), "html", null, true);
        echo "\" alt=\"Symfony logo\" />
                </a>
                <form id=\"symfony-search\" method=\"GET\" action=\"http://symfony.com/search\">
                    <label for=\"symfony-search-field\"><span>Search on Symfony Website</span></label>
                    <input name=\"q\" id=\"symfony-search-field\" type=\"search\" placeholder=\"Search on Symfony website\" class=\"medium_txt\" />
                    <input type=\"submit\" class=\"symfony-button-grey\" value=\"OK\" />
                </form>
            </div>

            ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 23
            echo "                <div class=\"flash-message\">
                    <em>Notice</em>: ";
            // line 24
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        echo "
            ";
        // line 28
        $this->displayBlock('content_header', $context, $blocks);
        // line 37
        echo "
            <div class=\"symfony-content\">
                ";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "            </div>

            ";
        // line 43
        if (array_key_exists("code", $context)) {
            // line 44
            echo "                <h2>Code behind this page</h2>
                <div class=\"symfony-content\">";
            // line 45
            echo $this->getContext($context, "code");
            echo "</div>
            ";
        }
        // line 47
        echo "        </div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 28
    public function block_content_header($context, array $blocks = array())
    {
        // line 29
        echo "                <ul id=\"menu\">
                    ";
        // line 30
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 33
        echo "                </ul>

                <div style=\"clear: both\"></div>
            ";
    }

    // line 30
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 31
        echo "                        <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo"), "html", null, true);
        echo "\">Demo Home</a></li>
                    ";
    }

    // line 39
    public function block_content($context, array $blocks = array())
    {
        // line 40
        echo "                ";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 12,  226 => 11,  222 => 10,  217 => 9,  214 => 8,  208 => 7,  190 => 101,  166 => 86,  134 => 66,  110 => 51,  56 => 20,  174 => 67,  158 => 63,  148 => 60,  140 => 39,  117 => 50,  113 => 7,  97 => 45,  175 => 92,  167 => 6,  161 => 5,  204 => 9,  200 => 8,  195 => 7,  192 => 6,  164 => 65,  65 => 23,  49 => 13,  23 => 1,  99 => 53,  86 => 39,  77 => 27,  69 => 23,  82 => 37,  62 => 20,  40 => 6,  53 => 17,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 13,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 66,  176 => 65,  170 => 66,  168 => 60,  146 => 58,  142 => 56,  128 => 54,  125 => 44,  107 => 36,  38 => 12,  144 => 70,  141 => 51,  135 => 12,  126 => 64,  109 => 5,  103 => 34,  67 => 25,  61 => 22,  47 => 9,  94 => 44,  88 => 41,  59 => 18,  28 => 4,  91 => 29,  84 => 28,  44 => 17,  105 => 46,  93 => 36,  79 => 38,  76 => 27,  72 => 20,  68 => 24,  24 => 4,  31 => 3,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 5,  180 => 72,  172 => 67,  159 => 61,  154 => 61,  147 => 55,  132 => 64,  127 => 10,  121 => 30,  118 => 29,  114 => 39,  104 => 9,  100 => 8,  78 => 21,  75 => 30,  71 => 48,  58 => 18,  34 => 5,  26 => 9,  27 => 5,  25 => 5,  21 => 1,  19 => 1,  70 => 20,  63 => 21,  46 => 14,  22 => 2,  163 => 59,  155 => 58,  152 => 49,  149 => 48,  145 => 46,  139 => 55,  131 => 11,  123 => 33,  120 => 40,  115 => 28,  106 => 52,  101 => 54,  96 => 21,  83 => 39,  80 => 28,  74 => 26,  66 => 23,  55 => 17,  52 => 19,  50 => 15,  43 => 12,  41 => 11,  37 => 7,  35 => 15,  32 => 7,  29 => 5,  184 => 98,  178 => 69,  171 => 62,  165 => 58,  162 => 64,  157 => 80,  153 => 54,  151 => 53,  143 => 40,  138 => 51,  136 => 56,  133 => 31,  130 => 30,  122 => 9,  119 => 8,  116 => 35,  111 => 37,  108 => 36,  102 => 47,  98 => 44,  95 => 67,  92 => 43,  89 => 28,  85 => 25,  81 => 31,  73 => 35,  64 => 22,  60 => 21,  57 => 11,  54 => 16,  51 => 11,  48 => 18,  45 => 12,  42 => 13,  39 => 19,  36 => 10,  33 => 6,  30 => 7,);
    }
}
