@extends('layout')

@section('title')
    Classement du tournoi
@stop

@section('content')

    @if(count($tournaments) > 0)

        <h1 class="text-center">Choisir un tournoi</h1>

        {!! Form::open(['route' => 'tournament.index', 'class' => 'form-horizontal']) !!}

        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                {!! Form::select('tournament_id', $tournaments, $tournament != null && $tournament->exists ? $tournament->id : old('tournament_id'), ['class' => 'form-control chosen-select', 'required']) !!}
            </div>
        </div>

        <div class="form-group text-center">
            {!! Form::submit('Voir', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
        <hr>
    @endif

    <h1 class="text-center">
        Tournoi du
        <span class="font-bold">{{ $tournament->start->format('l j F Y') }}</span>
        au
        <span class="font-bold">{{ $tournament->end->format('l j F Y') }}</span>
    </h1>
    <hr>
    {{--#6B256D--}}
    <div class="row" id="top">
        <div class="col-md-12 text-center">
            @foreach($series as $serie)
                <a href="#{{ $serie['info']->name }}"
                   class="btn {{ $serie['info']->category == 'S' || $serie['info']->category == 'SH' ? 'btn-warning' : '' }} {{ $serie['info']->category == 'SD' || $serie['info']->category == 'DD' ? 'text-white' : ''}} {{ $serie['info']->category == 'D' || $serie['info']->category == 'DH' ? 'btn-info'
         : '' }} {{ $serie['info']->category == 'M' ? 'btn-danger' : '' }}" style="{{ $serie['info']->category == 'SD' ? 'background: #FF4C83;' : ''}} {{$serie['info']->category == 'DD' ? 'background: #6B256D;' : ''}} }}">{{ $serie['info']->name }} <span
                            class="fa fa-bookmark"></span></a>
            @endforeach
        </div>
    </div>

    <br>

    @foreach($series as $serie)
        <div class="panel {{ $serie['info']->category == 'S' || $serie['info']->category == 'SH' ? 'panel-warning' : '' }} {{ $serie['info']->category == 'D' || $serie['info']->category == 'DH' ? 'panel-info'
         : '' }} {{ $serie['info']->category == 'M' ? 'panel-danger' : '' }}" id="{{ $serie['info']->name }}" style="{{ $serie['info']->category == 'SD' ? 'border-color: #FF4C83;' : '' }} {{ $serie['info']->category == 'DD' ? 'border-color: #6B256D;' : '' }}">
            <div class="panel-heading {{ $serie['info']->category == 'SD' || $serie['info']->category == 'DD' ? 'text-white' : '' }}" style="{{ $serie['info']->category == 'SD' ? 'background: #FF4C83;' : '' }} {{ $serie['info']->category == 'DD' ? 'background: #6B256D;' : '' }}">
                <h1 class="text-center">
                    {{ $serie['info']->name }}
                    <a href="#top" class="pull-right"><span class="fa fa-caret-square-o-up"></span></a>
                </h1>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                        @for($nbMatchRank1 = 1; $nbMatchRank1 <= $serie['info']->number_matches_rank_1 * 2 - 1; $nbMatchRank1++)
                            <tr style="border: none;">
                                @for($rank = 1; $rank <= $serie['info']->number_rank; $rank++)

                                    @if($serie[$rank][$nbMatchRank1] == "vide")
                                        <td style="border: none; padding: 0;"></td>
                                    @else

                                        <td style="border: none; padding: 0 0 0 20px;" id="#{{ $serie['info']->name . '-' . $serie[$rank][$nbMatchRank1]['matchNumber'] }}">
                                            @if($serie[$rank][$nbMatchRank1]['display'] || $auth->hasRole('admin'))
                                                <span style="font-weight: bold;">
                                                    N°{{ $serie[$rank][$nbMatchRank1]['matchNumber'] }}
                                                </span>

                                                @if($serie[$rank][$nbMatchRank1]['edit'])
                                                    <span>
                                                        <a href="{{ route('score.editTournament', [$serie[$rank][$nbMatchRank1]['scoreId'], str_replace(' ', '-', $serie[$rank][$nbMatchRank1]['firstTeamName']), str_replace(' ', '-', $serie[$rank][$nbMatchRank1]['secondTeamName']), $serie['info']->name . '-' . $serie[$rank][$nbMatchRank1]['matchNumber']]) }}">Editer</a>
                                                    </span>
                                                @endif

                                                @if($auth->hasRole('admin'))
                                                    <span>
                                                        <a href="{{ route('match.edit', [$serie[$rank][$nbMatchRank1]['id'], $serie['info']->name . '-' . $serie[$rank][$nbMatchRank1]['matchNumber']]) }}" class="text-danger">Administrer</a>
                                                    </span>
                                                @endif
                                            @endif

                                            @if($serie[$rank][$nbMatchRank1]['display'])
                                                <table class="table table-bordered {{ $serie[$rank][$nbMatchRank1]['owner'] ? 'text-white' : '' }}"
                                                       style="margin-bottom: -1px; {{ $serie[$rank][$nbMatchRank1]['score'] != null && $serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) ? 'background: #DFF0D8;' : '' }}
                                                               {{ $serie[$rank][$nbMatchRank1]['owner'] ? 'background: #21B9BB;' : '' }}">
                                                    <tr>
                                                        <td style="padding: 3px 5px 3px 5px;">
                                                            @if($serie[$rank][$nbMatchRank1]['firstTeamName'] == "" && $serie[$rank][$nbMatchRank1]['infoLooserFirstTeam'] != null)
                                                                {{ $serie[$rank][$nbMatchRank1]['infoLooserFirstTeam'] }}
                                                            @else
                                                                {{ $serie[$rank][$nbMatchRank1]['firstTeamName'] }}
                                                                @if($serie[$rank][$nbMatchRank1]['firstTeamName'])
                                                                    <a href="mailto:{{ $serie[$rank][$nbMatchRank1]['firstTeamEmail'] }} ?Subject=AS Lectra Badminton réservation" target="_top"><i class="fa fa-send"></i></a>
                                                                @endif
                                                                
                                                            @endif
                                                        </td>
                                                        <td style="padding: 3px 5px 3px 5px; width: 20px">
                                                            @if($serie[$rank][$nbMatchRank1]['score'] != null && ($serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) || $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true)))
                                                                {{ $serie[$rank][$nbMatchRank1]['score']->first_set_first_team }}
                                                            @elseif($serie[$rank][$nbMatchRank1]['firstTeamName'] != "")
                                                                Ø
                                                            @endif
                                                        </td>
                                                        <td style="padding: 3px 5px 3px 5px; width: 20px">
                                                            @if($serie[$rank][$nbMatchRank1]['score'] != null && ($serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) || $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true)))
                                                                {{ $serie[$rank][$nbMatchRank1]['score']->second_set_first_team }}
                                                            @elseif($serie[$rank][$nbMatchRank1]['firstTeamName'] != "")
                                                                Ø
                                                            @endif
                                                        </td>
                                                        <td style="padding: 3px 5px 3px 5px; width: 20px">
                                                            @if($serie[$rank][$nbMatchRank1]['score'] != null && ($serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) || $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true)))
                                                                {{ $serie[$rank][$nbMatchRank1]['score']->third_set_first_team }}
                                                            @elseif($serie[$rank][$nbMatchRank1]['firstTeamName'] != "")
                                                                Ø
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table class="table table-bordered {{ $serie[$rank][$nbMatchRank1]['owner'] ? 'text-white' : '' }}"
                                                       style="margin-bottom: 5px;  {{ $serie[$rank][$nbMatchRank1]['score'] != null && $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true) ? 'background: #DFF0D8;' : '' }}
                                                       {{ $serie[$rank][$nbMatchRank1]['owner'] ? 'background: #21B9BB;' : '' }}">
                                                    <tr>
                                                        <td style="padding: 3px 5px 3px 5px;">
                                                            @if($serie[$rank][$nbMatchRank1]['secondTeamName'] == "" && $serie[$rank][$nbMatchRank1]['infoLooserSecondTeam'] != null)
                                                                {{ $serie[$rank][$nbMatchRank1]['infoLooserSecondTeam'] }}
                                                            @else
                                                                {{ $serie[$rank][$nbMatchRank1]['secondTeamName'] }}
                                                                @if($serie[$rank][$nbMatchRank1]['secondTeamName'])
                                                                    <a href="mailto:{{ $serie[$rank][$nbMatchRank1]['secondTeamEmail'] }} ?Subject=AS Lectra Badminton réservation" target="_top"><i class="fa fa-send"></i></a>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td style="padding: 3px 5px 3px 5px; width: 20px">
                                                            @if($serie[$rank][$nbMatchRank1]['score'] != null && ($serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) || $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true)))
                                                                {{ $serie[$rank][$nbMatchRank1]['score']->first_set_second_team }}
                                                            @elseif($serie[$rank][$nbMatchRank1]['secondTeamName'] != "")
                                                                Ø
                                                            @endif
                                                        </td>
                                                        <td style="padding: 3px 5px 3px 5px; width: 20px">
                                                            @if($serie[$rank][$nbMatchRank1]['score'] != null && ($serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) || $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true)))
                                                                {{ $serie[$rank][$nbMatchRank1]['score']->second_set_second_team }}
                                                            @elseif($serie[$rank][$nbMatchRank1]['secondTeamName'] != "")
                                                                Ø
                                                            @endif
                                                        </td>
                                                        <td style="padding: 3px 5px 3px 5px; width: 20px">
                                                            @if($serie[$rank][$nbMatchRank1]['score'] != null && ($serie[$rank][$nbMatchRank1]['score']->hasFirstTeamWin(true) || $serie[$rank][$nbMatchRank1]['score']->hasSecondTeamWin(true)))
                                                                {{ $serie[$rank][$nbMatchRank1]['score']->third_set_second_team }}
                                                            @elseif($serie[$rank][$nbMatchRank1]['secondTeamName'] != "")
                                                                Ø
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            @endif()
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endforeach

@stop