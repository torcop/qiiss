<?php

/* AcmeDemoBundle:Secured:helloadmin.html.twig */
class __TwigTemplate_d4293c082dca3a2c1650e9718f22059f extends Twig_Template
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
        // line 9
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
        echo " secured for Admins only!</h1>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Secured:helloadmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 39,  95 => 45,  84 => 39,  47 => 10,  172 => 6,  166 => 5,  135 => 70,  75 => 27,  51 => 11,  21 => 1,  60 => 19,  38 => 6,  18 => 1,  299 => 100,  293 => 96,  290 => 95,  287 => 94,  285 => 93,  280 => 90,  274 => 86,  271 => 85,  268 => 84,  266 => 83,  261 => 80,  247 => 79,  243 => 77,  228 => 75,  220 => 73,  218 => 72,  213 => 70,  209 => 69,  202 => 66,  196 => 63,  183 => 61,  181 => 60,  175 => 7,  158 => 57,  107 => 5,  101 => 34,  80 => 37,  63 => 23,  36 => 6,  156 => 58,  148 => 55,  142 => 50,  140 => 50,  127 => 68,  123 => 67,  115 => 42,  110 => 42,  85 => 28,  65 => 18,  59 => 22,  45 => 16,  103 => 24,  91 => 20,  74 => 23,  70 => 20,  66 => 24,  25 => 5,  89 => 20,  82 => 19,  92 => 44,  86 => 41,  77 => 23,  57 => 13,  19 => 1,  42 => 12,  29 => 3,  26 => 3,  223 => 96,  214 => 90,  210 => 88,  203 => 84,  199 => 83,  194 => 80,  192 => 62,  189 => 78,  187 => 77,  184 => 76,  178 => 72,  170 => 67,  157 => 61,  152 => 7,  145 => 53,  130 => 48,  125 => 49,  119 => 30,  116 => 29,  112 => 43,  102 => 36,  98 => 51,  76 => 24,  73 => 23,  69 => 28,  56 => 18,  32 => 5,  24 => 9,  22 => 6,  23 => 3,  17 => 1,  68 => 20,  61 => 24,  44 => 8,  20 => 1,  161 => 63,  153 => 50,  150 => 49,  147 => 51,  143 => 5,  137 => 45,  129 => 42,  121 => 33,  118 => 46,  113 => 28,  104 => 35,  99 => 33,  94 => 21,  81 => 18,  78 => 28,  72 => 16,  64 => 15,  53 => 12,  50 => 10,  48 => 8,  41 => 7,  39 => 10,  35 => 5,  33 => 5,  30 => 4,  27 => 5,  182 => 70,  176 => 71,  169 => 62,  163 => 58,  160 => 57,  155 => 56,  151 => 54,  149 => 6,  141 => 40,  136 => 47,  134 => 50,  131 => 31,  128 => 30,  120 => 37,  117 => 36,  114 => 35,  109 => 59,  106 => 37,  100 => 47,  96 => 34,  93 => 33,  90 => 43,  87 => 25,  83 => 24,  79 => 25,  71 => 19,  62 => 17,  58 => 14,  55 => 12,  52 => 16,  49 => 11,  46 => 9,  43 => 8,  40 => 7,  37 => 7,  34 => 5,  31 => 6,  28 => 3,);
    }
}
