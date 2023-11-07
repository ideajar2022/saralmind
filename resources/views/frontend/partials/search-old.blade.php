<section class="global-search_wrapper" id="global-search-show">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('search') }}">
                    <div class="global-search-inner">
                        <div class="form-group course-keyword">
                            <input name="q" type="text" class="form-control"
                                placeholder="Search for notes, Q&As, Videos, etc." required="">
                        </div>
                        <!-- <div class="form-group course-category">
                            <select name="category" id="category" class="select2 form-control">
                                <option value="all_category">All Category</option>
                                <option value="school_level">School Level</option>
                                <option value="bachelors_level">Bachelors Level</option>
                                <option value="videos">Videos</option>
                                <option value="practice_test">Practice Test</option>
                            </select>
                        </div> -->
                        <div class="global-search-btn">
                            <input type="submit" value="Search" class="btn btn-global-search">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>