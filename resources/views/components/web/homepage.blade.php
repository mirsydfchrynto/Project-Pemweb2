<x-layout>
    <div class="row">
        <h3>Categories</h3>
        @foreach($categories as $category)
        <div class="col-2">
            <div class="card">
                <img src="{{ $category['image'] }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $category['name'] }}</h5>
                    <p class="card-text">
                        {{ $category['description'] }}
                    </p>
                    <a href="/category/{{$category['slug'] }}" class="btn 
btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>

<div class="container mt-4">
    <x-card
        judul="Sejarah Febrian Barbershop"
        subtitle="2021-Now"
        content="Febrian Barbershop didirikan dengan visi memberikan layanan potong rambut terbaik bagi pria di Pemalang. 
                Berawal dari barbershop kecil, kini berkembang menjadi tempat yang dikenal dengan tren potongan modern dan layanan berkualitas. 
                Dengan tim profesional, Febrian Barbershop terus berinovasi dalam dunia hairstyling."
        link1="https://www.instagram.com/febrianbarbershop/"
        link2="https://www.tiktok.com/@febrianbarbershop?lang=id-ID"
        link3="https://maps.app.goo.gl/3LuCTxwbVS6Wy1ET8" />
</div>

<div class="mt-4">
    <x-alerts>
        <h4>haloo pelanggan setiaa febrian barbershop</h4>
    </x-alerts>
</div>