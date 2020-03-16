<?php

namespace Controller;

use src\Helper\Algorithm;

class CardNumber
{
    /**
     * @return array
     * @throws \Exception
     */
    public function execute(): array
    {
        $result = [];
        include $_SERVER['DOCUMENT_ROOT'] . '/src/Helper/Algorithm.php';
        $cardNumber = $_GET['cardnumber'] ?? NULL;
        if ($cardNumber) {
            $algorithm = new Algorithm();
            $result['status'] = $algorithm->luhnAlgorithm($cardNumber);
        }
        else {
            $result['status'] = false;
            $result['error'] = 2;
        }

        return $result;
    }
}
