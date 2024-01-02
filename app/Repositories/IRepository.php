<?php

namespace App\Repositories;

interface IRepository
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get all
     * @param $page
     * @return mixed
     */
    public function getPaginate($page);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Insert
     * @param array $attributes
     * @return mixed
     */
    public function insert(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
