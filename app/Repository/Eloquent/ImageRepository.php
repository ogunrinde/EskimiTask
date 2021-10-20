<?php

    namespace App\Repository\Eloquent;

    use App\Repository\ImageRepositoryInterface;
    use App\Models\CampaignImage;

    class ImageRepository extends BaseRepository implements ImageRepositoryInterface
    {
        /**
         * @var Model
         */
        protected $model;

        /**
         * ImageRepository constructor
         *
         * @param Model $model
         */
        public function __construct(CampaignImage $model)
        {
            $this->model = $model;
        }
    }
?>
