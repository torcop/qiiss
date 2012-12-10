<?php

/* TwigBundle:Exception:trace.html.twig */
class __TwigTemplate_6b61bc9b5c33d3369fb4964cfd7eae0b extends Twig_Template
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
        if ($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")) {
            // line 2
            echo "    at
    <strong>
        <abbr title=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "class"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "short_class"), "html", null, true);
            echo "</abbr>
        ";
            // line 5
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "type") . $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")), "html", null, true);
            echo "
    </strong>
    (";
            // line 7
            echo $this->env->getExtension('code')->formatArgs($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "args"));
            echo ")
";
        }
        // line 9
        echo "
";
        // line 10
        if (((($this->getAttribute((isset($context["trace"]) ? $context["trace"] : null), "file", array(), "any", true, true) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file")) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : null), "line", array(), "any", true, true)) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line"))) {
            // line 11
            echo "    ";
            echo (($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")) ? ("<br />") : (""));
            echo "
    in ";
            // line 12
            echo $this->env->getExtension('code')->formatFile($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file"), $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line"));
            echo "&nbsp;
    ";
            // line 13
            ob_start();
            // line 14
            echo "    <a href=\"#\" onclick=\"toggle('trace_";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "_") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "'); switchIcons('icon_";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "_") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "_open', 'icon_";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "_") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "_close'); return false;\">
        <img class=\"toggle\" id=\"icon_";
            // line 15
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "_") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "_close\" alt=\"-\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
            echo "\" style=\"visibility: ";
            echo (((0 == (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))) ? ("display") : ("hidden"));
            echo "\" />
        <img class=\"toggle\" id=\"icon_";
            // line 16
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "_") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "_open\" alt=\"+\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
            echo "\" style=\"visibility: ";
            echo (((0 == (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))) ? ("hidden") : ("display"));
            echo "; margin-left: -18px\" />
    </a>
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 19
            echo "    <div id=\"trace_";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "_") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "\" style=\"display: ";
            echo (((0 == (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))) ? ("block") : ("none"));
            echo "\" class=\"trace\">
        ";
            // line 20
            echo $this->env->getExtension('code')->fileExcerpt($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file"), $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line"));
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  84 => 19,  74 => 16,  57 => 14,  51 => 12,  36 => 7,  25 => 4,  105 => 24,  98 => 22,  96 => 21,  93 => 20,  89 => 19,  83 => 18,  76 => 16,  72 => 14,  68 => 12,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  163 => 63,  159 => 61,  157 => 60,  154 => 59,  147 => 55,  143 => 54,  138 => 51,  136 => 50,  132 => 48,  130 => 47,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  100 => 34,  95 => 31,  78 => 28,  71 => 26,  58 => 9,  41 => 9,  34 => 11,  94 => 39,  88 => 6,  79 => 17,  59 => 22,  48 => 19,  26 => 6,  43 => 7,  32 => 4,  29 => 3,  28 => 5,  63 => 24,  55 => 13,  44 => 10,  39 => 6,  35 => 7,  30 => 5,  24 => 3,  22 => 2,  19 => 1,  222 => 9,  218 => 8,  213 => 7,  210 => 6,  204 => 5,  196 => 80,  178 => 71,  168 => 91,  150 => 76,  146 => 75,  141 => 73,  137 => 72,  133 => 71,  129 => 70,  116 => 60,  104 => 36,  81 => 40,  75 => 27,  66 => 15,  64 => 20,  60 => 23,  54 => 16,  50 => 8,  46 => 11,  42 => 13,  38 => 12,  33 => 5,  31 => 5,  27 => 4,  21 => 2,);
    }
}
