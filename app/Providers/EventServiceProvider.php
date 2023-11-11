<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserCreatedEvent;
use App\Models\Pagamento;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        Event::listen(UserCreatedEvent::class, function (UserCreatedEvent $event) {
            $user = $event->user;
            $primeiroAno = $user->created_at->format('Y');
            $anoAtual = date('Y');

            $anos = [];
            for ($ano = $primeiroAno; $ano <= $anoAtual; $ano++) {
                $anos[] = $ano;
            }

            foreach ($anos as $ano) {
                $pagamento = new Pagamento();
                $pagamento->user_id = $user->id;
                $pagamento->ano = $ano;
                $pagamento->pago = false;
                $pagamento->save();
            }
        });
    }


    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
