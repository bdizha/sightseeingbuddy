@extends('layouts.app', ['page' => 'home', 'isHome' => true])
@section('content')

<div class="jobWelcomeRow jobHomeHeading">
    <h5>Filter by Category</h5>
</div>

<div class="jobWelcomeRow">
    <ul class="chiclets">
        @foreach ($categories as $key => $category)
        <li class="{{ $category->slug }} simpleChiclet jobTable">
            <a class="chicletLink jobWhite" href="/category/{{ $category->slug }}">
                <div class="jobCategoryLeft"style="background-image: url('/images/categories/{{ $category->slug }}.png');">
                    &nbsp;
                </div>
                <div class="jobCategoryRight jobColumn">
                    <span class="chicletText">
                        {{ Helper::strLimit($category->name, 60, " ...") }}
                        <span class="jobCount">{{ $category->getPositionsCount() }}</span>
                    </span>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

<div class="jobWelcomeRow jobHomeHeading">
    <h5>Filter by Region</h5>
</div>

<div class="jobWelcomeRow">
    <ul class="chiclets">
        @foreach ($provinces as $key => $province)
        <li class="simpleChiclet">
            <a class="chicletLink jobWhite jobTable" href="/province/{{ $province->slug }}">
                <div class="jobCategoryLeft" style="background-image: url('/images/letters/{{ strtoupper($province->name[0]) }}.png');">
                    &nbsp;
                </div>
                <div class="jobCategoryRight jobColumn">
                    <span class="chicletText">
                        {{ Helper::strLimit($province->name, 60, " ...") }}
                        <span class="jobCount">{{ $province->getPositionsCount() }}</span>
                    </span>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@stop