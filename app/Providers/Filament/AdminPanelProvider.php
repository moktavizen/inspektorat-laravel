<?php

namespace App\Providers\Filament;

use App\Filament\Resources\AgendaResource;
use App\Filament\Resources\ContactResource;
use App\Filament\Resources\ContactResource\Pages\ViewContact;
use App\Filament\Resources\DocumentResource;
use App\Filament\Resources\DropdownItemResource;
use App\Filament\Resources\DropdownResource;
use App\Filament\Resources\EmployeeResource;
use App\Filament\Resources\LinkResource;
use App\Filament\Resources\MenuResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\ProfileResource;
use App\Filament\Resources\ServiceResource;
use App\Models\Contact;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile()
            ->colors([
                'primary' => Color::Teal,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->darkMode(false)
            ->favicon(asset('images/favicon.ico'))
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make('Navbar')
                        ->collapsible(false)
                        ->items([
                            ...MenuResource::getNavigationItems(),
                            ...DropdownResource::getNavigationItems(),
                            ...DropdownItemResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make('Body')
                        ->collapsible(false)
                        ->items([
                            ...ServiceResource::getNavigationItems(),
                            ...DocumentResource::getNavigationItems(),
                            ...AgendaResource::getNavigationItems(),
                            ...PostResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make('Footer')
                        ->collapsible(false)
                        ->items([
                            NavigationItem::make('Contact')
                                ->icon('heroicon-o-envelope')
                                ->url('/admin/contacts/1/view')
                                ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.resources.contacts.*')),
                            ...LinkResource::getNavigationItems(),
                        ]),
                ]);
            });
    }
}
