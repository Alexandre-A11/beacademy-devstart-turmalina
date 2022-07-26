@extends("template.default")
@section("main")


<div class="pt-6 grid mx-64">


    
    <div class="flex justify-center">
        <div class="bg-white flex justify-center rounded-lg w-full p-4 my-8"><strong> {{ $product->name }} </strong></div>
    </div>

    <div class="flex justify-center">
        <div class="bg-white relative flex justify-center rounded-lg w-full">
            <div class="my-6 mx-auto">
                <h1 class="font-bold my-2 text-indigo-500">Dados:</h1>
                <h4 class="font-bold my-2">Nome: <img src="{{ asset('storage/'.$product->photo) }}" width="400px"> </h4>
                
            </div>
            <div class="border-2-2 absolute h-full border border-gray-700 border-opacity-20"></div>
            <div class="my-6 mx-auto">
                <h4 class="font-bold my-2">Nome: <span class="font-medium">{{ $product->name }}</span></h4>
                <h4 class="font-bold my-2">Nome: <span class="font-medium">{{ $product->name }}</span></h4>
                <h4 class="font-bold my-2">Quantidade: <span class="font-medium">{{ $product->quantity }}</span></h4>
                <h4 class="font-bold my-2">Descrição: <span class="font-medium">{{ $product->description }}</span></h4>
                <h4 class="font-bold my-2">Valor: <span class="font-medium">{{ formatMoney($product->price)  }}</span></h4>
                <h4 class="font-bold my-2">Cadastrado em: <span class="font-medium">{{ date("d/m/Y | H:i", strtotime($product->created_at)) }}</span></h4>
            </div>

        </div>
    </div>

    <div class="flex justify-center">
        <div class="bg-white relative flex justify-center rounded-lg w-full my-8">
            <div class="flex mx-auto my-2">

                <a href="{{ route('product.edit', $product->id) }}" class="btn-alert mr-1">
                    Editar
                </a>
                <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn-danger">
                        Deletar
                    </button>
                </form>

            </div>
            <div class="border-2-2 absolute h-full border border-gray-700 border-opacity-20"></div>
        </div>
    </div>
</div>
@endsection