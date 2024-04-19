@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.claim.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.claims.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.claim.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $claim->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.claim.fields.points') }}
                                    </th>
                                    <td>
                                        {{ $claim->points }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.claim.fields.amount_used') }}
                                    </th>
                                    <td>
                                        {{ $claim->amount_used }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.claim.fields.reward') }}
                                    </th>
                                    <td>
                                        {{ $claim->reward->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.claim.fields.card') }}
                                    </th>
                                    <td>
                                        {{ $claim->card->code ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.claims.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection