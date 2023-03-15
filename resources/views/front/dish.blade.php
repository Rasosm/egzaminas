@extends('layouts.front')

@section('content')
@section('title', 'Hotel list')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="list-table">
                <div class="card one-hotel" style="margin-bottom: 5px">
                    <div class="card-header card-header-hotel col-12">

                        <h3 class="card-title card-title-hotel">{{$dish->title}}</h3>

                        <h3 class="card-title card-title-hotel"> {{$dish->dishRestorant->title}}
                        </h3>

                    </div>
                    @if($dish->photo)
                    <div class="smallimg">

                        @if($dish->photo)
                        <img class="img-hotel" src="{{asset($dish->photo)}}">
                        @endif
                    </div>

                    @endif

                    <div class="col-9">
                        <div class="mb-3">
                            <label class="form-label">Dish description</label>
                            <div>{{$dish->ingridients}}</div>

                        </div>
                    </div>
                    <div class="card-body">

                        <p style="font-weight: bold"> Price: {{$dish->price}} eur</p>

                    </div>
                    <div class="buy">

                        <form action="{{route('add-to-cart')}}" method="post">
                            <div class="d-flex buy-btn">

                                <input class="form-control input-buy" type="number" min="1" name="count" value="1">


                                <input type="hidden" name="product" value="{{$dish->id}}">
                                <button type="submit" class="btn btn-outline-primary">Add</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{route('start')}}"><button type="submit" class="btn btn-outline-primary">Back</button>


        </div>


    </div>

</div>








@endsection
