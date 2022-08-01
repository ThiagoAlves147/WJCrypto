<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Database\CoreDatabase;
use App\Interface\TransactionInterface;
use App\Helper;
use Pecee\Http\Request;

class TransactionController
{
    private static TransactionInterface $transaction;
    private CoreDatabase $query;
    private Helper $helper;

    public function __construct(
        TransactionInterface $transaction, 
        CoreDatabase $query, 
        Helper $helper
    )
    {
        self::$transaction = $transaction;
        $this->query = $query;
        $this->helper = $helper;
    }

    public function depositValue(Request $request): void
    {
        $inputs = $this->helper->input_exist([
            'accNumber',
            'depositAmount'
        ]);

        if($inputs){
            self::$transaction->setAccountNumber($request->getInputHandler()->value("accNumber"));
            self::$transaction->setTransictionValue($request->getInputHandler()->value("depositAmount"));
    
            $this->query->depositValue(self::$transaction);
        }

    }

    public function transferValue(Request $request): void
    {
        $inputs = $this->helper->input_exist([
            'accNumber',
            'transictionValue'
        ]);


        if($inputs){
            self::$transaction->setAccountNumber($request->getInputHandler()->value("accNumber"));
            self::$transaction->setTransictionValue($request->getInputHandler()->value("transictionValue"));
    
            $this->query->transferValue(self::$transaction);
        }

    }

    public function withdrawnValue(Request $request): void
    {
        $inputs = $this->helper->input_exist([
            'accNumber',
            'amountWithdrawn'
        ]);

        if($inputs){
            self::$transaction->setAccountNumber($request->getInputHandler()->value("accNumber"));
            self::$transaction->setTransictionValue($request->getInputHandler()->value("amountWithdrawn"));
    
            $this->query->withdrawnValue(self::$transaction);
        }
    }
}