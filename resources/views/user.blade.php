<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('user') }}
        </h2>
    </x-slot> --}}

    {{-- <h1>user</h1> --}}

   <h1>SEUS PEDIDOS</h1>
  
   @if(empty($requests->itens))

   {{-- <?php dd($requests) ?> --}}

    @foreach ($requests as $item)

        <p>data do pedido: {{$item->created_at}}</p>

        <p>quantidade: {{$item->quantidade}}</p>

<p>valor total: {{$item->quantidade*$item->valor}}</p>

        <p>pagamento: {{$item->quantidade}}</p>
        
        <p>nome do produto:{{$item->nome}} </p>
    <hr>
        
    @endforeach
@endif

</x-app-layout>
