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
        return array (  91 => 20,  84 => 19,  74 => 16,  57 => 14,  51 => 12,  36 => 7,  25 => 4,  105 => 24,  98 => 22,  96 => 21,  93 => 20,  89 => 19,  83 => 18,  76 => 16,  72 => 14,  68 => 12,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  163 => 63,  159 => 61,  157 => 60,  154 => 59,  147 => 55,  143 => 54,  138 => 51,  136 => 50,  132 => 48,  130 => 47,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  100 => 34,  95 => 31,  78 => 28,  71 => 26,  58 => 9,  41 => 9,  34 => 11,  94 => 39,  88 => 6,  79 => 17,  59 => 22,  48 => 19,  26 => 3,  43 => 7,  32 => 4,  29 => 3,  28 => 5,  63 => 24,  55 => 13,  44 => 10,  39 => 6,  35 => 4,  30 => 5,  24 => 3,  22 => 2,  19 => 1,  222 => 9,  218 => 8,  213 => 7,  210 => 6,  204 => 5,  196 => 80,  178 => 71,  168 => 91,  150 => 76,  146 => 75,  141 => 73,  137 => 72,  133 => 71,  129 => 70,  116 => 60,  104 => 36,  81 => 40,  75 => 27,  66 => 15,  64 => 20,  60 => 23,  54 => 16,  50 => 8,  46 => 7,  42 => 13,  38 => 12,  33 => 5,  31 => 5,  27 => 4,  21 => 2,);
    }
}
