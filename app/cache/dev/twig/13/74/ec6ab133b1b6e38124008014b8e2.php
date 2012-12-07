<?php

/* QiissUserBundle:Profile:canvas_post.html.twig */
class __TwigTemplate_1374ec6ab133b1b6e38124008014b8e2 extends Twig_Template
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
        echo "<div class=\"canvas_post\">
\t<div class=\"canvas_post_header\">
\t\t<div class=\"header_dp\"><img src=\"#\" /></div>
\t\t<div class=\"header_text\">
\t\t\t<div class=\"header_name\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"header_time\">Posted 20 Minutes ago</div>
\t\t</div>
\t</div>
\t<div class=\"canvas_post_body canvas_post_section\">Sample canvas post. Here's my new profile picture!</div>
\t<div class=\"canvas_post_attachment canvas_post_section\">
\t\t<img src=\"#\" />
\t</div>
\t<div class=\"canvas_post_tags canvas_post_section\">
\t\t<div class=\"post_tag_bubble\">Breaking Bad</div><div class=\"post_tag_bubble\">Guitar</div><div class=\"post_tag_bubble\">Cycling</div>
\t</div>
\t<div class=\"canvas_qool canvas_post_section\">
\t\t<div class=\"canvas_qool_button\">Qool</div>
\t\t<div class=\"canvas_qool_count\">12,599 people think this is Qool.</div>
\t</div>
</div>

<div class=\"canvas_post\">
\t<div class=\"canvas_post_header\">
\t\t<div class=\"header_dp\"><img src=\"#\" /></div>
\t\t<div class=\"header_text\">
\t\t\t<div class=\"header_name\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"header_time\">Posted 60 Minutes ago</div>
\t\t</div>
\t</div>
\t<div class=\"canvas_post_body canvas_post_section\">\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</div>
\t<div class=\"canvas_post_tags canvas_post_section\">
\t\t<div class=\"post_tag_bubble\">Random Stuff</div><div class=\"post_tag_bubble\">Other Stuff</div><div class=\"post_tag_bubble\">lolololol</div>
\t</div>
\t<div class=\"canvas_qool canvas_post_section\">
\t\t<div class=\"canvas_qool_button\">Qool</div>
\t\t<div class=\"canvas_qool_count\">122,599 people think this is Qool.</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "QiissUserBundle:Profile:canvas_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 26,  25 => 5,  113 => 84,  111 => 83,  39 => 19,  234 => 126,  228 => 125,  224 => 123,  220 => 122,  214 => 121,  212 => 120,  207 => 117,  201 => 116,  197 => 114,  193 => 113,  189 => 112,  183 => 111,  181 => 110,  176 => 107,  170 => 106,  166 => 104,  162 => 103,  158 => 102,  152 => 101,  150 => 100,  145 => 97,  141 => 96,  136 => 95,  129 => 91,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  95 => 9,  91 => 8,  86 => 7,  83 => 6,  77 => 5,  71 => 48,  69 => 22,  66 => 21,  64 => 20,  58 => 17,  54 => 16,  50 => 15,  46 => 11,  42 => 10,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,  32 => 4,  29 => 3,);
    }
}
