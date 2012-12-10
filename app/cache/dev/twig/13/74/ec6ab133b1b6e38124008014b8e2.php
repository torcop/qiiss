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
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
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
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
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
        return array (  49 => 26,  25 => 5,  113 => 84,  39 => 19,  178 => 64,  172 => 63,  168 => 61,  164 => 60,  158 => 59,  156 => 58,  152 => 57,  148 => 55,  142 => 54,  138 => 52,  134 => 51,  130 => 50,  124 => 49,  122 => 48,  117 => 45,  111 => 83,  107 => 42,  103 => 41,  99 => 40,  93 => 39,  82 => 34,  73 => 32,  67 => 29,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  95 => 9,  91 => 38,  86 => 35,  83 => 6,  77 => 33,  71 => 48,  69 => 22,  66 => 21,  64 => 20,  58 => 17,  54 => 16,  50 => 15,  46 => 11,  42 => 10,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,  32 => 4,  29 => 3,);
    }
}
