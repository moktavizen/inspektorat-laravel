<?php

namespace App\View\Components;

use App\Models\Contact;
use App\Models\Dropdown;
use App\Models\Link;
use App\Models\Menu;
use App\Models\VisitorStatistic;
use Closure;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public Collection $menus;
    public Collection $dropdowns;
    public Collection $links;
    public VisitorStatistic $visitorStatistic;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::orderBy('sort', 'asc')
            ->get();

        $this->dropdowns = Dropdown::with(['dropdown_items' => function ($query) {
            $query->orderBy('sort', 'asc');
        }])
            ->orderBy('sort', 'asc')
            ->get();

        $this->links = Link::orderBy('updated_at', 'desc')
            ->get();

        $this->visitorStatistic = VisitorStatistic::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}
