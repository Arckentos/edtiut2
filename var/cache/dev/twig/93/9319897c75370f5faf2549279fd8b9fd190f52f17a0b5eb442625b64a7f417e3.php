<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @EasyAdmin/default/includes/_actions.html.twig */
class __TwigTemplate_f009b33f333ab7c32cac49b2f9c9aad5ba4466f05e056df54a705a289b401133 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/default/includes/_actions.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actions"]) || array_key_exists("actions", $context) ? $context["actions"] : (function () { throw new RuntimeError('Variable "actions" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 2
            echo "    ";
            if (0 === twig_compare("list", twig_get_attribute($this->env, $this->source, $context["action"], "name", [], "any", false, false, false, 2))) {
                // line 3
                echo "        ";
                $context["action_href"] = ((((twig_get_attribute($this->env, $this->source, ($context["request_parameters"] ?? null), "referer", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["request_parameters"] ?? null), "referer", [], "any", false, false, false, 3), "")) : (""))) ? (urldecode(twig_get_attribute($this->env, $this->source, (isset($context["request_parameters"]) || array_key_exists("request_parameters", $context) ? $context["request_parameters"] : (function () { throw new RuntimeError('Variable "request_parameters" does not exist.', 3, $this->source); })()), "referer", [], "any", false, false, false, 3))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("easyadmin", twig_array_merge((isset($context["request_parameters"]) || array_key_exists("request_parameters", $context) ? $context["request_parameters"] : (function () { throw new RuntimeError('Variable "request_parameters" does not exist.', 3, $this->source); })()), ["action" => "list"]))));
                // line 4
                echo "    ";
            } elseif (0 === twig_compare("method", twig_get_attribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 4))) {
                // line 5
                echo "        ";
                $context["action_href"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("easyadmin", twig_array_merge((isset($context["request_parameters"]) || array_key_exists("request_parameters", $context) ? $context["request_parameters"] : (function () { throw new RuntimeError('Variable "request_parameters" does not exist.', 5, $this->source); })()), ["action" => twig_get_attribute($this->env, $this->source, $context["action"], "name", [], "any", false, false, false, 5), "id" => (isset($context["item_id"]) || array_key_exists("item_id", $context) ? $context["item_id"] : (function () { throw new RuntimeError('Variable "item_id" does not exist.', 5, $this->source); })())]));
                // line 6
                echo "    ";
            } elseif (0 === twig_compare("route", twig_get_attribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 6))) {
                // line 7
                echo "        ";
                $context["action_href"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, $context["action"], "name", [], "any", false, false, false, 7), twig_array_merge((isset($context["request_parameters"]) || array_key_exists("request_parameters", $context) ? $context["request_parameters"] : (function () { throw new RuntimeError('Variable "request_parameters" does not exist.', 7, $this->source); })()), ["action" => twig_get_attribute($this->env, $this->source, $context["action"], "name", [], "any", false, false, false, 7), "id" => (isset($context["item_id"]) || array_key_exists("item_id", $context) ? $context["item_id"] : (function () { throw new RuntimeError('Variable "item_id" does not exist.', 7, $this->source); })())]));
                // line 8
                echo "    ";
            }
            // line 9
            echo "
    ";
            // line 10
            echo twig_include($this->env, $context, twig_get_attribute($this->env, $this->source, $context["action"], "template", [], "any", false, false, false, 10), ["action" =>             // line 11
$context["action"], "action_href" =>             // line 12
(isset($context["action_href"]) || array_key_exists("action_href", $context) ? $context["action_href"] : (function () { throw new RuntimeError('Variable "action_href" does not exist.', 12, $this->source); })()), "is_dropdown" => ((            // line 13
(isset($context["is_dropdown"]) || array_key_exists("is_dropdown", $context))) ? (_twig_default_filter((isset($context["is_dropdown"]) || array_key_exists("is_dropdown", $context) ? $context["is_dropdown"] : (function () { throw new RuntimeError('Variable "is_dropdown" does not exist.', 13, $this->source); })()), false)) : (false)), "item" =>             // line 14
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 14, $this->source); })()), "item_id" =>             // line 15
(isset($context["item_id"]) || array_key_exists("item_id", $context) ? $context["item_id"] : (function () { throw new RuntimeError('Variable "item_id" does not exist.', 15, $this->source); })()), "request_parameters" =>             // line 16
(isset($context["request_parameters"]) || array_key_exists("request_parameters", $context) ? $context["request_parameters"] : (function () { throw new RuntimeError('Variable "request_parameters" does not exist.', 16, $this->source); })()), "translation_domain" =>             // line 17
(isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new RuntimeError('Variable "translation_domain" does not exist.', 17, $this->source); })()), "trans_parameters" =>             // line 18
(isset($context["trans_parameters"]) || array_key_exists("trans_parameters", $context) ? $context["trans_parameters"] : (function () { throw new RuntimeError('Variable "trans_parameters" does not exist.', 18, $this->source); })())], false);
            // line 19
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@EasyAdmin/default/includes/_actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 19,  76 => 18,  75 => 17,  74 => 16,  73 => 15,  72 => 14,  71 => 13,  70 => 12,  69 => 11,  68 => 10,  65 => 9,  62 => 8,  59 => 7,  56 => 6,  53 => 5,  50 => 4,  47 => 3,  44 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for action in actions %}
    {% if 'list' == action.name %}
        {% set action_href = request_parameters.referer|default('') ? request_parameters.referer|easyadmin_urldecode : path('easyadmin', request_parameters|merge({ action: 'list' })) %}
    {% elseif 'method' == action.type %}
        {% set action_href = path('easyadmin', request_parameters|merge({ action: action.name, id: item_id })) %}
    {% elseif 'route' == action.type %}
        {% set action_href = path(action.name, request_parameters|merge({ action: action.name, id: item_id })) %}
    {% endif %}

    {{ include(action.template, {
        action: action,
        action_href: action_href,
        is_dropdown: is_dropdown|default(false),
        item: item,
        item_id: item_id,
        request_parameters: request_parameters,
        translation_domain: translation_domain,
        trans_parameters: trans_parameters,
    }, with_context = false) }}
{% endfor %}
", "@EasyAdmin/default/includes/_actions.html.twig", "/home/clement/progWebAvancee/edtiut/vendor/easycorp/easyadmin-bundle/src/Resources/views/default/includes/_actions.html.twig");
    }
}
