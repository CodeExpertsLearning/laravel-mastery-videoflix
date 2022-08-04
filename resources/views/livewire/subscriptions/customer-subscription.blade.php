<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Minha Assinatura</x-slot>

    <div class="rounded bg-gray-800 p-2">
        <div class="mx-4 mt-4 mb-8 w-full text-white flex items-center justify-between">
            <div>
                Assinatura:
                <strong>
                    {!!auth()->user()->subscribed('default')
                      ? '<span class="text-xl font-bold text-green-800">ATIVA</span>'
                      : '<span class="text-xl font-bold text-red-800">INATIVA</span>' !!}
                </strong>
            </div>

            @livewire('subscriptions.customer.cancel-subscription')

        </div>

        <table class="min-w-full divide-y divide-gray-200">

            <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Data Cobrança</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Valor Cobrado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Ações</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td class="px-6 py-6 text-left text-xs font-medium text-white uppercase tracking-wider">
                        {{ $invoice->date()->toFormattedDateString() }}
                    </td>
                    <td class="px-6 py-6 text-left text-xs font-medium text-white uppercase tracking-wider">
                        {{ $invoice->total() }}
                    </td>
                    <td class="px-6 py-6 text-left text-xs font-medium text-white uppercase tracking-wider">
                        <a href="{{route('subscriptions.my-subscription.invoice', $invoice->id)}}"
                           class="border border-white rounded px-4 py-2 hover:bg-white hover:text-gray-800 transition
                                        ease-in-out duration-300" target="_blank">Download</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
