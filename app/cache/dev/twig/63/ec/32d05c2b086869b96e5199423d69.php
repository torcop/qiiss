<?php

/* TwigBundle:Exception:error.json.twig */
class __TwigTemplate_63ec32d05c2b086869b96e5199423d69 extends Twig_Template
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
        echo twig_jsonencode_filter(array("error" => array("code" => $this->getContext($context, "status_code"), "message" => $this->getContext($context, "status_text"))));
        echo "
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 7,  105 => 24,  93 => 20,  79 => 17,  76 => 16,  72 => 14,  68 => 12,  24 => 3,  31 => 4,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  159 => 61,  154 => 59,  147 => 55,  132 => 48,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  104 => 36,  100 => 34,  78 => 28,  75 => 27,  71 => 26,  58 => 9,  34 => 11,  26 => 3,  27 => 4,  25 => 5,  21 => 2,  19 => 1,  70 => 14,  63 => 24,  46 => 7,  22 => 2,  163 => 63,  155 => 50,  152 => 49,  149 => 48,  145 => 46,  139 => 45,  131 => 42,  123 => 41,  120 => 40,  115 => 39,  106 => 36,  101 => 33,  96 => 21,  83 => 18,  80 => 24,  74 => 22,  66 => 20,  55 => 16,  52 => 15,  50 => 8,  43 => 9,  41 => 7,  37 => 8,  35 => 5,  32 => 9,  29 => 4,  184 => 70,  178 => 71,  171 => 62,  165 => 58,  162 => 57,  157 => 60,  153 => 54,  151 => 53,  143 => 54,  138 => 51,  136 => 50,  133 => 43,  130 => 47,  122 => 37,  119 => 36,  116 => 35,  111 => 38,  108 => 37,  102 => 30,  98 => 22,  95 => 31,  92 => 29,  89 => 19,  85 => 24,  81 => 22,  73 => 19,  64 => 19,  60 => 23,  57 => 12,  54 => 6,  51 => 9,  48 => 19,  45 => 8,  42 => 6,  39 => 6,  36 => 5,  33 => 6,  30 => 3,);
    }
}
