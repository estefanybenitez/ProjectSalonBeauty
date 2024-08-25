

@foreach ($category as $item)
    <div class="max-w-sm rounded overflow-hidden shadow-lg dark:bg-slate-800 bg-slate-950 text-white transform transition-transform hover:scale-105 ">

      @if (Auth::user())
        <a href="{{ route('client.service.search', ['id_category' => $item->id_category]) }}" class="block">  
      @else
        <a href="{{ route('service.search', ['id_category' => $item->id_category]) }}" class="block">  
      @endif
      
      <img class="w-full h-48 object-cover" src="{{ asset($item->img) }}" alt="{{ $item->name_category }}">
      <div class="p-6">
        <h2 class="text-xl font-bold mb-2 text-teal-500">
          {{ $item->name_category }}
        </h2>
        <p class="text-gray-400 dark:text-gray-300 text-base ">
        {{ $item->description }} 
        </p>
      </div>
       </a>
    </div> 
@endforeach