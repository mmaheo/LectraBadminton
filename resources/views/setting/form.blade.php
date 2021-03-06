<div class="ibox float-e-margins">
    <div class="ibox-title">
    </div>
    <div class="ibox-content">

        {!! Form::open(['route' => ['setting.update', $setting->id], 'class' => 'form-horizontal']) !!}

        <p class="text-right"><i class="text-navy">* Champs obligatoires</i></p>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('cestas_sport_email', 'Email cestas sport :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::email('cestas_sport_email', $setting->exists ? $setting->cestas_sport_email : old('cestas_sport_email'), ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('web_site_email', 'Email du site :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::email('web_site_email', $setting->exists ? $setting->web_site_email : old('web_site_email'), ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('web_site_name', 'Expéditeur email site :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::text('web_site_name', $setting->exists ? $setting->web_site_name : old('web_site_name'), ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('cc_email', 'Email du CC :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::email('cc_email', $setting->exists ? $setting->cc_email : old('cc_email'), ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('can_buy_t_shirt', 'Achat de t-shirt :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('can_buy_t_shirt', '1', $setting->exists ? $setting->hasBuyTShirt(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('can_buy_t_shirt', '0', $setting->exists ? $setting->hasBuyTShirt(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('can_enroll', 'Inscription  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('can_enroll', '1', $setting->exists ? $setting->hasEnroll(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('can_enroll', '0', $setting->exists ? $setting->hasEnroll(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('can_enroll_tournament', 'Inscription tournoi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('can_enroll_tournament', '1', $setting->exists ? $setting->hasEnrollTournament(true) ? true : false : false, ['required']) !!}
                        Ouvert
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('can_enroll_tournament', '0', $setting->exists ? $setting->hasEnrollTournament(false) ? true : false : true, ['required']) !!}
                        Fermée
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('leisure_price', 'Prix loisir :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('leisure_price', $setting->exists ? $setting->leisure_price : old('leisure_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('leisure_external_price', 'Prix loisir externe :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('leisure_external_price', $setting->exists ? $setting->leisure_external_price : old('leisure_external_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('fun_price', 'Prix fun :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('fun_price', $setting->exists ? $setting->fun_price : old('fun_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('fun_external_price', 'Prix fun externe :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('fun_external_price', $setting->exists ? $setting->fun_external_price : old('fun_external_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('performance_price', 'Prix performance :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('performance_price', $setting->exists ? $setting->performance_price : old('performance_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('performance_external_price', 'Prix performance externe :') !!}<i
                        class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('performance_external_price', $setting->exists ? $setting->performance_external_price : old('performance_external_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('corpo_price', 'Prix corpo :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('corpo_price', $setting->exists ? $setting->corpo_price : old('corpo_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('corpo_external_price', 'Prix corpo externe :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('corpo_external_price', $setting->exists ? $setting->corpo_external_price : old('corpo_external_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('competition_price', 'Prix compétition :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('competition_price', $setting->exists ? $setting->competition_price : old('competition_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('competition_external_price', 'Prix compétition externe :') !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('competition_external_price', $setting->exists ? $setting->competition_external_price : old('competition_external_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('t_shirt_price', 'Prix t-shirt :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>
            <div class="col-md-9">
                {!! Form::number('t_shirt_price', $setting->exists ? $setting->t_shirt_price : old('t_shirt_price'), ['class' => 'form-control', 'required', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('championship_simple_woman', 'Championnat simple femme :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('championship_simple_woman', '1', $setting->exists ? $setting->hasChampionshipSimpleWoman(true) ?
                        true :
                        false :
                        false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('championship_simple_woman', '0', $setting->exists ? $setting->hasChampionshipSimpleWoman
                        (false)
                        ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('championship_double_woman', 'Championnat double femme :', ['class' => 'control-label'])
                 !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('championship_double_woman', '1', $setting->exists ? $setting->hasChampionshipDoubleWoman(true) ?
                        true :
                        false :
                        false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('championship_double_woman', '0', $setting->exists ?
                        $setting->hasChampionshipDoubleWoman
                        (false)
                        ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('volunteer_alert_flag', 'Envoi alerte mail pour le set  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('volunteer_alert_flag', '1', $setting->exists ? $setting->hasVolunteerAlertFlag(true) ? true : false : false, ['required']) !!}
                        Joueurs
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('volunteer_alert_flag', '0', $setting->exists ? $setting->hasVolunteerAlertFlag(false) ? true : false : true, ['required']) !!}
                        Administrateurs
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('monday', 'Salle ouverte le Lundi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('monday', '1', $setting->exists ? $setting->hasMonday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('monday', '0', $setting->exists ? $setting->hasMonday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('tuesday', 'Salle ouverte le Mardi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('tuesday', '1', $setting->exists ? $setting->hasTuesday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('tuesday', '0', $setting->exists ? $setting->hasTuesday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('wednesday', 'Salle ouverte le Mercredi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('wednesday', '1', $setting->exists ? $setting->hasWednesday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('wednesday', '0', $setting->exists ? $setting->hasWednesday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('thursday', 'Salle ouverte le Jeudi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('thursday', '1', $setting->exists ? $setting->hasThursday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('thursday', '0', $setting->exists ? $setting->hasThursday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('friday', 'Salle ouverte le Vendredi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('friday', '1', $setting->exists ? $setting->hasFriday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('friday', '0', $setting->exists ? $setting->hasFriday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('saturday', 'Salle ouverte le Samedi  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('saturday', '1', $setting->exists ? $setting->hasSaturday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('saturday', '0', $setting->exists ? $setting->hasSaturday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('sunday', 'Salle ouverte le Dimanche  :', ['class' => 'control-label']) !!}
                <i class="text-navy">*</i>
            </div>

            <div class="col-md-9">
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('sunday', '1', $setting->exists ? $setting->hasSunday(true) ? true : false : false, ['required']) !!}
                        Oui
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        {!! Form::radio('sunday', '0', $setting->exists ? $setting->hasSunday(false) ? true : false : true, ['required']) !!}
                        Non
                    </label>
                </div>
            </div>
        </div>


        <div class="form-group text-center">
            {!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>