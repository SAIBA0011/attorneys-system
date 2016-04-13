<nav class="navbar navbar-default navbar-static-top" role="navigation"
     style="margin-bottom: 0;margin: 0px;margin-bottom: 0px;padding-bottom: 0px;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('home')}}">Copyright &copy; 2016 Eventsys.co.za</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li style="background-color: #FF9900;"><a class="no-hover" style=" color: white!important;" href="#">{{auth()->user()->name}}</a></li>
        <li style="background-color: #6F6F6F;"><a class="no-hover" style="color: white" href="{{route('home')}}">Visit Frontend</a></li>
        <li style="background-color: #FF9900;"><a class="no-hover" style=" color: white!important;" href="/logout">Sign out</a></li>
    </ul>

    <div class="navbar-default sidebar" role="navigation" style="background-color: #f8f8f8; text-transform: capitalize" >
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a class="no-hover" href="{{route('admin.dashboard')}}">
                        <img src="/assets/frontend/img/npo.png" width="100%" alt="Logo">
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.dashboard')}}"> Administrator  Overview</a>
                </li>

                <li>
                    <a href="#"> Event Information<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        @if(count($information) >= 1)
                            <li><a href="{{route('admin.event.edit')}}">Update existing content</a></li>
                        @else
                            <li><a href="{{ route('admin.event.info') }}">Add Event Information</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="#"> Members<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li> <a href="{{ route('admin.users.all') }}">View all members </a></li>
                    </ul>
                </li>

                <li>
                    <a href="/admin/pages/"> Site Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li>
                        <a href="#">Home Page <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{route('admin.pages.home.show')}}">Existing callout Blocks</a></li>
                                <li><a href="{{route('admin.pages.home.create')}}">Add New callout block</a></li>
                                <li><a class="disabled" href="{{ '/admin/pages/home/edit/' }}">Edit Content</a></li>
                            </ul>
                        </li>
                        <li>
                        <a href="#">About Us Page <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(count($about) >= 1)
                                <li><a href="{{route('admin.pages.about.edit')}}">Update existing content</a></li>
                                @else
                                <li><a href="{{route('admin.pages.about.create')}}">Add new content</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">manage days<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.days')}}">Existing days</a></li>
                        <li><a href="{{route('admin.day.create')}}">Add a new day to the event</a></li>
                        <li><a class="disabled" href="{{ '/admin/days/edit/' }}">Edit Day</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">manage speakers <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.speakers.index')}}">Existing speakers</a></li>
                        <li><a href="{{route('admin.speakers.create')}}">New speaker</a></li>
                        <li><a class="disabled" href="{{ '/admin/speakers/edit/' }}">Edit Speaker</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> manage schedule <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @foreach($days as $day)
                            <li><a href="{{route('admin.schedule', $day->slug)}}">{{$day->title}}</a></li>
                        @endforeach
                            <li><a href="{{route('admin.pdf')}}">Upload PDF</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> manage Sponsor Categories <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.categories.view')}}">Existing Categories</a></li>
                        <li><a href="{{route('admin.categories.create')}}">New Category</a></li>
                        <li><a class="disabled" href="{{ '/admin/categories/edit/' }}">Edit category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> manage Sponsors <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(count($sponsorPage) >= 1)
                            <li><a href="{{ route('admin.sponsors.edit_page_content') }}">sponsor page Edit</a></li>
                        @else
                            <li><a href="{{ route('admin.sponsors.get_page_content') }}">sponsor page content</a></li>
                        @endif
                        <li><a href="{{route('admin.sponsors.view')}}">Existing Sponsors</a></li>
                        <li><a href="{{route('admin.sponsors.create')}}">New Sponsors</a></li>
                        <li><a class="disabled" href="{{ '/admin/sponsors/edit/' }}">Edit Sponsor</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> manage Partners <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.partners.show')}}">Existing Partners</a></li>
                        <li><a href="{{route('admin.partners.create')}}">New Partner</a></li>
                        <li><a class="disabled" href="{{ '/admin/partners/edit/' }}">Edit Partner</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">manage Registration Plans <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.plans.view')}}">Existing Pricing Plans</a></li>
                        <li><a href="{{route('admin.plan.create')}}">New Pricing Plan</a></li>
                        <li><a href="{{route('admin.PlanOption.create')}}">Add Pricing Plan Options</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> manage Newsletter Subscribers <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.newsletter.subscribers')}}">View Subscribers</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> manage Sliders <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.sliders.show')}}">Existing Slides</a></li>
                        <li><a href="{{route('admin.sliders.create')}}">New Slide</a></li>
                        <li><a class="disabled" href="{{ '/admin/slider/edit/' }}">Edit Slide</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">Site Settings <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.settings')}}">Site Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>