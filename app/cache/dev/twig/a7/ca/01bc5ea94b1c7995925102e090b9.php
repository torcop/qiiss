<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_a7ca01bc5ea94b1c7995925102e090b9 extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  84 => 19,  66 => 15,  57 => 14,  55 => 13,  51 => 12,  25 => 4,  105 => 24,  98 => 22,  96 => 21,  93 => 20,  89 => 19,  83 => 18,  72 => 14,  50 => 8,  27 => 4,  24 => 3,  225 => 96,  216 => 90,  196 => 80,  194 => 79,  191 => 78,  186 => 76,  180 => 72,  178 => 71,  159 => 61,  157 => 60,  147 => 55,  143 => 54,  138 => 51,  132 => 48,  130 => 47,  121 => 45,  118 => 44,  114 => 43,  104 => 36,  100 => 34,  78 => 28,  75 => 27,  71 => 26,  63 => 24,  58 => 9,  41 => 9,  34 => 11,  94 => 39,  88 => 6,  81 => 40,  79 => 17,  59 => 22,  39 => 6,  31 => 5,  43 => 7,  32 => 4,  234 => 126,  228 => 125,  224 => 123,  220 => 122,  212 => 88,  207 => 117,  201 => 83,  197 => 114,  193 => 113,  189 => 77,  183 => 111,  176 => 107,  170 => 106,  166 => 104,  162 => 103,  158 => 102,  152 => 101,  150 => 100,  145 => 97,  136 => 50,  129 => 91,  46 => 7,  42 => 10,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  227 => 12,  223 => 11,  219 => 10,  214 => 121,  211 => 8,  205 => 84,  187 => 100,  181 => 110,  172 => 67,  163 => 63,  154 => 59,  141 => 96,  137 => 68,  131 => 65,  127 => 46,  123 => 63,  107 => 50,  95 => 31,  76 => 16,  74 => 16,  68 => 12,  64 => 21,  60 => 23,  56 => 19,  52 => 18,  48 => 19,  44 => 10,  40 => 15,  35 => 4,  33 => 5,  29 => 3,  21 => 2,);
    }
}
