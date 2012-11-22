<?php

/* QiissGeneralBundle:Default:splash.html.twig */
class __TwigTemplate_871529cac6d27c8a83d23d77bd81cc54 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    \t";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "\t\t\t\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t<script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-placeholder.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t<script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/splash/splash.js"), "html", null, true);
        echo "\"></script>\t\t
</head>
<body>
<img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/Final-Homepage-background.gif"), "html", null, true);
        echo "\" class=\"background-image\" />
<div id=\"upper_top_banner\">
\t<a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_general_faq"), "html", null, true);
        echo "\"><div id=\"faq\">About Qiiss</div></a>
</div>
<div id=\"lower_top_banner\">
\t<img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/qiiss-graphics/blue/Logo.png"), "html", null, true);
        echo "\" />
</div>
<div id=\"main_container\">
\t<div id=\"main_container_inner_left\" class=\"main_container_inner\">
\t\t<div id=\"picture_container_vertical_divider\"></div>
\t\t<div id=\"picture_container_outer\">
\t\t\t<div id=\"picture_container_border\">
\t\t\t\t<div id=\"picture_container\">
\t\t\t\t\t<div class=\"picture_container_inner\">
\t\t\t\t\t\t<img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/home-page-images/message5.JPG"), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"picture_container_inner hidden\">
\t\t\t\t\t\t<img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/home-page-images/message4.JPG"), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"picture_container_text bottom\">
\t\t\t\t<em></e>Experience incredible <br /> first dates</em>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div id=\"main_container_inner_right\" class=\"main_container_inner\">
\t\t<div id=\"login_container_vertical_divider\"></div>
\t\t<div id=\"login_container_outer\">
\t\t\t<div id=\"login_container\">
\t\t\t\t<div class=\"top_message\">
\t\t\t\t\t<div id=\"signup_tab\" class=\"auth_tab_button selected\">Sign Up</div>
\t\t\t\t\t<div id=\"login_tab\" class=\"auth_tab_button left shadow\">Log In</div>
\t\t\t\t\t<div id=\"signup_facebook_tab\" class=\"auth_tab_button left\">Facebook</div>
\t\t\t\t</div>
\t\t\t\t<div id=\"signup_container_body\" class=\"auth_tab selected\">
\t\t\t\t\t<div class=\"signup_fields\">
\t\t\t\t\t\t<form name=\"signup_form\" class=\"signup_form\" action=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" method=\"POST\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"username\" placeholder=\"Name\" />
\t\t\t\t\t\t\t<input type=\"text\" name=\"email\" placeholder=\"Email\" />
\t\t\t\t\t\t\t<input type=\"password\" name=\"password\" placeholder=\"Password\" />
\t\t\t\t\t\t\t<input type=\"password\" name=\"confirm-password\" placeholder=\"Confirm Password\" />
\t\t\t\t\t\t\t<input type=\"text\" name=\"birthday_day\" class=\"birthday\" placeholder=\"Day\"/>
\t\t\t\t\t\t\t<input type=\"text\" name=\"birthday_month\" class=\"birthday\" placeholder=\"Month\"/>
\t\t\t\t\t\t\t<input type=\"text\" name=\"birthday_year\" class=\"birthday last\" placeholder=\"Year\"/>
\t\t\t\t\t\t\t<input type=\"submit\" class=\"submit\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sign Up", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<div class=\"remember_me\"><div><input type=\"checkbox\" />Remember Me</div></div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div id=\"login_container_body\" class=\"auth_tab\">
\t\t\t\t\t<div class=\"signup_fields\">
\t\t\t\t\t\t<form name=\"login_form\" class=\"signup_form\" action=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"POST\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"email\" placeholder=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Username", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<input type=\"password\" name=\"email\" placeholder=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<input type=\"submit\" class=\"submit\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<div class=\"remember_me\"><div><input type=\"checkbox\" />";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remember Me", array(), "FOSUserBundle"), "html", null, true);
        echo "</div></div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div id=\"facebook_container_body\" class=\"auth_tab\">
\t\t\t\t\t<div class=\"signup_fields\">
\t\t\t\t\t\t<div class=\"facebook_login_button\">
\t\t\t\t\t\t\t<div class=\"left\"><img src=\"https://chideo.com/assets/logo_facebook_f-3d17eb2041318519c6b8a608f4c84590.svg\" width=\"30px\";/></div>
\t\t\t\t\t\t\t<div class=\"right\">Login With Facebook</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div id=\"disclaimer\">By clicking Sign Up, you agree to our Terms and
\t\t\t\tthat you have read and understand our Data Use Policy,
\t\t\t\tincluding our Cookie Use.
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<div id=\"stream_outer\">
\t<div class=\"stream_inner first\">
\t</div>
</div>
</body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome to Qiiss";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "\t\t\t\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/splash.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t\t\t";
    }

    public function getTemplateName()
    {
        return "QiissGeneralBundle:Default:splash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 7,  172 => 6,  166 => 5,  135 => 70,  131 => 69,  127 => 68,  123 => 67,  119 => 66,  109 => 59,  98 => 51,  75 => 31,  69 => 28,  57 => 19,  51 => 16,  46 => 14,  40 => 11,  36 => 10,  31 => 9,  29 => 6,  25 => 5,  19 => 1,);
    }
}
