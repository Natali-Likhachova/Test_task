<?php

namespace Controller;

class NotFound
{
    /**
     * @return array
     */
    public function execute(): array
    {
        return [
            'status' => false,
            'error' => 1,
        ];
    }
}