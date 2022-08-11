<?php

declare(strict_types=1);

namespace App\Controllers\Web;

use Twig\Environment;

class HomeController
{
    private Environment $template;

    public function __construct(Environment $template)
    {
        $this->template = $template;
    }

    public function showDashboard()
    {
        echo $this->template->render('dashboard.php');
    }
}