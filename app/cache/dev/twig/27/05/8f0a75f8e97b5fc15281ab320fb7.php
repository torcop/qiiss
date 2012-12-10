<?php

/* ::splash.html.twig */
class __TwigTemplate_27058f0a75f8e97b5fc15281ab320fb7 extends Twig_Template
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
  <meta charset=\"utf-8\">
  <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/jquery-placeholder.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/js/splash/splash.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
<img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/Final-Homepage-background.gif"), "html", null, true);
        echo "\" class=\"background-image\" />
<div id=\"upper_top_banner\">
  <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_general_faq"), "html", null, true);
        echo "\"><div id=\"faq\">About Qiiss</div></a>
</div>
<div id=\"lower_top_banner\">
  <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissgeneral/images/qiiss-graphics/blue/Logo.png"), "html", null, true);
        echo "\" />
</div>
<div id=\"main_container\">
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
          <div id=\"signup_tab\" class=\"auth_tab_button selected\">Sign Up</div>
          <div id=\"login_tab\" class=\"auth_tab_button left shadow\">Log In</div>
          <div id=\"signup_facebook_tab\" class=\"auth_tab_button left\">Facebook</div>
        </div>
        <div id=\"signup_container_body\" class=\"auth_tab selected\">
          <div class=\"signup_fields\">
            <form name=\"signup_form\" class=\"signup_form\" action=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" method=\"POST\">
              <input type=\"text\" name=\"username\" placeholder=\"Name\" />
              <input type=\"text\" name=\"email\" placeholder=\"Email\" />
              <input type=\"password\" name=\"password\" placeholder=\"Password\" />
              <input type=\"password\" name=\"confirm-password\" placeholder=\"Confirm Password\" />
              <input type=\"text\" name=\"birthday_day\" class=\"birthday\" placeholder=\"Day\"/>
              <input type=\"text\" name=\"birthday_month\" class=\"birthday\" placeholder=\"Month\"/>
              <input type=\"text\" name=\"birthday_year\" class=\"birthday last\" placeholder=\"Year\"/>
              <input type=\"submit\" class=\"submit\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sign Up", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
              <div class=\"remember_me\"><div><input type=\"checkbox\" />Remember Me</div></div>
            </form>
          </div>
        </div>
        <div id=\"login_container_body\" class=\"auth_tab\">
          <div class=\"signup_fields\">
            <form name=\"login_form\" class=\"signup_form\" action=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"POST\">
              <input type=\"text\" name=\"email\" placeholder=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Username", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
              <input type=\"password\" name=\"email\" placeholder=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
              <input type=\"submit\" class=\"submit\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
              <div class=\"remember_me\"><div><input type=\"checkbox\" />";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remember Me", array(), "FOSUserBundle"), "html", null, true);
        echo "</div></div>
            </form>
          </div>
        </div>
        <div id=\"facebook_container_body\" class=\"auth_tab\">
          <div class=\"signup_fields\">
            <div class=\"facebook_login_button\">
              <div class=\"left\"><img src=\"https://chideo.com/assets/logo_facebook_f-3d17eb2041318519c6b8a608f4c84590.svg\" width=\"30px\";/></div>
              <div class=\"right\">Login With Facebook</div>
            </div>
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
    ";
    }

    public function getTemplateName()
    {
        return "::splash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 70,  1176 => 331,  1170 => 330,  1164 => 329,  1158 => 328,  1152 => 327,  1146 => 326,  1140 => 325,  1134 => 324,  1128 => 323,  1112 => 317,  1105 => 316,  1103 => 315,  1100 => 314,  1077 => 310,  1052 => 309,  1050 => 308,  1047 => 307,  1035 => 302,  1030 => 301,  1028 => 300,  1025 => 299,  1016 => 293,  1010 => 291,  1007 => 290,  1002 => 289,  1000 => 288,  997 => 287,  990 => 282,  983 => 280,  980 => 276,  976 => 275,  973 => 274,  970 => 273,  968 => 272,  965 => 271,  957 => 267,  955 => 266,  952 => 265,  945 => 260,  942 => 259,  934 => 254,  930 => 253,  926 => 252,  923 => 251,  921 => 250,  918 => 249,  910 => 245,  908 => 241,  906 => 240,  903 => 239,  882 => 233,  879 => 232,  876 => 231,  873 => 230,  870 => 229,  867 => 228,  864 => 227,  861 => 226,  858 => 225,  855 => 224,  853 => 223,  850 => 222,  842 => 216,  839 => 215,  837 => 214,  834 => 213,  826 => 209,  823 => 208,  821 => 207,  818 => 206,  810 => 202,  807 => 201,  805 => 200,  802 => 199,  794 => 195,  791 => 194,  789 => 193,  786 => 192,  778 => 188,  775 => 187,  773 => 186,  770 => 185,  762 => 181,  759 => 180,  757 => 179,  754 => 178,  746 => 174,  744 => 173,  741 => 172,  733 => 168,  730 => 167,  728 => 166,  725 => 165,  717 => 161,  714 => 160,  712 => 159,  710 => 158,  700 => 152,  692 => 151,  687 => 150,  681 => 148,  676 => 146,  673 => 145,  665 => 139,  662 => 137,  660 => 135,  655 => 134,  649 => 132,  646 => 131,  641 => 129,  632 => 123,  628 => 122,  624 => 121,  620 => 120,  615 => 119,  601 => 114,  585 => 110,  583 => 109,  580 => 108,  564 => 104,  562 => 103,  559 => 102,  542 => 98,  530 => 96,  521 => 92,  516 => 91,  495 => 89,  493 => 88,  490 => 87,  481 => 82,  478 => 81,  475 => 80,  469 => 78,  467 => 77,  462 => 76,  459 => 75,  450 => 72,  448 => 71,  440 => 70,  438 => 69,  435 => 68,  421 => 62,  416 => 61,  407 => 59,  405 => 58,  402 => 57,  393 => 52,  387 => 50,  384 => 49,  382 => 48,  369 => 43,  353 => 36,  350 => 35,  345 => 33,  334 => 27,  329 => 26,  290 => 14,  278 => 8,  272 => 6,  269 => 5,  256 => 329,  250 => 326,  248 => 325,  244 => 323,  241 => 322,  236 => 314,  233 => 313,  220 => 296,  218 => 287,  210 => 270,  200 => 259,  197 => 258,  195 => 249,  187 => 238,  179 => 221,  129 => 68,  388 => 160,  385 => 159,  379 => 47,  377 => 157,  370 => 156,  366 => 155,  362 => 153,  360 => 152,  357 => 151,  352 => 149,  344 => 147,  342 => 32,  339 => 145,  330 => 140,  327 => 139,  320 => 135,  314 => 21,  306 => 128,  301 => 125,  292 => 15,  289 => 119,  287 => 13,  280 => 114,  275 => 111,  273 => 110,  268 => 107,  264 => 3,  258 => 330,  254 => 328,  247 => 97,  231 => 307,  215 => 286,  202 => 262,  193 => 68,  183 => 63,  177 => 7,  169 => 206,  790 => 469,  787 => 468,  776 => 466,  772 => 465,  768 => 463,  755 => 462,  729 => 457,  726 => 456,  707 => 157,  690 => 453,  686 => 451,  682 => 450,  678 => 147,  674 => 448,  670 => 447,  666 => 446,  663 => 138,  661 => 136,  644 => 130,  633 => 442,  618 => 437,  613 => 435,  609 => 117,  606 => 116,  604 => 115,  590 => 431,  558 => 401,  540 => 398,  523 => 93,  520 => 396,  518 => 395,  513 => 90,  508 => 391,  173 => 85,  150 => 75,  112 => 39,  356 => 37,  347 => 34,  343 => 159,  335 => 157,  333 => 141,  325 => 138,  323 => 24,  316 => 22,  309 => 141,  302 => 137,  295 => 16,  288 => 129,  281 => 125,  274 => 121,  259 => 109,  252 => 327,  245 => 96,  211 => 81,  206 => 78,  192 => 248,  182 => 222,  160 => 59,  90 => 27,  204 => 94,  188 => 66,  185 => 68,  174 => 6,  276 => 248,  262 => 236,  260 => 331,  238 => 320,  87 => 26,  97 => 23,  65 => 17,  230 => 12,  226 => 299,  222 => 10,  214 => 82,  208 => 265,  190 => 239,  166 => 205,  110 => 38,  56 => 12,  49 => 15,  164 => 199,  158 => 56,  156 => 191,  148 => 46,  134 => 157,  124 => 129,  117 => 44,  99 => 68,  113 => 40,  175 => 91,  167 => 64,  161 => 198,  221 => 83,  217 => 83,  209 => 77,  203 => 77,  140 => 42,  23 => 3,  86 => 46,  77 => 31,  69 => 18,  82 => 26,  62 => 14,  40 => 8,  53 => 16,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 74,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 64,  426 => 143,  422 => 142,  412 => 60,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 42,  364 => 41,  361 => 110,  359 => 109,  354 => 150,  340 => 158,  336 => 103,  321 => 23,  313 => 99,  311 => 20,  308 => 129,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 115,  277 => 86,  267 => 4,  263 => 84,  257 => 234,  251 => 80,  246 => 324,  240 => 93,  234 => 89,  228 => 306,  223 => 298,  219 => 70,  213 => 271,  207 => 76,  198 => 74,  181 => 87,  176 => 219,  170 => 60,  168 => 5,  146 => 177,  142 => 54,  128 => 45,  125 => 67,  107 => 37,  38 => 10,  144 => 172,  141 => 171,  135 => 47,  126 => 144,  109 => 102,  103 => 25,  67 => 17,  61 => 2,  47 => 9,  94 => 57,  88 => 30,  59 => 19,  28 => 3,  91 => 56,  84 => 25,  44 => 8,  105 => 41,  93 => 28,  79 => 23,  76 => 31,  72 => 18,  68 => 30,  24 => 3,  31 => 6,  225 => 88,  216 => 90,  212 => 78,  205 => 264,  201 => 83,  196 => 69,  194 => 79,  191 => 70,  189 => 77,  186 => 76,  180 => 72,  172 => 64,  159 => 192,  154 => 185,  147 => 58,  132 => 47,  127 => 52,  121 => 66,  118 => 29,  114 => 108,  104 => 87,  100 => 51,  78 => 25,  75 => 23,  71 => 28,  58 => 14,  34 => 5,  26 => 3,  27 => 5,  25 => 29,  21 => 1,  19 => 1,  70 => 20,  63 => 16,  46 => 10,  22 => 2,  163 => 81,  155 => 58,  152 => 57,  149 => 178,  145 => 57,  139 => 165,  131 => 156,  123 => 35,  120 => 50,  115 => 40,  106 => 101,  101 => 86,  96 => 67,  83 => 24,  80 => 32,  74 => 21,  66 => 12,  55 => 13,  52 => 13,  50 => 12,  43 => 9,  41 => 7,  37 => 7,  35 => 5,  32 => 6,  29 => 3,  184 => 236,  178 => 86,  171 => 212,  165 => 54,  162 => 53,  157 => 79,  153 => 62,  151 => 184,  143 => 43,  138 => 55,  136 => 164,  133 => 69,  130 => 39,  122 => 51,  119 => 114,  116 => 113,  111 => 59,  108 => 33,  102 => 30,  98 => 29,  95 => 43,  92 => 31,  89 => 47,  85 => 29,  81 => 24,  73 => 20,  64 => 17,  60 => 16,  57 => 14,  54 => 13,  51 => 11,  48 => 14,  45 => 8,  42 => 11,  39 => 6,  36 => 5,  33 => 9,  30 => 3,);
    }
}
