@extends('shopend/main')

@section('content')


        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Produktų sąrašas</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 ">
                <div class="col-lg-10 justify-content-center">
                    <table class="table table-bordered">
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Aprašymas</th>
                            <th>Kaina</th>
                            <th>Kiekis</th>
                            <th>Kategorija</th>
                            <th>Atnaujinta</th>
                            <th style="text-align: center;" colspan="2">Veiksmai</th>
                        </tr>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                @foreach($categories as $category)
                                    @if($item->cat_id == $category->id)
                                        <td>{{$category->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$item->updated_at}}</td>
                                <td><a href="/delete/item/{{$item->id}}">Šalinti</a></td>
                                <td><a href="/update/item/{{$item->id}}">Koreguoti</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
