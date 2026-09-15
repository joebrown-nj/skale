<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Config\SiteConfig;
use App\Core\Contracts\EmailTemplateRendererInterface;
use Smarty\Smarty;

final class EmailTemplateRenderer implements EmailTemplateRendererInterface
{
    public function __construct(
        private readonly Smarty $smarty,
        private readonly SiteConfig $siteConfig,
    ) {
        $root = dirname(__DIR__);
        $this->smarty->caching = Smarty::CACHING_OFF;
        $this->smarty->setTemplateDir($root . '/Views/templates/emails');
        $this->smarty->setCompileDir($_ENV['SMARTY_TEMPLATE_C_DIR'] ?? dirname($root) . '/var/templates_c');
        $this->smarty->setCacheDir($_ENV['SMARTY_CACHE'] ?? dirname($root) . '/var/cache');
    }

    public function render(string $content = '', string $email = ''): string
    {
        return $this->smarty->fetch('contact-response.tpl', array(
            'content' => $content,
            'recipient_email' => $email,
            'site' => array(
                'name' => $this->siteConfig->name,
                'url' => rtrim($this->siteConfig->url, '/') . '/',
                'email' => $this->siteConfig->email,
                'phone' => $this->siteConfig->phone,
            ),
            'services' => array(
                array('path' => 'solutions/growth-infrastructure', 'title' => 'Websites & Digital Experiences', 'description' => 'Website development, performance improvements, conversion optimization, SEO, and analytics.'),
                array('path' => 'solutions/automation-software', 'title' => 'Automation & Software', 'description' => 'Workflow automation, custom software, system integrations, and solutions that eliminate repetitive work.'),
                array('path' => 'solutions/demand-generation', 'title' => 'Marketing & Growth', 'description' => 'PPC, email marketing, digital marketing, conversion strategy, and reporting focused on measurable results.'),
                array('path' => 'solutions/strategy-and-optimization', 'title' => 'Technology Strategy', 'description' => 'Practical technology guidance designed around your business, existing systems, and growth goals.'),
            ),
        ));
    }
}
