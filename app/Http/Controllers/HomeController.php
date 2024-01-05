<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\DropdownItem;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Service;
use App\Models\VisitorStatistic;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        VisitorStatistic::first()->increment('weekly_visitors');
        VisitorStatistic::first()->increment('total_visitors');

        return view('home', [
            'posts' => Post::orderBy('updated_at', 'desc')
                ->take(3)
                ->get(),

            'agendas' => Agenda::orderBy('agenda_date', 'desc')
                ->take(3)
                ->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showMenu(Menu $menu): View
    {
        return view('menu.view', ['menu' => $menu]);
    }

    /**
     * Display the specified resource.
     */
    public function showDropdownItem(DropdownItem $dropdown_item): View
    {
        return view('dropdown.view', ['dropdown_item' => $dropdown_item]);
    }

    /**
     * Display the specified resource.
     */
    public function showService(Service $service): View
    {
        return view('service.view', ['service' => $service]);
    }

    /**
     * Display the specified resource.
     */
    public function showAgenda(Agenda $agenda): View
    {
        return view('agenda.view', ['agenda' => $agenda]);
    }

    /**
     * Display the specified resource.
     */
    public function showPost(Post $post): View
    {
        $post->timestamps = false;
        $post->increment('views');
        $post->timestamps = true;

        return view('post.view', ['post' => $post]);
    }
}
