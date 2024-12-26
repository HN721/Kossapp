<?php

namespace App\Interfaces;

interface TransactionRepositoryInterfaces
{
    public function getTransactionDataFromSession();
    public function saveTransactionDataToSession($data);
}
