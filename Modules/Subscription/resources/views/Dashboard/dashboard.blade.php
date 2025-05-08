@extends('dashboardClientLayouts.app')
@section('content')

<section class="dc-haslayout dc-dbsectionspace">
    <div class="row">
        <button class="dc-btnmenutoggle"></button>

        <div class="dc-haslayout dc-jobpostedholder">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="dc-insightsitem dc-dashboardbox">
                    <ul class="dc-countersoon" data-date="{{ now()->addDays(30)->format('Y-m-d\TH:i:s') }}">
                        <li>
                            <div class="dc-countdowncontent">
                                <p>d</p> <span class="days" data-days></span>
                            </div>
                        </li>
                        <li>
                            <div class="dc-countdowncontent">
                                <p>h</p> <span class="hours" data-hours></span>
                            </div>
                        </li>
                        <li>
                            <div class="dc-countdowncontent">
                                <p>m</p> <span class="minutes" data-minutes></span>
                            </div>
                        </li>
                        <li>
                            <div class="dc-countdowncontent">
                                <p>s</p> <span class="seconds" data-seconds></span>
                            </div>
                        </li>
                    </ul>
                    <figure class="dc-userlistingimg">
                        <img src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-21.png" alt="Pakckage expiry">
                    </figure>
                    <div class="dc-insightdetails">
                        <div class="dc-title">
                            <h3>Check Package Detail</h3>
                            <a href="{{ route('packages') }}">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->check() && auth()->user()->role != 'pharmacy')
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="dc-insightsitem dc-dashboardbox">
                    <figure class="dc-userlistingimg">
                        <img src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-22.png" alt="Check app">
                    </figure>
                    <div class="dc-insightdetails">
                        <div class="dc-title">
                            <h3>Check Appointments</h3>
                            <a href="{{ route('appointments') }}">
                                Click To Check </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="dc-insightsitem dc-dashboardbox">
                    <figure class="dc-userlistingimg">
                        <img src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/list.png" alt="Save Items">
                    </figure>
                    <div class="dc-insightdetails">
                        <div class="dc-title">
                            <h3>Set your profile</h3>
                            <a href="{{ route('profilesetting') }}">
                                Click To Set </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="dc-insightsitem dc-dashboardbox">
                    <figure class="dc-userlistingimg">
                        <img src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/support.png" alt="Specialties and Services">
                    </figure>
                    <div class="dc-insightdetails">
                        <div class="dc-title">
                            <h3>Specialties and Services</h3>
                            <a href="{{ route('specandserv') }}">Specialties and Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="dc-dashboardbox dc-dashboardtabsholder">
                <div class="dc-dashboardboxtitle"><h2>Appoitments' Details</h2></div>
                <div class="dc-recentapoint-holder dc-recentapoint-holdertest">
                    <div class="dc-recentapoint">
                        <div class="dc-apoint-date">
                            <span>day</span>
                            <em>month</em>
                        </div>
                        <div class="dc-recentapoint-content dc-apoint-noti dc-noti-colorone">
                            <figure><img src="" alt="patient"></figure>
                            <div class="dc-recent-content">
                                <span>attendee_name here <em>Status</em></span>
                                <a href="" class="dc-btn dc-btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
