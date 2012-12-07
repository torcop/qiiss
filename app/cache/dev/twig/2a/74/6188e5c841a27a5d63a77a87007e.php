<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_2a746188e5c841a27a5d63a77a87007e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("TwigBundle:Exception:exception.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  32 => 4,  234 => 126,  228 => 125,  224 => 123,  220 => 122,  212 => 120,  207 => 117,  201 => 116,  197 => 114,  193 => 113,  189 => 112,  183 => 111,  176 => 107,  170 => 106,  166 => 104,  162 => 103,  158 => 102,  152 => 101,  150 => 100,  145 => 97,  136 => 95,  129 => 91,  46 => 8,  42 => 10,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  227 => 12,  223 => 11,  219 => 10,  214 => 121,  211 => 8,  205 => 7,  187 => 100,  181 => 110,  172 => 91,  163 => 85,  154 => 79,  141 => 96,  137 => 68,  131 => 65,  127 => 64,  123 => 63,  107 => 50,  95 => 43,  76 => 26,  74 => 25,  68 => 22,  64 => 21,  60 => 20,  56 => 19,  52 => 18,  48 => 17,  44 => 16,  40 => 15,  35 => 14,  33 => 8,  29 => 3,  21 => 1,);
    }
}
