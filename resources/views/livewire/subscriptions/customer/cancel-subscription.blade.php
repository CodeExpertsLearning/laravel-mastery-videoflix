<div class="mr-4" x-data="">
    <a href="#" @click="$event.preventDefault();
                        if(!confirm('Têm certeza que deseja cancelar sua Assinatura?')) { return false; }
                        else { $wire.cancelSubscription()  }"
       class="px-4 py-2 border-red-900 bg-red-400 hover:bg-red-800
       transition ease-in-out duration-300 text-white font-bold rounded">Cancelar</a>
</div>
