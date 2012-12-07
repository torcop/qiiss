<?php

/* WebProfilerBundle:Profiler:base_js.html.twig */
class __TwigTemplate_ef7e0ddd48a73171d86e2ae9fee54bc6 extends Twig_Template
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
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},
            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },
            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },
            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },
            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            };

        return {
            hasClass: hasClass,
            removeClass: removeClass,
            addClass: addClass,
            request: request,
            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },
            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }

        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  84 => 19,  66 => 15,  57 => 14,  55 => 13,  51 => 12,  25 => 4,  105 => 24,  98 => 22,  96 => 21,  93 => 20,  89 => 19,  83 => 18,  72 => 14,  50 => 15,  27 => 4,  24 => 2,  225 => 96,  216 => 90,  196 => 80,  194 => 79,  191 => 78,  186 => 76,  180 => 72,  178 => 71,  159 => 61,  157 => 60,  147 => 55,  143 => 54,  138 => 51,  132 => 48,  130 => 47,  121 => 45,  118 => 44,  114 => 43,  104 => 36,  100 => 34,  78 => 28,  75 => 27,  71 => 26,  63 => 24,  58 => 9,  41 => 9,  34 => 11,  94 => 39,  88 => 6,  81 => 40,  79 => 17,  59 => 21,  39 => 6,  31 => 5,  43 => 7,  32 => 6,  234 => 126,  228 => 125,  224 => 123,  220 => 122,  212 => 88,  207 => 117,  201 => 83,  197 => 114,  193 => 113,  189 => 77,  183 => 111,  176 => 107,  170 => 106,  166 => 104,  162 => 103,  158 => 102,  152 => 101,  150 => 100,  145 => 97,  136 => 50,  129 => 91,  46 => 14,  42 => 12,  36 => 7,  30 => 5,  26 => 3,  22 => 2,  19 => 1,  227 => 12,  223 => 11,  219 => 10,  214 => 121,  211 => 8,  205 => 84,  187 => 100,  181 => 110,  172 => 67,  163 => 63,  154 => 59,  141 => 96,  137 => 68,  131 => 65,  127 => 46,  123 => 63,  107 => 50,  95 => 31,  76 => 16,  74 => 16,  68 => 12,  64 => 21,  60 => 23,  56 => 19,  52 => 18,  48 => 19,  44 => 10,  40 => 15,  35 => 4,  33 => 5,  29 => 3,  21 => 2,);
    }
}
