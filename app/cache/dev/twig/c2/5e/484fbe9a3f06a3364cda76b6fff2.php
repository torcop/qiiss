<?php

/* QiissGeneralBundle:Default:splash.html.twig */
class __TwigTemplate_c25e484fbe9a3f06a3364cda76b6fff2 extends Twig_Template
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
<html class=\"yui3-cssreset\">
<head>
  <meta charset=\"utf-8\">
  <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/modernizr.2.6.2-min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/yepnope.1.5.4-min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/polyfiller.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/globalFunctions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/splash/splash.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
";
        // line 19
        echo $this->env->getExtension('facebook')->renderInitialize(array("xfbml" => true, "fbAsyncInit" => "onFbInit();"));
        echo "
";
        // line 20
        $this->env->loadTemplate("QiissGeneralBundle:Default:header.html.twig")->display($context);
        // line 21
        echo "<div id=\"main_container\">
  <div id=\"main_container_inner_left\" class=\"main_container_inner\">
    <div id=\"picture_container_vertical_divider\"></div>
    <div id=\"picture_container_outer\">
      <div id=\"picture_container_border\">
        <div id=\"picture_container\">
          <div class=\"picture_container_inner\">
            <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/home-page-images/message5.JPG"), "html", null, true);
        echo "\" />
          </div>
          <div class=\"picture_container_inner hidden\">
            <img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/home-page-images/message4.JPG"), "html", null, true);
        echo "\" />
          </div>
        </div>
      </div>
      <div class=\"picture_container_text bottom\">
        <em></e>Experience incredible <br /> first dates</em>
      </div>
    </div>
  </div>
  <div id=\"main_container_inner_right\" class=\"main_container_inner\">
    <div id=\"login_container_vertical_divider\"></div>
    <div id=\"login_container_outer\">
      <div id=\"login_container\">
        <div class=\"top_message\">
          <div id=\"signup_tab\" class=\"auth_tab_button right shadow\">Sign Up</div>
          <div id=\"login_tab\" class=\"auth_tab_button selected\">Log In</div>
          <div id=\"facebook_tab\" class=\"auth_tab_button left shadow\">Facebook</div>
        </div>
        <div id=\"signup_container_body\" class=\"auth_tab\">
          <div class=\"signup_fields\">
            <form action=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" id=\"signup_form\" class=\"signup_form\" method=\"POST\" class=\"fos_user_registration_register\">
              <input type=\"hidden\" id=\"_csrf_token\" name=\"fos_user_registration_form[_token]\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["register_token"]) ? $context["register_token"] : $this->getContext($context, "register_token")), "html", null, true);
        echo "\" />
              <div><div class=\"error_message username_error_message\">Error</div><input type=\"text\" class=\"username\" name=\"fos_user_registration_form[username]\" placeholder=\"Name\" /></div>
              <div><div class=\"error_message email_error_message\">Error</div><input type=\"text\" class=\"email\" name=\"fos_user_registration_form[email]\" placeholder=\"Email\" /></div>
              <div><div class=\"error_message password_error_message\">Error</div><input type=\"password\" class=\"password_first\" name=\"fos_user_registration_form[plainPassword][first]\" placeholder=\"Password\" /></div>
              <div><input type=\"password\" class=\"password_second\" name=\"fos_user_registration_form[plainPassword][second]\" placeholder=\"Confirm Password\" /></div>
              <div><div class=\"error_message birthday_error_message\">Error</div><input type=\"text\" name=\"fos_user_registration_form[dob][day]\" class=\"birthday\" placeholder=\"Day\"/>
              <input type=\"text\" name=\"fos_user_registration_form[dob][month]\" class=\"birthday\" placeholder=\"Month\"/>
              <input type=\"text\" name=\"fos_user_registration_form[dob][year]\" class=\"birthday last\" placeholder=\"Year\"/></div>
              <div><input type=\"submit\" class=\"submit\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sign Up", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
              <div class=\"remember_me\"><div><input type=\"checkbox\" />Remember Me</div></div></div>
            </form>
          </div>
        </div>
        <div id=\"login_container_body\" class=\"auth_tab selected\">
          <div id=\"forgot_password\">
            <a href=\"/reset-password\">Forgot your password?</a>
          </div>
          <div class=\"signup_fields\">
            <form name=\"login_form\" id=\"login_form\" class=\"signup_form\" action=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"POST\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<div><div class=\"error_message username_error_message\">Error</div><input type=\"text\" class=\"username\" name=\"_username\" placeholder=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Username", array(), "FOSUserBundle"), "html", null, true);
        echo "\" required=\"required\" /></div>
\t\t\t\t\t\t\t<div><input type=\"password\" class=\"password\" name=\"_password\" placeholder=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password", array(), "FOSUserBundle"), "html", null, true);
        echo "\" required=\"required\" /></div>
              <div>
                <input type=\"submit\" class=\"submit\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
                <div class=\"remember_me\"><div><input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remember Me", array(), "FOSUserBundle"), "html", null, true);
        echo "</div></div>
              </div>
            </form>
          </div>
          <div class=\"seperator_bottom\"></div>
          <div id=\"login_suggest\">
            <div id=\"suggest_top_text\">Don't have an account?</div>
            <div id=\"suggest_sign_up\">Sign up</div>
            <div id=\"suggest_middle\">or</div>
            <div id=\"suggest_facebook\">Log in with facebook</div>
          </div>
        </div>
        <div id=\"facebook_container_body\" class=\"auth_tab\">
          <div class=\"signup_fields\">
            <div class=\"facebook_login_button\">
              <div class=\"left\"><img src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/facebook-logo.svg"), "html", null, true);
        echo "\" width=\"30px\";/></div>
              <div class=\"seperator\"></div>
              <div class=\"right\">Login With Facebook</div>
            </div>
          </div>
          <div class=\"seperator_bottom\"></div>
          <div id=\"facebook_disclaimer\">
            Don't worry, Qiiss will never post anything to your facebook wall, or notify any of your friends that you are using it. It's simply a much easier, quicker method of signing up. <br /><br />For more information, <a href=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_general_faq"), "html", null, true);
        echo "\">see our FAQ page.</a>
          </div>
        </div>
      </div>
      <div id=\"disclaimer\">By clicking Sign Up, you agree to our Terms and
        that you have read and understand our Data Use Policy,
        including our Cookie Use.
      </div>
    </div>
  </div>
</div>
<div id=\"stream_outer\">
  <div class=\"stream_inner first\">
  </div>
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
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/splash.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/globalFunctions.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/cssreset-context-min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    ";
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
        return array (  221 => 9,  217 => 8,  212 => 7,  209 => 6,  203 => 5,  181 => 98,  171 => 91,  153 => 76,  149 => 75,  144 => 73,  140 => 72,  136 => 71,  132 => 70,  119 => 60,  108 => 52,  104 => 51,  81 => 31,  75 => 28,  66 => 21,  64 => 20,  60 => 19,  54 => 16,  50 => 15,  46 => 14,  42 => 13,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,);
    }
}
