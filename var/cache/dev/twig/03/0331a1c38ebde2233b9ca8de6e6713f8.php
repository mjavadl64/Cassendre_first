<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* partials/_footer.html.twig */
class __TwigTemplate_d6a6d0101bda87c5f52f85d527008d94 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_footer.html.twig"));

        // line 1
        yield "<footer>
    <nav class=\"footer-legal\">
        <a href=\"";
        // line 3
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mentions_legales");
        yield "\">Mentions légales</a> |
        <a href=\"";
        // line 4
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_accessibilite");
        yield "\">Accessibilité</a> |
        <a href=\"";
        // line 5
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cookies");
        yield "\">Cookies</a> |
        <a href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_politique_confidentialite");
        yield "\">Confidentialité</a> |
        <a href=\"";
        // line 7
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cgv");
        yield "\">CGV</a> |
        <a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cgu");
        yield "\">CGU</a>
    </nav>

    <div>© ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " - Cassandre System</div>
</footer>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_footer.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  78 => 11,  72 => 8,  68 => 7,  64 => 6,  60 => 5,  56 => 4,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer>
    <nav class=\"footer-legal\">
        <a href=\"{{ path('app_mentions_legales') }}\">Mentions légales</a> |
        <a href=\"{{ path('app_accessibilite') }}\">Accessibilité</a> |
        <a href=\"{{ path('app_cookies') }}\">Cookies</a> |
        <a href=\"{{ path('app_politique_confidentialite') }}\">Confidentialité</a> |
        <a href=\"{{ path('app_cgv') }}\">CGV</a> |
        <a href=\"{{ path('app_cgu') }}\">CGU</a>
    </nav>

    <div>© {{ \"now\"|date(\"Y\") }} - Cassandre System</div>
</footer>
", "partials/_footer.html.twig", "/home/javad/dev/Exercises/Cassandre-System/Cassandre-System/templates/partials/_footer.html.twig");
    }
}
