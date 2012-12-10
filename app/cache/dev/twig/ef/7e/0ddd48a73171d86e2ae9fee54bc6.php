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
        return array (  91 => 20,  84 => 19,  74 => 16,  57 => 14,  51 => 12,  36 => 7,  25 => 4,  105 => 24,  98 => 22,  96 => 21,  93 => 20,  89 => 19,  83 => 18,  76 => 16,  72 => 14,  68 => 12,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  163 => 63,  159 => 61,  157 => 60,  154 => 59,  147 => 55,  143 => 54,  138 => 51,  136 => 50,  132 => 48,  130 => 47,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  100 => 34,  95 => 31,  78 => 28,  71 => 26,  58 => 9,  41 => 9,  34 => 11,  94 => 39,  88 => 6,  79 => 17,  59 => 21,  48 => 19,  26 => 3,  43 => 7,  32 => 6,  29 => 3,  28 => 5,  63 => 24,  55 => 13,  44 => 10,  39 => 6,  35 => 4,  30 => 5,  24 => 2,  22 => 2,  19 => 1,  222 => 9,  218 => 8,  213 => 7,  210 => 6,  204 => 5,  196 => 80,  178 => 71,  168 => 91,  150 => 76,  146 => 75,  141 => 73,  137 => 72,  133 => 71,  129 => 70,  116 => 60,  104 => 36,  81 => 40,  75 => 27,  66 => 15,  64 => 20,  60 => 23,  54 => 16,  50 => 15,  46 => 14,  42 => 12,  38 => 12,  33 => 5,  31 => 5,  27 => 4,  21 => 2,);
    }
}
