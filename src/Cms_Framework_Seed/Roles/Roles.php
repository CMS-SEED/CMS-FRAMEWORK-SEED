<?php

namespace Cms_Framework_Seed\Roles;

use Cms_Framework_Seed\Roles\Interfaces\RoleRepositoryInterface;

class Roles
{
    /**
     * $role object.
     */
    protected $role;

    /**
     * Constructor.
     */
    public function __construct(
        RoleRepositoryInterface $role
    ) {
        $this->repository = $role;
    }

    /**
     * Returns the role by the slug.
     *
     * @param array $filter
     *
     * @return int
     */
    public function findBySlug($slug)
    {
        return $this->repository
            ->findRoleBySlug($slug);
    }
}
