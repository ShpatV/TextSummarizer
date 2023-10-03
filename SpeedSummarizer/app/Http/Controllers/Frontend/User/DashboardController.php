<?php

namespace App\Http\Controllers\Frontend\User;
use PhpScience\TextRank\Tool\StopWords\English;
use PhpScience\TextRank\TextRankFacade;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }
    public function summarize(Request $request) {
        //print_r('here we are');

        // String contains a long text, see the /res/sample1.txt file.
        $text = $request->text;

        $api = new TextRankFacade();
        // English implementation for stopwords/junk words:
        $stopWords = new English();
        $api->setStopWords($stopWords);

        // Array of the most important keywords:
        $result = $api->getOnlyKeyWords($text);

        // Array of the sentences from the most important part of the text:
        $result = $api->getHighlights($text);

        // Array of the most important sentences from the text:
        $result = $api->summarizeTextBasic($text);

        $summary = implode(".", $result);
        return view('frontend.user.dashboard', ['summary' => $summary]);
    }
}
