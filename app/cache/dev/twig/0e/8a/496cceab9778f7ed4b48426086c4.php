<?php

/* QiissGeneralBundle:Default:faq.html.twig */
class __TwigTemplate_0e8a496cceab9778f7ed4b48426086c4 extends Twig_Template
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
\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "\t\t\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/splash/faq.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
<div class=\"faq_main_border\">
\t<div class=\"faq_main\">
\t\t<div class=\"header\">
\t\t\t<a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_general_homepage"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/qiiss-graphics/blue/Logo.png"), "html", null, true);
        echo "\" /></a>
\t\t\t<div class=\"seperator\"></div>
\t\t\t<div class=\"inner\">Frequently Asked Questions</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tHow is Qiiss different from other dating sites?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tQiiss is a free, fun and simple way to meet new people.<br />
\t\t\t\tBy highlighting shared interests, passions and goals, Qiiss brings people together around the important things in life. It's not about money, appearance or material possessions.
\t\t\t\t<br /><br />
\t\t\t\tYour Qiiss Profile lets you display photos and status updates. You can link with your Facebook account for manual or automatic updates, or keep your Qiiss Profile entirely separate. It's up to you. 
\t\t\t\t<br /><br />
\t\t\t\tBest of all, Qiiss is interactive. You can check out other Qiiss Profiles, admire or remark on them, and discover other people's personalities and interests. With Qiiss you can express yourself more fully than with static profiles on other dating sites. Members have more opportunity to discover the real you – and vice versa!
\t\t\t\t<br /><br />
\t\t\t\tDream Dates are also unique to Qiiss. By encouraging members to propose thoughtful and creative date ideas, Qiiss promotes amazing first impressions – and incredible first dates! 
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tWill my Facebook friends see that I’m on Qiiss?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tNo. Facebook photos can be manually or automatically linked with your Qiiss Profile, or you can keep Facebook entirely separate. You retain complete control over your information, and Facebook itself does not access, store or display any information from your Qiiss account or profile.
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tDoes it cost money?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tNo. Like the best things in life, Qiiss is free.
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tHow does Qiiss work?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tFirst, create your free Qiiss Profile. Fill in your details and passions. It's important to be honest - people will view your passions to see if you might be a good personality match. Next, discover people with similar interests to you using the simple search fields, or our automatic matching tool.
\t\t\t\t<br /><br />
\t\t\t\tOnce you’ve seen someone you wish to contact, suggest a creative Dream Date! This is your chance to showcase your thoughtfulness, so think of an idea that will appeal to your date specifically. It doesn’t have to be expensive or grand in scale. The idea is to enjoy an experience together based on shared interests.
\t\t\t\t<br /><br />
\t\t\t\tAfter your date, you can provide feedback on how the date went. This is shared with the Qiiss community to assist everyone in finding the most suitable partners.
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tDo I have to go on the date?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tNo, not if you don't want to. But you're likely to be bombarded with lots of interesting date ideas, so you can pick and choose! Most people love to share their interests and meet like-minded people in a fun, interesting way.
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tWhat's the charity button about?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tAs well as making the world a better place, you can really impress your prospective date by contributing to their favourite charity. They receive instant notification of your contribution. Is it compulsory? No. Does it benefit you? Yes. People are more inclined to date secret admirers who have contributed to their favourite cause!
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tDoes 100% of the donation go to the charity?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tQiiss is a free service and charity donations are not compulsory. However we do retain a small percentage of charity donations - 10% to be precise - purely to help cover our costs. Qiiss does not feature any advertising and this is the way Qiiss continues to provide such a great service in bringing people together.
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tWhat about privacy?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tYou have total control over your profile and everything on it. You can block photos and information fields, depending on how many details you wish to make public. All your private information is encrypted on secure servers and nobody else can access your account.
\t\t\t</div>
\t\t</div>
\t\t<div class=\"section\">
\t\t\t<div class=\"section_header\">
\t\t\t\tDo I have to use my real name?
\t\t\t</div>
\t\t\t<div class=\"section_body\">
\t\t\t\tYour Qiiss profile only displays your first name, to protect your privacy. During registration we do require your real name for security reasons, however this is kept in strict confidence and is not revealed to the Qiiss community or to third parties.
\t\t\t</div>
\t\t</div>
\t</div>
</div>
</body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "FAQ";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "\t\t\t\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/css/faq.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
\t\t";
    }

    public function getTemplateName()
    {
        return "QiissGeneralBundle:Default:faq.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 7,  149 => 6,  143 => 5,  45 => 16,  36 => 10,  31 => 9,  29 => 6,  25 => 5,  19 => 1,);
    }
}
