<?php

namespace App\Http\Controllers;

use App\Experience;
use App\ExperienceCategory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get("keyword");
        $destination = $request->get("destination");
        $categoryIds = $request->get("category_ids", []);
        $dateFrom = $request->get("date_from");
        $dateTo = $request->get("date_to");
        $guests = $request->get("guests");

//        dd([$dateFrom, $dateTo]);

        $query = Experience::has("pricing");

        if (!empty($keyword)) {
            $query->where("teaser", "like", "%" . $keyword . "%");
        }

        if (!empty($destination)) {
            $query->whereHas('city', function ($q) use ($destination) {
                $q->where("name", "like", "%" . $destination . "%");
            });
        }

        if (!empty($categoryIds)) {
            $query->whereHas('category', function ($q) use ($categoryIds) {
                $q->whereIn("id", $categoryIds);
            });
        }

        if (!empty($dateFrom) && !empty($dateTo)) {
            $fromDate = Carbon::parse($dateFrom);
            $toDate = Carbon::parse($dateTo)->addDays(1);

            $query->whereHas('dates', function ($q) use ($fromDate, $toDate) {
                $q->where("experience_dates.date", ">=", $fromDate);
                $q->where("experience_dates.date", "<", $toDate);
            });
        }

        if (!empty($guests)) {
            $query->whereHas('pricing', function ($q) use ($guests) {
                $q->where("guests", "=", $guests);
            });
        }

        $query->orderBy("teaser", "ASC");
        $experiences = $query->get();

        foreach ($experiences as $key => $experience) {
            $experiences[$key]->cover_image = $this->getImage('/pages/imager?w=550&h=320&url=' . $experience->cover_image);
        }

        $categories = ExperienceCategory::where("level", "=", "main")->get();

        $user = Auth::user();
        if (Auth::guest()) {
            $user = new User();
            $user->first_name = "You";
            $user->last_name = "";
            $user->email = "you@example.com";
            $user->introduction = new \App\Introduction;
        }

        return view("search.index", [
            "experiences" => $experiences,
            "categories" => $categories,
            "user" => $user,
            "dateFrom" => $dateFrom,
            "dateTo" => $dateTo,
            "guests" => $guests,
            "categoryIds" => $categoryIds,
            "destination" => $destination
        ]);
    }

}
