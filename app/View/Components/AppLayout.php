<?php

namespace App\View\Components;

use App\Models\Contact;
use App\Models\Dropdown;
use App\Models\Link;
use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public Collection $links;
    public Collection $menus;
    public Collection $dropdowns;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = Link::orderBy('updated_at', 'desc')
            ->get();

        $this->menus = Menu::orderBy('sort', 'asc')
            ->get();

        $this->dropdowns = Dropdown::with([
            'dropdown_items' => fn ($query) => $query->orderBy('sort', 'asc')
        ])
            ->orderBy('sort', 'asc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}
