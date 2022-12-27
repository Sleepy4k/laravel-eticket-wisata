<?php

namespace App\Services;

use App\Contracts\Models;

class Service
{
    /**
     * @var userInterface
     */
    protected $userInterface;

    /**
     * @var roleInterface
     */
    protected $roleInterface;

    /**
     * @var menuInterface
     */
    protected $menuInterface;

    /**
     * @var pageInterface
     */
    protected $pageInterface;

    /**
     * @var tourInterface
     */
    protected $tourInterface;

    /**
     * @var auditInterface
     */
    protected $auditInterface;

    /**
     * @var packageInterface
     */
    protected $packageInterface;

    /**
     * @var facilityInterface
     */
    protected $facilityInterface;

    /**
     * @var languageInterface
     */
    protected $languageInterface;

    /**
     * @var permissionInterface
     */
    protected $permissionInterface;

    /**
     * @var applicationInterface
     */
    protected $applicationInterface;

    /**
     * @var transactionInterface
     */
    protected $transactionInterface;

    /**
     * Model contract constructor.
     * 
     * @param  \App\Contracts\Models\UserInterface  $userInterface
     * @param  \App\Contracts\Models\RoleInterface  $roleInterface
     * @param  \App\Contracts\Models\MenuInterface  $menuInterface
     * @param  \App\Contracts\Models\PageInterface  $pageInterface
     * @param  \App\Contracts\Models\TourInterface  $tourInterface
     * @param  \App\Contracts\Models\AuditInterface  $auditInterface
     * @param  \App\Contracts\Models\PackageInterface  $packageInterface
     * @param  \App\Contracts\Models\FacilityInterface  $facilityInterface
     * @param  \App\Contracts\Models\LanguageInterface  $languageInterface
     * @param  \App\Contracts\Models\PermissionInterface  $permissionInterface
     * @param  \App\Contracts\Models\ApplicationInterface  $applicationInterface
     * @param  \App\Contracts\Models\TransactionInterface  $transactionInterface
     */
    public function __construct(
        Models\UserInterface $userInterface,
        Models\RoleInterface $roleInterface,
        Models\MenuInterface $menuInterface,
        Models\PageInterface $pageInterface,
        Models\TourInterface $tourInterface,
        Models\AuditInterface $auditInterface,
        Models\PackageInterface $packageInterface,
        Models\FacilityInterface $facilityInterface,
        Models\LanguageInterface $languageInterface,
        Models\PermissionInterface $permissionInterface,
        Models\ApplicationInterface $applicationInterface,
        Models\TransactionInterface $transactionInterface
    )
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
        $this->menuInterface = $menuInterface;
        $this->pageInterface = $pageInterface;
        $this->tourInterface = $tourInterface;
        $this->auditInterface = $auditInterface;
        $this->packageInterface = $packageInterface;
        $this->facilityInterface = $facilityInterface;
        $this->languageInterface = $languageInterface;
        $this->permissionInterface = $permissionInterface;
        $this->applicationInterface = $applicationInterface;
        $this->transactionInterface = $transactionInterface;
    }
}
