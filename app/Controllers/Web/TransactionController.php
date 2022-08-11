<?php

declare(strict_types=1);

namespace App\Controllers\Web;

use Pecee\Http\Request;
use Twig\Environment;

class TransactionController
{
    private Environment $template;

    public function __construct(Environment $template)
    {
        $this->template = $template;
    }

    public function showDeposit()
    {
        echo $this->template->render('deposit.php');
    }
    public function depositAction()
    {

    }

    public function showTransaction()
    {
        echo $this->template->render('transfer.php');
    }
    public function transactionAction(Request $request)
    {
        echo $this->template->render('transfer.php');
    }

    public function showWithdraw()
    {
        echo $this->template->render('withdraw.php');
    }
}