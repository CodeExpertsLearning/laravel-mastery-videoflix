<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Notificações</x-slot>
    @forelse(auth()->user()->unreadNotifications as $notification)

        <div class="w-full flex bg-white py-2 px-10 rounded mb-10 border border-gray-300">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </div>
            <div>
                <p>{{$notification->data['message']}}
                    <a href="#" class="underline text-blue-500"
                       wire:click.prevent="markAsReadNotification('{{$notification->id}}')">Marcar como Lido</a>
                </p>
                <p>
                    @if($notification->type == 'App\\Notifications\\WhenVideoProcessingHasFailedNotification')
                        Erro ocorrido: {{$notification->data['error']}}
                    @endif
                </p>
            </div>
        </div>
    @empty
        <div class="w-full py-5 px-10 border border-yellow-500 bg-yellow-100 text-yellow-600">
            Nenhuma notificação encontrada...
        </div>
    @endforelse
</div>
