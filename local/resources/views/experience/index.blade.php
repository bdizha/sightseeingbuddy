@extends('layouts.app', ['isHome' => false, 'categories' => []])
@section('content')
<div class="jobGrid">
    <div class="jobRow jobRowTable jobGrey">
        <div class="jobRowColumn jobRowLeft">
            <div class="jobRowImage">
                <img src="/images/company/pp.jpg" />
            </div>
        </div>
        <div class="jobRowColumn jobRowRight">
            <a href="/job.html" class="jobTitle">
                SENIOR SOFTWARE DEVELOPER / TEAM LEADER 
            </a>
            <div class="jobMeta">
                <span class="jobCompany">
                    Friisberg & Partners International
                </span>
                <span class="jobLocation">
                    Cape Town, Western Cape
                </span>
            </div>
            <div class="jobDescription">
                MSSQL, MySQL and PHP are a must. Ability to lead a team, and engage effectively with other senior team leads....
            </div>
        </div>
    </div>
    <div class="jobRow jobRowTable jobGrey">
        <div class="jobRowColumn jobRowLeft">
            <div class="jobRowImage">
                <img src="/images/company/pp.jpg" />
            </div>
        </div>
        <div class="jobRowColumn jobRowRight">
            <a href="/job.html" class="jobTitle">
                Intermediate/Senior PHP Web Developer
            </a>
            <div class="jobMeta">
                <span class="jobCompany">
                    ThisIsMe
                </span>
                <span class="jobLocation">
                    Cape Town, Western Cape
                </span>
            </div>
            <div class="jobDescription">
                Minimum 5 years PHP Experience. Experience with the Phalcon PHP Framework. You will be a part of a creative team that is responsible for all aspects of the...
            </div>
        </div>
    </div>
    <div class="jobRow jobRowTable jobGrey">
        <div class="jobRowColumn jobRowLeft">
            <div class="jobRowImage">
                <img src="/images/company/pp.jpg" />
            </div>
        </div>
        <div class="jobRowColumn jobRowRight">
            <a href="/job.html" class="jobTitle">
                Senior Python Developer (Django) 
            </a>
            <div class="jobMeta">
                <span class="jobCompany">
                    GoldenRule
                </span>
                <span class="jobLocation">
                    Cape Town, Western Cape
                </span>
            </div>
            <div class="jobDescription">
                PHP. The Role You will be responsible for Designing, developing, implementing and supporting software solutions using variety of languages, tools, methodologies...
            </div>
        </div>
    </div>
    <div class="jobRow jobRowTable jobGrey">
        <div class="jobRowColumn jobRowLeft">
            <div class="jobRowImage">
                <img src="/images/company/pp.jpg" />
            </div>
        </div>
        <div class="jobRowColumn jobRowRight">
            <a href="/job.html" class="jobTitle">
                Senior Python Developer (Django) 
            </a>
            <div class="jobMeta">
                <span class="jobCompany">
                    GoldenRule
                </span>
                <span class="jobLocation">
                    Cape Town, Western Cape
                </span>
            </div>
            <div class="jobDescription">
                PHP. The Role You will be responsible for Designing, developing, implementing and supporting software solutions using variety of languages, tools, methodologies...
            </div>
        </div>
    </div>
    <div class="jobRow jobRowTable jobGrey">
        <div class="jobRowColumn jobRowLeft">
            <div class="jobRowImage">
                <img src="/images/company/pp.jpg" />
            </div>
        </div>
        <div class="jobRowColumn jobRowRight">
            <a href="/job.html" class="jobTitle">
                Senior Python Developer (Django) 
            </a>
            <div class="jobMeta">
                <span class="jobCompany">
                    GoldenRule
                </span>
                <span class="jobLocation">
                    Cape Town, Western Cape
                </span>
            </div>
            <div class="jobDescription">
                PHP. The Role You will be responsible for Designing, developing, implementing and supporting software solutions using variety of languages, tools, methodologies...
            </div>
        </div>
    </div>
    <div class="jobPaginate">
        <div class="jobPaginateLogo">
            <img src="/images/paginate.png" />
        </div>
        <div class="jobPaginateNumbers">
            <ul>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
            </ul>
        </div>
    </div>
</div>
@stop