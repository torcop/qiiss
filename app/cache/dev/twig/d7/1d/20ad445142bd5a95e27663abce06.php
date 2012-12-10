<?php

/* WebProfilerBundle:Profiler:info.html.twig */
class __TwigTemplate_d71d20ad445142bd5a95e27663abce06 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"content\">
        ";
        // line 5
        $this->env->loadTemplate("WebProfilerBundle:Profiler:header.html.twig")->display(array());
        // line 6
        echo "
        <div id=\"main\">
            <div class=\"clear_fix\">
                <div id=\"collector_wrapper\">
                    <div id=\"collector_content\">
                        ";
        // line 11
        $this->displayBlock('panel', $context, $blocks);
        // line 34
        echo "                    </div>
                </div>
                <div id=\"navigation\">
                    ";
        // line 37
        echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Profiler:searchBar", array("token" => ""), array());
        // line 38
        echo "                    ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:admin.html.twig")->display(array("token" => ""));
        // line 39
        echo "                </div>
            </div>
        </div>
    </div>
";
    }

    // line 11
    public function block_panel($context, array $blocks = array())
    {
        // line 12
        echo "                            ";
        if (($this->getContext($context, "about") == "purge")) {
            // line 13
            echo "                                <h2>The profiler database was purged successfully</h2>
                                <p>
                                    <em>Now you need to browse some pages with the Symfony Profiler enabled to collect data.</em>
                                </p>
                            ";
        } elseif (($this->getContext($context, "about") == "upload_error")) {
            // line 18
            echo "                                <h2>A problem occurred when uploading the data</h2>
                                <p>
                                    <em>No file given or the file was not uploaded successfully.</em>
                                </p>
                            ";
        } elseif (($this->getContext($context, "about") == "already_exists")) {
            // line 23
            echo "                                <h2>A problem occurred when uploading the data</h2>
                                <p>
                                    <em>The token already exists in the database.</em>
                                </p>
                            ";
        } elseif (($this->getContext($context, "about") == "no_token")) {
            // line 28
            echo "                                <h2>Token not found</h2>
                                <p>
                                    <em>Token \"";
            // line 30
            echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
            echo "\" was not found in the database.</em>
                                </p>
                            ";
        }
        // line 33
        echo "                        ";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 33,  97 => 45,  65 => 22,  230 => 12,  226 => 11,  222 => 10,  214 => 8,  208 => 7,  190 => 100,  166 => 85,  110 => 50,  56 => 39,  49 => 13,  164 => 60,  158 => 59,  156 => 58,  148 => 55,  134 => 65,  124 => 49,  117 => 44,  99 => 52,  113 => 40,  175 => 91,  167 => 6,  161 => 5,  221 => 9,  217 => 9,  209 => 6,  203 => 5,  140 => 61,  23 => 3,  86 => 39,  77 => 18,  69 => 22,  82 => 37,  62 => 21,  40 => 11,  53 => 38,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 98,  176 => 65,  170 => 7,  168 => 61,  146 => 58,  142 => 54,  128 => 50,  125 => 44,  107 => 42,  38 => 6,  144 => 69,  141 => 51,  135 => 47,  126 => 63,  109 => 42,  103 => 41,  67 => 12,  61 => 18,  47 => 15,  94 => 33,  88 => 41,  59 => 13,  28 => 6,  91 => 28,  84 => 23,  44 => 11,  105 => 41,  93 => 39,  79 => 26,  76 => 26,  72 => 20,  68 => 21,  24 => 3,  31 => 3,  225 => 96,  216 => 90,  212 => 7,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 63,  159 => 61,  154 => 59,  147 => 55,  132 => 70,  127 => 10,  121 => 45,  118 => 29,  114 => 42,  104 => 37,  100 => 36,  78 => 26,  75 => 30,  71 => 48,  58 => 17,  34 => 8,  26 => 9,  27 => 5,  25 => 29,  21 => 1,  19 => 1,  70 => 13,  63 => 19,  46 => 34,  22 => 2,  163 => 59,  155 => 58,  152 => 57,  149 => 75,  145 => 46,  139 => 55,  131 => 11,  123 => 33,  120 => 40,  115 => 28,  106 => 36,  101 => 33,  96 => 35,  83 => 6,  80 => 28,  74 => 25,  66 => 22,  55 => 17,  52 => 14,  50 => 16,  43 => 11,  41 => 12,  37 => 6,  35 => 5,  32 => 4,  29 => 3,  184 => 97,  178 => 64,  171 => 91,  165 => 58,  162 => 57,  157 => 79,  153 => 76,  151 => 53,  143 => 40,  138 => 52,  136 => 71,  133 => 31,  130 => 30,  122 => 9,  119 => 8,  116 => 35,  111 => 44,  108 => 52,  102 => 47,  98 => 43,  95 => 30,  92 => 43,  89 => 28,  85 => 29,  81 => 31,  73 => 23,  64 => 11,  60 => 20,  57 => 19,  54 => 16,  51 => 37,  48 => 9,  45 => 13,  42 => 7,  39 => 19,  36 => 9,  33 => 4,  30 => 7,);
    }
}
