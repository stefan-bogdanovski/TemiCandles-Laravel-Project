@extends('layouts.admin')

@section('adminContent')
    @component('fixed.admin.partial.table',
   [
            "data" => $data,

            "title" => $title,

            "edit" => $edit,

            "entity" => $entity,

            "attributes" => $attributes
    ])
    @endcomponent
@endsection
