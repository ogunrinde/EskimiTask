<?php

    namespace App\Repository;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Collection;

    interface BaseRepositoryInterface
    {
        /**
         * Get Collections
         * @param array $columns
         * @param array $relations
         * @return Collection
         */

         public function all(array $columns = ['*'], array $relations = []): Collection;

         /**
          * Create a Model
          * @param array $payload
          * @return Model
          */
        public function create(array $payload): ?Model;

        /**
         * Find a Model by Id
         *  @param int $modelId
         * @return Model
         * */
        public function find(int $modelId): ?Model;

         /**
         * Update a Model
         * @param int $modelId
         * @param array $payload
         * @return Model
         */

        public function update(int $modelId, array $payload): ?Model;

        /**
         * Delete a Model
         * @param int $modelId
         * @return bool
         */

        public function delete(int $modelId): bool;


        /**
         * Mass Insertion
         * @param int $payload
         * @return
         */

        public function massInsertion(array $payload): bool;
    }

?>
