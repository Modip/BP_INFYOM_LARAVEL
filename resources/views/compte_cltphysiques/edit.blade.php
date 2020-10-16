@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compte Cltphysique
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($compteCltphysique, ['route' => ['compteCltphysiques.update', $compteCltphysique->id], 'method' => 'patch']) !!}

                        @include('compte_cltphysiques.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection