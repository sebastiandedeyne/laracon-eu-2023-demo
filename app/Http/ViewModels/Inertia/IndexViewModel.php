<?php

namespace App\Http\ViewModels\Inertia;

use App\Http\ViewModels\ViewModel;
use App\Support\Links;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @template TModel
 */
class IndexViewModel extends ViewModel
{
    /** @var TModel[] */
    public array $items;

    public function __construct(
        public LengthAwarePaginator $paginator,
        public Links $links,
    ) {
        $this->items = $this->paginator->items();
    }
}
