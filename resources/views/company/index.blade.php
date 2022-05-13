@extends('layouts.app')

@section('content')
    <style>
        .filters__row {
            background: rgb(181 242 247 / 51%);
            height: 75px;
            width: 100%;
        }

        .m-a {
            margin: auto;
        }

        #companyLists {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 5px;
        }
    </style>

    <div class="container" id="mainContainer">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Companies</li>
            </ol>
        </nav>
        <div class="row filters__row justify-content-between m-a">
            <div class="filters__div col-6 row">
                <div class="col-6">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-6">
                    <label for="city" class="control-label">City</label>
                    <input type="text" name="city" class="form-control">

                </div>
            </div>


            <div class="filters__toolbar col-2">
                <br>
                <button class="btn btn-pill btn-sm btn-info btn-pill" id="addCompany"><i class="fa fa-plus fs-16"></i> Company</button>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center m-a" id="companyLists">
            {{-- {{dd($companies)}} --}}
            @forelse ($companies as $key => $company)
                <div class="card">
                    <div class="card-header">
                        {{$company->name}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$company->address}}</h5>
                        <p class="card-text">
                            {{$company->address2}}, {{$company->city}}, {{$company->state}} {{$company->zip}}
                            <br>
                            {{$company->phone_no}}
                        </p>
                        <a data-url="/company/view/{{$company->id}}" class="btn btn-primary btn-rounded btn-pill btn-success btn-sm btn-hover-success btn-elevated js-show--company" data-id="{{$company->id}}"><i class="fa fa-eye"></i> View</a>
                    </div>
                </div>
            @empty
                <span id="noCompanies">No Companies added.</span>
            @endforelse

        </div>
    </div>

@endsection
