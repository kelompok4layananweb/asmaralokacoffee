<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // View data shared across all controllers
    protected $viewData = [];

    public function __construct()
    {
        // Navigation data for the sidebar
        $this->viewData['sidebar'] = [
            'customers' => [
                'label' => 'Customers',
                'icon' => 'la la-users',
                'items' => [
                    ['label' => 'All Customers', 'route' => 'customers.index'],
                    ['label' => 'New Customer', 'route' => 'customers.create'],
                ],
            ],
            'orders' => [
                'label' => 'Orders',
                'icon' => 'la la-cart-arrow-down',
                'route' => 'orders.index', // No sub-items
            ],
            'payments' => [
                'label' => 'Payments',
                'icon' => 'la la-bank',
                'route' => 'payments.index', // No sub-items
            ],
        ];
    }

    // Method to share view data with all views
    protected function view($view = null, $data = [], $mergeData = [])
    {
        $data = array_merge($this->viewData, $data); // Merge default view data with custom data
        return parent::view($view, $data, $mergeData);
    }
}