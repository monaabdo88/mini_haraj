@extends('admin.layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count">{{getCount('App\User')}}</span>
                        </h4>
                        <p class="text-light">Members</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count">{{getCount('App\Category')}}</span>
                        </h4>
                        <p class="text-light">Categories</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count">{{getCount('App\Post')}}</span>
                        </h4>
                        <p class="text-light">Posts</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count">{{getCount('App\Tag')}}</span>
                        </h4>
                        <p class="text-light">Tags</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>


            @endsection