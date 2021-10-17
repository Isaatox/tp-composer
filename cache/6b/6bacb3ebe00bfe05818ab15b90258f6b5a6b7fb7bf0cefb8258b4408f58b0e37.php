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

/* read.html.twig */
class __TwigTemplate_6050019aedc10bef363969ac0bc95498a539d05b0db8c8fe89a2d25ef09908a7 extends Template
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
<html lang=\"en\">
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
<main class=\"container\">
    <div class=\"row\">
        <section class=\"col-12\">
        <h1>Détails de l'utilisateur ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 14), "html", null, true);
        echo "</h1>
        <p>ID : <span class=\"badge bg-secondary\"> ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 15), "html", null, true);
        echo "</span></p>
        <p>Email :  <span class=\"badge bg-secondary\">";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 16), "html", null, true);
        echo "</span></p>
        <p>Role :  <span class=\"badge bg-secondary\">";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 17), "html", null, true);
        echo "</span></p>

        <p>
        <a class=\"btn btn-primary\" href='edit.php?id=";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 20), "html", null, true);
        echo "'>Modifier</a><br><br>
        <a class=\"btn btn-secondary\" href='index.php'>Retour à la liste</a><br>
        </p>
        </section>
    </div>
</main>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "read.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 20,  67 => 17,  63 => 16,  59 => 15,  55 => 14,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "read.html.twig", "C:\\Users\\hugoj\\Documents\\tp-composer\\templates\\read.html.twig");
    }
}
