<?php

/* WebProfilerBundle:Profiler:results.html.twig */
class __TwigTemplate_d5b3260edd41f2854d5c5d2e53d1972c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_panel($context, array $blocks = array())
    {
        // line 4
        echo "    <h2>Search Results</h2>

    ";
        // line 6
        if ($this->getContext($context, "tokens")) {
            // line 7
            echo "        <table>
            <thead>
                <tr>
                    <th scope=\"col\">Token</th>
                    <th scope=\"col\">IP</th>
                    <th scope=\"col\">Method</th>
                    <th scope=\"col\">URL</th>
                    <th scope=\"col\">Time</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tokens"));
            foreach ($context['_seq'] as $context["_key"] => $context["elements"]) {
                // line 19
                echo "                    <tr>
                        <td><a href=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getAttribute($this->getContext($context, "elements"), "token"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "elements"), "token"), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "elements"), "ip"), "html", null, true);
                echo "</td>
                        <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "elements"), "method"), "html", null, true);
                echo "</td>
                        <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "elements"), "url"), "html", null, true);
                echo "</td>
                        <td>";
                // line 24
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "elements"), "time"), "r"), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['elements'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 27
            echo "            </tbody>
        </table>
    ";
        } else {
            // line 30
            echo "        <p>
            <em>The query returned no result.</em>
        </p>
    ";
        }
        // line 34
        echo "
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 33,  97 => 45,  65 => 22,  230 => 12,  226 => 11,  222 => 10,  214 => 8,  208 => 7,  190 => 100,  166 => 85,  110 => 50,  56 => 39,  49 => 13,  164 => 60,  158 => 59,  156 => 58,  148 => 55,  134 => 65,  124 => 49,  117 => 44,  99 => 52,  113 => 40,  175 => 91,  167 => 6,  161 => 5,  221 => 9,  217 => 9,  209 => 6,  203 => 5,  140 => 61,  23 => 3,  86 => 39,  77 => 18,  69 => 22,  82 => 37,  62 => 21,  40 => 8,  53 => 38,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 98,  176 => 65,  170 => 7,  168 => 61,  146 => 58,  142 => 54,  128 => 50,  125 => 44,  107 => 42,  38 => 6,  144 => 69,  141 => 51,  135 => 47,  126 => 63,  109 => 42,  103 => 41,  67 => 22,  61 => 18,  47 => 15,  94 => 33,  88 => 41,  59 => 21,  28 => 3,  91 => 28,  84 => 27,  44 => 11,  105 => 41,  93 => 39,  79 => 26,  76 => 26,  72 => 20,  68 => 21,  24 => 3,  31 => 4,  225 => 96,  216 => 90,  212 => 7,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 63,  159 => 61,  154 => 59,  147 => 55,  132 => 70,  127 => 10,  121 => 45,  118 => 29,  114 => 42,  104 => 37,  100 => 36,  78 => 26,  75 => 24,  71 => 23,  58 => 17,  34 => 8,  26 => 3,  27 => 5,  25 => 29,  21 => 2,  19 => 1,  70 => 13,  63 => 21,  46 => 14,  22 => 2,  163 => 59,  155 => 58,  152 => 57,  149 => 75,  145 => 46,  139 => 55,  131 => 11,  123 => 33,  120 => 40,  115 => 28,  106 => 36,  101 => 33,  96 => 35,  83 => 6,  80 => 28,  74 => 25,  66 => 22,  55 => 15,  52 => 14,  50 => 18,  43 => 11,  41 => 12,  37 => 7,  35 => 6,  32 => 6,  29 => 3,  184 => 97,  178 => 64,  171 => 91,  165 => 58,  162 => 57,  157 => 79,  153 => 76,  151 => 53,  143 => 40,  138 => 52,  136 => 71,  133 => 31,  130 => 30,  122 => 9,  119 => 8,  116 => 35,  111 => 44,  108 => 52,  102 => 47,  98 => 43,  95 => 34,  92 => 43,  89 => 30,  85 => 29,  81 => 31,  73 => 23,  64 => 11,  60 => 20,  57 => 20,  54 => 19,  51 => 16,  48 => 9,  45 => 13,  42 => 12,  39 => 10,  36 => 7,  33 => 6,  30 => 7,);
    }
}
