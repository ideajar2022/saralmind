<li class="has-submenu">
    <a href="javascript:void(0)">Classes</a>
    <ul class="submenu megamenu">
        <li>
            <div class="tab_megamenu-wrapper">
                <div class="nav flex-column nav-pills tab_design-menu_list" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach($categories as $key1=>$category)
                    <a class="nav-link {{(($key1==4) ? 'active':'')}}" id="v-pills-{{ $category->slug }}-tab" data-toggle="pill" href="#v-pills-{{ $category->slug }}" role="tab" aria-controls="v-pills-{{ $category->slug }}" aria-selected="true">{{ $category->name }}</a>
                  
                @endforeach
                </div>
                <div class="tab-content tab_design-menu_content" id="v-pills-tabContent">
                @foreach($categories as $key2=>$category)
                    <div class="tab-pane fade {{ (($key2==4) ? 'show active':'')}}" id="v-pills-{{ $category->slug }}" role="tabpanel" aria-labelledby="v-pills-{{ $category->slug }}-tab">
                        <div class="menu_subjects-list">
                            <h4>Subjects</h4>
                            <ul>
                            @foreach($category->subjects as $subject)
                                <li><a href="{{ route('syllabus',[$category->program->slug,$category->faculty->slug,$category->slug,$subject->slug]) }}" class="menu_subject-item">{{ $subject->name }}</a></li>
                            @endforeach
                            </ul>
                            <a href="{{ route('class',[$category->program->slug,$category->faculty->slug,$category->slug]) }}" class="menu-view_all-links">View All Subjects <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </li>
    </ul>
</li>