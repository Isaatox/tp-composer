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

/* edit.html.twig */
class __TwigTemplate_242976b9661ed4e3fedd9e0a61af3e06ff02b9942046ee8e71da770e60fdb70d extends Template
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
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"css/bootstrap.css\">
    <title>";
        // line 8
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
</head>
<body>
    <h1 class='text-center'>";
        // line 11
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>       
                <form method=\"post\">
                    <div class=\"form-group\">
                        <label for=\"email\">Email</label>
                        <input type=\"text\" id=\"email\" name=\"email\" class=\"form-control\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 15), "html", null, true);
        echo "\" autofocus>
                        <label for=\"email\">Rôles</label>
                        <input type=\"text\" id=\"roles\" name=\"roles\" class=\"form-control\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 17), "html", null, true);
        echo "\">
                    </div>
                    <input type=\"hidden\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 19), "html", null, true);
        echo "\" name=\"id\">
                    <br/>
                    <button class=\"btn btn-primary\">Enregistrer</button>
                </form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 19,  64 => 17,  59 => 15,  52 => 11,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "edit.html.twig", "C:\\Users\\hugoj\\Documents\\tp-composer\\templates\\edit.html.twig");
    }
}
