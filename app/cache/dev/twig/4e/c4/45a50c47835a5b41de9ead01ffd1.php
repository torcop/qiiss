<?php

/* QiissUserBundle:Profile:canvas.html.twig */
class __TwigTemplate_4ec445a50c47835a5b41de9ead01ffd1 extends Twig_Template
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
        echo "<div id=\"canvas_container\">
  <div id=\"canvas_left\" class=\"canvas_segment canvas_small\">
    <div id=\"profile_picture\">
      <div id=\"profile_picture_overlay\"><div>View More Photos</div></div>
      <img src=\"#\">
    </div>
    <div id=\"review_header\">Date Reviews</div>
    <div class=\"review\">
      This person hasn't been on any dates yet. Maybe you can be the first!
    </div>
    <div class=\"review\">
      This person hasn't been on any dates yet. Maybe you can be the first!
    </div>
  </div>
  <div id=\"canvas_center\" class=\"canvas_segment canvas_large\">
    <div id=\"canvas_header\">
      <div id=\"header_top\">
        <div id=\"header_name_fav\">
          ";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        echo "
          <div id=\"header_fav\">+ Favourite</div>
        </div>
        <div id=\"header_age\">
          21
        </div>
        <div id=\"flag_inappropriate\">Flag Profile As Inappropriate</div>
      </div>
      <div id=\"header_info\">
        <div id=\"info_left\">
          <div id=\"location\">
            <div class=\"info_section_header\">Location <br /></div>
            <div class=\"info_section_bubble\">NSW, Australia</div>
          </div>
          <div id=\"preference\">
            <div class=\"info_section_header\">Preference</div>
            <div class=\"info_section_bubble\">Women</div>
          </div>
          <div id=\"charity\">
            <div class=\"info_section_header\">Charity</div>
            <div class=\"info_section_bubble\">Red Cross</div>
          </div>
          <div id=\"location\">
            <div class=\"info_section_header\">Interests</div>
            <div class=\"info_section_bubble\">Breaking Bad</div><div class=\"info_section_bubble\">Guitar</div><div class=\"info_section_bubble\">Cycling</div>
          </div>
        </div>
        <div id=\"info_right\">
          <div id=\"info_propose\">
            <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("qiiss_profile_propose_date", array("profileid" => (isset($context["profileid"]) ? $context["profileid"] : $this->getContext($context, "profileid")))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/qiissuser/images/Qiiss-Propose-Date.png"), "html", null, true);
        echo "\" /></a>
          </div>
        </div>
      </div>
      <div id=\"sample_photos\">
        <div class=\"sample_photo\">SAMPLE PHOTO 1</div>
        <div class=\"sample_photo\">SAMPLE PHOTO 2</div>
        <div class=\"sample_photo\">SAMPLE PHOTO 3</div>
        <div class=\"sample_photo\">SAMPLE PHOTO 4</div>
        <div class=\"sample_photo\">SAMPLE PHOTO 5</div>
      </div>
    </div>

    <div id=\"canvas_body\">
      <div id=\"canvas_body_header\">
        Canvas
      </div>
      <div class=\"canvas_center_seperator\"></div>
      <div id=\"canvas_story_create\">
        <textarea rows=\"3\" placeholder=\"Express Yourself!\"></textarea>
        <div id=\"canvas_create_lower\">
          <div id=\"canvas_create_buttons\">
            <div id=\"left_canvas_buttons\">
              <div class=\"canvas_lower_button\">Tag Interests</div>
              <div class=\"canvas_lower_button\">Attach Photo</div>
              <div class=\"canvas_lower_button\">Check In</div>
            </div>
            <div id=\"right_canvas_buttons\">
              <div class=\"canvas_lower_button\" id=\"post\">Post</div>
            </div>
          </div>
        </div>
      </div>
      <div class=\"canvas_center_seperator\"></div>
      <div id=\"canvas_story_container\">
        ";
        // line 83
        $this->env->loadTemplate("QiissUserBundle:Profile:canvas_post.html.twig")->display($context);
        // line 84
        echo "      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "QiissUserBundle:Profile:canvas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 84,  39 => 19,  178 => 64,  172 => 63,  168 => 61,  164 => 60,  158 => 59,  156 => 58,  152 => 57,  148 => 55,  142 => 54,  138 => 52,  134 => 51,  130 => 50,  124 => 49,  122 => 48,  117 => 45,  111 => 83,  107 => 42,  103 => 41,  99 => 40,  93 => 39,  82 => 34,  73 => 32,  67 => 29,  36 => 7,  30 => 4,  26 => 3,  22 => 2,  19 => 1,  95 => 9,  91 => 38,  86 => 35,  83 => 6,  77 => 33,  71 => 48,  69 => 22,  66 => 21,  64 => 20,  58 => 17,  54 => 16,  50 => 15,  46 => 11,  42 => 10,  38 => 12,  33 => 11,  31 => 6,  27 => 5,  21 => 1,  32 => 4,  29 => 3,);
    }
}
