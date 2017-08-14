@if(!empty($sidebar))

    @foreach($sidebar as $title => $sidebarPanel)

        <div class="panel {{$sidebarPanel['class']}}">
            <div class="panel-heading">{{$title}}</div>
            <div class="panel-body">
                <table class="table-condensed">
                    @foreach($sidebarPanel['data'] as $school)
                        <tr>
                            <td>
                                <a href="{{url('/skoly')}}/{{$school->getUrl()}}">
                                    {{$school->zkraceny_nazev}}
                                </a>

                            </td>
                            <td>{{$school->rating}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @endforeach
    @endif