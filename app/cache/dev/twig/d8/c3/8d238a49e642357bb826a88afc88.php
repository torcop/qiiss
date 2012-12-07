<?php

/* TwigBundle::layout.html.twig */
class __TwigTemplate_d8c38d238a49e642357bb826a88afc88 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\"/>
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception_layout.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    </head>
    <body>
        <div id=\"content\">
            <div class=\"header clear_fix\">
                <div class=\"header_logo\">
                    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/logo_symfony.png"), "html", null, true);
        echo "\" alt=\"Symfony\" />
                </div>

                <div class=\"search\">
                  <form method=\"get\" action=\"http://symfony.com/search\">
                    <div class=\"form_row\">

                      <label for=\"search_id\">
                          <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/grey_magnifier.png"), "html", null, true);
        echo "\" alt=\"Search on Symfony website\" />
                      </label>

                      <input name=\"q\" id=\"search_id\" type=\"search\" placeholder=\"Search on Symfony website\" />

                      <button type=\"submit\">
                        <span class=\"border_l\">
                          <span class=\"border_r\">
                            <span class=\"btn_bg\">OK</span>
                          </span>
                        </span>
                      </button>
                    </div>
                   </form>
                </div>
            </div>

            ";
        // line 39
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "        </div>
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "";
    }

    // line 39
    public function block_body($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "TwigBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 39,  88 => 6,  81 => 40,  79 => 39,  59 => 22,  39 => 8,  31 => 6,  43 => 7,  32 => 4,  234 => 126,  228 => 125,  224 => 123,  220 => 122,  212 => 120,  207 => 117,  201 => 116,  197 => 114,  193 => 113,  189 => 112,  183 => 111,  176 => 107,  170 => 106,  166 => 104,  162 => 103,  158 => 102,  152 => 101,  150 => 100,  145 => 97,  136 => 95,  129 => 91,  46 => 8,  42 => 10,  36 => 7,  30 => 4,  26 => 4,  22 => 2,  19 => 1,  227 => 12,  223 => 11,  219 => 10,  214 => 121,  211 => 8,  205 => 7,  187 => 100,  181 => 110,  172 => 91,  163 => 85,  154 => 79,  141 => 96,  137 => 68,  131 => 65,  127 => 64,  123 => 63,  107 => 50,  95 => 43,  76 => 26,  74 => 25,  68 => 22,  64 => 21,  60 => 20,  56 => 19,  52 => 18,  48 => 14,  44 => 16,  40 => 15,  35 => 7,  33 => 8,  29 => 3,  21 => 1,);
    }
}
