<div class="max-w-7xl mx-auto grid grid-cols-3 gap-6 text-center mt-20 mb-20 px-8">
    <div class="flex flex-col justify-center items-center h-48 shadow rounded border border-blue-600 bg-blue-400 text-blue-600 font-bold hover:bg-blue-900 hover:text-blue-300 transition ease-in-out duration-300">
        <h4 class="font-bold mb-8">Assinantes</h4>

        <h3 class="text-4xl">{{$counters['customers']}}</h3>
    </div>

    <div class="flex flex-col justify-center items-center h-48 shadow rounded border border-indigo-600 bg-indigo-400 text-indigo-600 font-bold hover:bg-indigo-900 hover:text-indigo-300 transition ease-in-out duration-300">
        <h4 class="font-bold mb-8">Conteúdos</h4>

        <h3 class="text-4xl">{{$counters['contents']}}</h3>
    </div>

    <div class="flex flex-col justify-center items-center h-48 shadow rounded border border-purple-600 bg-purple-400 text-purple-600 font-bold hover:bg-purple-900 hover:text-purple-300 transition ease-in-out duration-300">
        <h4 class="font-bold mb-8">Vídeos Processados</h4>

        <h3 class="text-4xl">{{$counters['videos']}}</h3>
    </div>
</div>
