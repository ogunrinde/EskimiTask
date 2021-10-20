<?php

    namespace App\Repository\Eloquent;

    use App\Repository\BaseRepositoryInterface;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;

    class BaseRepository implements BaseRepositoryInterface
    {
        /**
         * @var Model
         */
        protected $model;

        /**
         * BaseRepository Constructor
         * @param Model $model
         */

        public function __construct(Model $model)
        {
            $this->model = $model;
        }

         /**
          * @param array $columns
          * @param array $relations
          * @return Collection
          */
        public function all(array $columns = ['*'], array $relations = []): Collection
        {
            $models = $this->model->with($relations)->get($columns);
            return $models;
        }

         /**
          * @param array $payload
          * @return Model
          */
        public function create(array $payload): ?Model
        {
            $model = $this->model->create($payload);
            return $model;
        }

         /**
          * @param int $modelId
          * @return Model or null
          */
        public function find(int $modelId): ?Model
        {
            $model = $this->model->find($modelId);
            return $model;
        }

         /**
          * @param int $modelId
          * @param array $payload
          * @return Model
          */
        public function update(int $modelId, array $payload): ?Model
        {
            $model = $this->model->find($modelId)->update($payload);
            return $this->model->find($modelId);

        }

         /**
          * @param int $modelId
          * @return bool
          */

        public function delete(int $modelId): bool
        {
            return $this->model->find($modelId)->delete();

        }


        /**
         * Mass Insertion
         * @param int $payload
         * @return
         */

          public function massInsertion(array $payload ): bool
          {
              return $this->model->insert($payload);


          }
    }

?>
