<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADM') }}
        </h2>
    </x-slot>

    <h1>ADM</h1>

    <div>
        <h1>criando produto</h1>
        <form action="/produtos" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">imagem</label>
            <input type="file" src="" alt="" name="imagem" id="imagem">
            <label for="">nome</label>
            <input type="text" id="nome" name="nome">
            <label for="">valor</label>
            <input type="text" id="valor" name="valor">
            <label for="">altura</label>
            <input type="text" id="altura" name="altura">
            <label for="">largura</label>
            <input type="text" id="largura" name="largura">
            <label for="">peso</label>
            <input type="text" id="peso" name="peso">

            <input type="submit" value="criar">
        </form>
    </div>
  
</x-app-layout>
