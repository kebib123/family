<?php

namespace App\Repositories\Contracts;

interface CategoryRepository
{
    public function getCategories();

    public function addRelation($categories);

    public function selectChild($id);

    public function getById( $id );

    public function delete( $id );

    public function update( $id, array $attributes );



}
