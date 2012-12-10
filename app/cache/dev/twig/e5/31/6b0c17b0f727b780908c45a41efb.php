<?php

/* FOSFacebookBundle::initialize.html.twig */
class __TwigTemplate_e5316b0c17b0f727b780908c45a41efb extends Twig_Template
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
        echo "<div id=\"fb-root\"></div>
";
        // line 2
        if ((!(isset($context["async"]) ? $context["async"] : $this->getContext($context, "async")))) {
            // line 3
            echo "<script type=\"text/javascript\" src=\"http://connect.facebook.net/";
            echo twig_escape_filter($this->env, (isset($context["culture"]) ? $context["culture"] : $this->getContext($context, "culture")), "html", null, true);
            echo "/all.js\"></script>
";
        }
        // line 5
        echo "<script type=\"text/javascript\">
";
        // line 7
        if ((isset($context["async"]) ? $context["async"] : $this->getContext($context, "async"))) {
            // line 8
            echo "window.fbAsyncInit = function() {
";
        }
        // line 10
        echo "  FB.init(";
        echo twig_jsonencode_filter(array("appId" => (isset($context["appId"]) ? $context["appId"] : $this->getContext($context, "appId")), "xfbml" => (isset($context["xfbml"]) ? $context["xfbml"] : $this->getContext($context, "xfbml")), "oauth" => (isset($context["oauth"]) ? $context["oauth"] : $this->getContext($context, "oauth")), "status" => (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")), "cookie" => (isset($context["cookie"]) ? $context["cookie"] : $this->getContext($context, "cookie")), "logging" => (isset($context["logging"]) ? $context["logging"] : $this->getContext($context, "logging"))));
        echo ");
";
        // line 11
        if ((isset($context["async"]) ? $context["async"] : $this->getContext($context, "async"))) {
            // line 12
            echo "  ";
            echo (isset($context["fbAsyncInit"]) ? $context["fbAsyncInit"] : $this->getContext($context, "fbAsyncInit"));
            echo "
};

(function() {
  var e = document.createElement('script');
  e.src = document.location.protocol + ";
            // line 17
            echo twig_jsonencode_filter(sprintf("//connect.facebook.net/%s/all.js", (isset($context["culture"]) ? $context["culture"] : $this->getContext($context, "culture"))));
            echo ";
  e.async = true;
  document.getElementById('fb-root').appendChild(e);
}());
";
        }
        // line 23
        echo "</script>
";
    }

    public function getTemplateName()
    {
        return "FOSFacebookBundle::initialize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 23,  55 => 17,  44 => 11,  39 => 10,  35 => 8,  30 => 5,  24 => 3,  22 => 2,  19 => 1,  221 => 9,  217 => 8,  212 => 7,  209 => 6,  203 => 5,  181 => 98,  171 => 91,  153 => 76,  149 => 75,  144 => 73,  140 => 72,  136 => 71,  132 => 70,  119 => 60,  108 => 52,  104 => 51,  81 => 31,  75 => 28,  66 => 21,  64 => 20,  60 => 19,  54 => 16,  50 => 15,  46 => 12,  42 => 13,  38 => 12,  33 => 7,  31 => 6,  27 => 5,  21 => 1,);
    }
}
