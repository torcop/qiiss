<?php

/* AcmeDemoBundle:Secured:hello.html.twig */
class __TwigTemplate_5424972d4c2196f12ee08b39487113a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle:Secured:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle:Secured:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        $context["code"] = $this->env->getExtension('demo')->getCode($this);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("Hello " . $this->getContext($context, "name")), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!</h1>

    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo_secured_hello_admin", array("name" => $this->getContext($context, "name"))), "html", null, true);
        echo "\">Hello resource secured for <strong>admin</strong> only.</a>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Secured:hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 45,  65 => 23,  230 => 12,  226 => 11,  222 => 10,  214 => 8,  208 => 7,  190 => 100,  166 => 85,  110 => 50,  56 => 19,  49 => 10,  164 => 60,  158 => 59,  156 => 58,  148 => 55,  134 => 65,  124 => 49,  117 => 44,  99 => 52,  113 => 43,  175 => 91,  167 => 6,  161 => 5,  221 => 9,  217 => 9,  209 => 6,  203 => 5,  140 => 61,  23 => 1,  86 => 39,  77 => 27,  69 => 22,  82 => 37,  62 => 20,  40 => 6,  53 => 11,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 98,  176 => 65,  170 => 7,  168 => 61,  146 => 58,  142 => 54,  128 => 50,  125 => 44,  107 => 42,  38 => 6,  144 => 69,  141 => 51,  135 => 47,  126 => 63,  109 => 42,  103 => 41,  67 => 29,  61 => 22,  47 => 9,  94 => 33,  88 => 41,  59 => 13,  28 => 5,  91 => 38,  84 => 28,  44 => 16,  105 => 41,  93 => 39,  79 => 26,  76 => 26,  72 => 20,  68 => 21,  24 => 3,  31 => 3,  225 => 96,  216 => 90,  212 => 7,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 63,  159 => 61,  154 => 59,  147 => 55,  132 => 70,  127 => 10,  121 => 45,  118 => 29,  114 => 42,  104 => 9,  100 => 8,  78 => 21,  75 => 30,  71 => 48,  58 => 17,  34 => 5,  26 => 11,  27 => 5,  25 => 5,  21 => 1,  19 => 1,  70 => 22,  63 => 19,  46 => 8,  22 => 2,  163 => 59,  155 => 58,  152 => 57,  149 => 75,  145 => 46,  139 => 55,  131 => 11,  123 => 33,  120 => 40,  115 => 28,  106 => 36,  101 => 53,  96 => 21,  83 => 6,  80 => 28,  74 => 24,  66 => 22,  55 => 17,  52 => 10,  50 => 15,  43 => 7,  41 => 7,  37 => 5,  35 => 5,  32 => 7,  29 => 3,  184 => 97,  178 => 64,  171 => 91,  165 => 58,  162 => 57,  157 => 79,  153 => 76,  151 => 53,  143 => 40,  138 => 52,  136 => 71,  133 => 31,  130 => 30,  122 => 9,  119 => 8,  116 => 35,  111 => 44,  108 => 52,  102 => 47,  98 => 43,  95 => 7,  92 => 43,  89 => 31,  85 => 29,  81 => 31,  73 => 32,  64 => 21,  60 => 20,  57 => 12,  54 => 16,  51 => 11,  48 => 9,  45 => 8,  42 => 7,  39 => 19,  36 => 5,  33 => 6,  30 => 3,);
    }
}
