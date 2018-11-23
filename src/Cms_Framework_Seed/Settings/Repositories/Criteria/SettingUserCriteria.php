<?php

namespace Cms_Framework_Seed\Settings\Repositories\Criteria;

use Cms_Framework_Seed\Repository\Contracts\CriteriaInterface;
use Cms_Framework_Seed\Repository\Contracts\RepositoryInterface;

class SettingUserCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model
                        ->where('user_id', '=', user_id())
                        ->where('user_type', '=', user_type());

        return $model;
    }
}
