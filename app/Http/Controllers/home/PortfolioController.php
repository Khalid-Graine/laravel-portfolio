<?php

namespace App\Http\Controllers\home;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
{
    public function protfolio()
    {



        $Portfolios = Cache::remember('Portfolios', 1440, function () {
            return   Portfolio::paginate(4);
        });

        return view('frontend.pages.portfolio', compact('Portfolios'));
    }


    public function details($id)
    {



        $Portfolio = Cache::remember('portfolio_' . $id, 30, function () use ($id) {
            return   Portfolio::findOrFail($id);
        });

        return view('frontend.pages.portfolio_details', compact('Portfolio'));
    }


    public function all()
    {
        $Portfolios = Portfolio::latest()->get();
        return view('backend.portfolio.portfolio_all', compact('Portfolios'));
    }
    public function index()
    {
        return view('backend.portfolio.portfolio');
    }

    public function store(Request $request)
    {
        $Portfolio = new Portfolio();
        $Portfolio->name = $request->name;
        $Portfolio->title = $request->title;
        $Portfolio->description = $request->description;


        if ($request->hasFile('image')) {
            $path = 'upload/porfolio';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $Portfolio->image = $path . '/' . $filename;
        }
        $Portfolio->save();
        $notification = array(
            'message' => 'you have created a new portfolio successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.all')->with($notification);
    }

    public function edit($id)
    {
        $Portfolio = Portfolio::findOrFail($id);
        return view('backend.portfolio.edit', compact('Portfolio'));
    }



    public function update(Request $request)
    {
        $Portfolio = Portfolio::findOrFail($request->id);
        $Portfolio->name = $request->name;
        $Portfolio->title = $request->title;
        $Portfolio->description = $request->description;


        if ($request->hasFile('image')) {
            $path = 'upload/portfolio';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $Portfolio->image = $path . '/' . $filename;
        }

        $Portfolio->save();

        $notification = array(
            'message' => 'you have updated  the portfolio successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('portfolio.all')->with($notification);
    }




    public function destroy($id)
    {
        $Portfolio = Portfolio::findOrFail($id);
        $Portfolio->delete();


        $notification = array(
            'message' => 'you have deleted a portfolio successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
