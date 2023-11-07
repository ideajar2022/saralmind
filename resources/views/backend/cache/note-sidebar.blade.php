@if($subject->units->count() > 0)
    @foreach($subject->units as $unit )
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$unit->slug}}Accor" aria-expanded="false" aria-controls="{{$unit->slug}}Accor">
                {{ $unit->name }}
                <i data-feather="chevron-up"></i>
            </button>
        </h5>
        </div>
        <div id="{{$unit->slug}}Accor" class="collapse sidebar-inner_list" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="card-body">
                <ul>
                @foreach($unit->lessons as $key=>$lesson)
                    <li id="lesson-{{$lesson->slug}}" class=""><i data-feather="check-circle"></i><a href="{{ route('lesson',[$subject->program->slug,$subject->faculty->slug,$subject->grade->slug,$subject->slug,$lesson->slug])}}">{{ $lesson->name }}</a> <i class="collapse-inner" data-feather="chevron-up"></i>
                        <ul>
                        @foreach($lesson->notes as $note)
                            <li id="note-{{$note->slug}}" class=""><i data-feather="circle"></i><a href="{{ route('note',[$subject->program->slug,$subject->faculty->slug,$subject->grade->slug,$subject->slug,$lesson->slug,$note->slug])}}">{{ $note->title }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
  @endforeach
@else
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#lessonsAccor" aria-expanded="false" aria-controls="lessonsAccor">
                Lessons
            </button>
        </h5>
        </div>
        <div id="lessonsAccor" class="collapse sidebar-inner_list show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="card-body">
                <ul>
                @foreach($subject->lessons as $key=>$lesson)
                    <li id="lesson-{{$lesson->slug}}" class=""><i data-feather="check-circle"></i><a href="{{ route('lesson',[$subject->program->slug,$subject->faculty->slug,$subject->grade->slug,$subject->slug,$lesson->slug])}}">{{ $lesson->name }}</a> <i class="collapse-inner" data-feather="chevron-up"></i>
                        <ul>
                        @foreach($lesson->notes as $note)
                            <li id="note-{{$note->slug}}" class=""><i data-feather="circle"></i><a href="{{ route('note',[$subject->program->slug,$subject->faculty->slug,$subject->grade->slug,$subject->slug,$lesson->slug,$note->slug])}}">{{ $note->title }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif