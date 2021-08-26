<?php

namespace App\LteAdmin\Controllers;

use App\LteAdmin\Generators\DashboardGenerator;
use Lar\LteAdmin\Segments\Container;

/**
 * Class DashboardController.
 *
 * @package Lar\LteAdmin\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @return Container
     */
    public function index()
    {
        return Container::create(function (DashboardGenerator $generator) {
            $generator->extend($this);

            $generator->stats();

            $generator->vote();

            if (admin()->isRootAdmin()) {
                $generator->switchers();
            }

            if (admin()->isRoot()) {
                $generator->aboutServer();
            }
        });
    }
}
