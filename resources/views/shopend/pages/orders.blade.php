@extends('shopend/main')

@section('content')


    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Užsakymai</h1>
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
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>Adresas</th>
                            <th>Užsakymo statusas</th>
                            <th>Prekė</th>
                            <th>Kiekis</th>
                            <th>Suma</th>
                            <th>Užsakyta:</th>
                            <th>Atnaujinta:</th>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->buyerName}}</td>
                                <td>{{$order->buyerSurname}}</td>
                                <td>{{$order->buyerAddress}}</td>
                                <td>
                                    <form method="post" action="/updateStatus/order/{{$order->id}}" enctype="multipart/form-data" >
                                        @csrf
                                    <select class="form-control" name="orderStatus" >
                                        <option>{{$order->orderStatus}}</option>
                                        <option>Naujas</option>
                                        <option>Vykdomas</option>
                                        <option value="Įvykdytas">Įvykdytas</option>
                                    </select>
                                        <input type="submit" value="Koreguoti" name="submit" class="btn btn-primary py-2 px-4 text-white">
                                    </form></td>
                                @foreach($items as $item)
                                    @if($order->itemId == $item->id)
                                        <td>{{$item->title}}</td>
                                    @endif
                                @endforeach
                                <td>{{$order->productQuantity}}</td>
                                <td>{{$order->orderSum}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td><a href="/delete/order/{{$order->id}}">Šalinti</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
