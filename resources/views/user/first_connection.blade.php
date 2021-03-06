@extends('auth.layout')

@section('title')
    Créer un compte
@stop

@section('contentTitle')
    <span class="help-block">merci de compléter les informations suivantes pour finaliser la création de votre compte.</span>
@stop

@section('contentBody')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="text-center">
                Créer un compte
            </h3>
        </div>
        <div class="panel-body">

            <p class="text-right"><i class="text-navy">* Champs obligatoires</i></p>

            {!! Form::open(['route' => ['user.post_first_connection', $user->id, $user->token_first_connection], 'class' => 'form-horizontal', 'files' => true]) !!}

            {!! Form::token() !!}

            <div class="form-group">

                <div class="col-md-3">
                    {!! Form::label('forname', 'Prénom :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::text('forname', $user->exists ? $user->forname : old('forname'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-3">
                    {!! Form::label('name', 'Nom :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::text('name', $user->exists ? $user->name : old('name'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::email('email', $user->exists ? $user->email : old('email'), ['class' => 'form-control', 'required', 'disabled']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('password', 'Mot de passe :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('password_confirmation', 'Confirmer :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>
                <div class="col-md-9">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('birthday', 'Date de naissance :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::text('birthday', old('birthday'), ['class' => 'form-control', 'data-mask' => '99/99/9999', 'required', 'placeholder' => 'dd/mm/yyyy']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('tshirt_size', 'Taille de t-shirt :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::select('tshirt_size', ['XXS' => 'XXS','XS' => 'XS','S' => 'S','M'=>'M','L' => 'L','XL' =>'XL','XXL' => 'XXL'],
                    old('tshirt_size'),['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('tension', 'Tension de cordage préférée :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::number('tension', old('tension'), ['class' => 'form-control', 'step' => '0.1', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('gender', 'Sexe :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    <div class="radio-inline">
                        <label>
                            {!! Form::radio('gender', 'man', false, ['required']) !!}
                            Homme
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            {!! Form::radio('gender', 'woman', false, ['required']) !!}
                            Femme
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('avatar', 'Photo :', ['class' => 'control-label']) !!}
                </div>

                <div class="col-md-9">
                    {!! Form::file('avatar', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('address', 'Adresse :', ['class' => 'control-label']) !!}
                </div>

                <div class="col-md-9">
                    {!! Form::textarea('address', old('address'), ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('phone', 'Téléphone :', ['class' => 'control-label']) !!}
                </div>

                <div class="col-md-9">
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('license', 'Licence :', ['class' => 'control-label']) !!}
                </div>

                <div class="col-md-9">
                    {!! Form::text('license', old('license'), ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('state', 'Etat :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::select('state', ['active' => 'Actif', 'holiday' => 'En vacances', 'hurt' => 'Blessé', 'inactive' => 'Inactif'],
                    old('state'),['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group" id="endingInjury">
                <div class="col-md-3">
                    {!! Form::label('ending_injury', 'Fin de blessure :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::text('ending_injury', old('ending_injury'), ['class' => 'form-control', 'data-mask' => '99/99/9999', 'placeholder' => 'dd/mm/yyyy']) !!}
                </div>
            </div>

            <div class="form-group" id="endingHolidays">
                <div class="col-md-3">
                    {!! Form::label('ending_holiday', 'Fin de vacances :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::text('ending_holiday', old('ending_holiday'), ['class' => 'form-control', 'data-mask' => '99/99/9999', 'placeholder' => 'dd/mm/yyyy']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('lectra_relationship', 'Relation avec lectra :', ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>

                <div class="col-md-9">
                    {!! Form::select('lectra_relationship', ['lectra' => 'Lectra', 'child' => 'Enfant', 'conjoint' =>
                    'Conjoint', 'external' => 'Externe', 'trainee' => 'Stagiaire', 'subcontractor' => 'Prestataire', 'partnership' => 'Mairie'],
                    old('lectra_relationship'),['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('newsletter', "Email pour les actualités", ['class' => 'control-label']) !!}
                    <i class="text-navy">*</i>
                </div>


                <div class="col-md-9">
                    <div class="radio-inline">
                        <label>
                            {!! Form::radio('newsletter', '1', true, ['required']) !!}
                            Oui
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Créer', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('javascript')
    <script>

        function updateSelect() {

            var state = $('select[name=state]').val();

            if (state == 'hurt') {
                $('#endingInjury').show();
                $('#endingHolidays').hide();
            }
            else if (state == 'holiday') {
                $('#endingHolidays').show();
                $('#endingInjury').hide();
            }
            else {
                $('#endingInjury').hide();
                $('#endingHolidays').hide();
            }
        }

        $(document).ready(function () {
            $('select[name=state]').on('change', updateSelect);
            updateSelect();
        });
    </script>
@stop