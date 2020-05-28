<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function all();

    public function findById($customerId);

    public function findByUsername($customerId);

    public function update($customerId);

    public function deleteById($customerId);
}
