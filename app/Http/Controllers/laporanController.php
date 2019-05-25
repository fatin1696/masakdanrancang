<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;

class laporanController extends Controller
{
    public function index()
    {
        $category = new category;
        $chart = new SampleChart;

        $categoryID1 = DB::table('categories')->where('id', 'like', '%' .'1'.'%')->get();
        $categoryID2 = DB::table('categories')->where('id', 'like', '%' .'2'.'%')->get();
        $categoryID3 = DB::table('categories')->where('id', 'like', '%' .'3'.'%')->get();
        $categoryID4 = DB::table('categories')->where('id', 'like', '%' .'4'.'%')->get();
        $categoryID5 = DB::table('categories')->where('id', 'like', '%' .'5'.'%')->get();

        foreach($categoryID1 as $record1)
        {
            $id1 = $record1->viewer;
            $name1 = $record1->categoryname;
        }

        foreach($categoryID2 as $record2)
        {
            $id2 = $record2->viewer;
            $name2 = $record2->categoryname;
        }

        foreach($categoryID3 as $record3)
        {
            $id3 = $record3->viewer;
            $name3 = $record3->categoryname;
        }

        foreach($categoryID4 as $record4)
        {
            $id4 = $record4->viewer;
            $name4 = $record4->categoryname;
        }

        foreach($categoryID5 as $record5)
        {
            $id5 = $record5->viewer;
            $name5 = $record5->categoryname;
        }


        $chart->labels([ $name1, $name2, $name3, $name4, $name5]);
        $dataset=$chart->dataset('Jumlah Pengguna', 'bar', [$id1, $id2, $id3, $id4, $id5]);
        $dataset->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838','#f4b642', '#0040f2']));
        $dataset->color(collect(['#7d5fff','#32ff7e', '#ff4d4d','#f4b642', '#0040f2']));

        return view('laporan.index', compact('chart'));

    }
}
