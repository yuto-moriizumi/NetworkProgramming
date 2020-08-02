<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_resultRequest;
use App\Http\Requests\Updatewc_resultRequest;
use App\Repositories\wc_resultRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\wc_result;
use App\Models\wc_tournament;
use App\Models\wc_round;
use App\Models\wc_group;
use App\Models\wc_team;

class wc_resultController extends AppBaseController
{
    /** @var  wc_resultRepository */
    private $wcResultRepository;

    public function __construct(wc_resultRepository $wcResultRepo)
    {
        $this->wcResultRepository = $wcResultRepo;
    }

    /**
     * Display a listing of the wc_result.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $team_id = $request->input('id');
        $wcResults=null;

        $search_info=[];
        $search_option=[];
        $search_info["tournaments"]=wc_tournament::all();
        $search_option["tournament_id"]=$request->input('tournament_id');
        //$search_info["rounds"]=wc_round::all();
        //if (!is_null($search_option["tournament_id"])&&$search_option["tournament_id"]!="null") {
        //$search_info["rounds"]=wc_round::where('tournament_id', '=', $search_option["tournament_id"])->get();
        //}
        $search_option["round_id"]=$request->input('round_id');
        $search_info["groups"]=wc_group::all();
        $search_option["group_id"]=$request->input('group_id');
        $search_info["teams"]=wc_team::all();
        $search_option["team_id"]=$request->input('team_id');
        $search_option["outcome"]=$request->input('outcome');

        if (is_null($team_id)) {
            $wcResults = wc_result::select()->join('wc_match', 'wc_match.id', '=', 'wc_result.match_id')->join('wc_round', 'wc_round.id', '=', 'wc_match.round_id')->join('wc_tournament', 'wc_tournament.id', '=', 'wc_round.tournament_id')->join('wc_group', 'wc_group.id', '=', 'wc_match.group_id')->join('wc_team as wc_team0', 'wc_team0.id', '=', 'wc_result.team_id0')->join('wc_team as wc_team1', 'wc_team1.id', '=', 'wc_result.team_id1');
            if (!is_null($search_option["tournament_id"])&&$search_option["tournament_id"]!="null") {
                $wcResults->where('wc_tournament.id', $search_option["tournament_id"]);
            }
            if (!is_null($search_option["round_id"])&&$search_option["round_id"]!="null") {
                $wcResults->where('wc_round.knockout', $search_option["round_id"]);
            }
            if (!is_null($search_option["group_id"])&&$search_option["group_id"]!="null") {
                $wcResults->where('wc_group.id', $search_option["group_id"]);
            }
            if (!is_null($search_option["team_id"])&&$search_option["team_id"]!="null") {
                if (!is_null($search_option["outcome"])&&$search_option["outcome"]!="null") {
                    if ($search_option["outcome"]==0) {
                        $wcResults->whereRaw("team_id0 = ". $search_option["team_id"] ." AND count_stillmate = 1 OR team_id1 = ". $search_option["team_id"] ." AND count_stillmate = 1");
                    }
                    if ($search_option["outcome"]==1) {
                        $wcResults->whereRaw("team_id0 = ". $search_option["team_id"] ." AND count_win = 1 OR team_id1 = ". $search_option["team_id"] ." AND count_lose = 1");
                    }
                    if ($search_option["outcome"]==-1) {
                        $wcResults->whereRaw("team_id0 = ". $search_option["team_id"] ." AND count_lose = 1 OR team_id1 = ". $search_option["team_id"] ." AND count_win = 1");
                    }
                } else {
                    $wcResults->whereRaw("team_id0 = ". $search_option["team_id"] ." OR team_id1 = ". $search_option["team_id"]);
                }
            }
            $wcResults=$wcResults->get();
        } else { #チームIDが指定されている場合はそちらの検索を優先します
            //$wcResults = wc_result::where('team_id0', '=', $team_id)->where('count_win', '=', 1)->get();
            $wcResults = wc_result::whereRaw("team_id0 = ". $team_id ." AND count_win = 1 OR team_id1 = ". $team_id ." AND count_lose = 1")->get();

            /*
            $wcResults = wc_result::orWhere(function ($wcResults) use ($team_id) {
                $wcResults->orWhere('team_id0', '=', $team_id)
                      ->orWhere('count_win', '=', 1);
            });*/

            /*->orWhere(function ($query) use ($team_id) {
                $query->where('column_id1', '=', $team_id)
                      ->where('count_lose', '=', 1);
            });
            */
        }
        
        return view('wc_results.index')
            ->with('wcResults', $wcResults)->with('val', $team_id)->with('search_info', $search_info);
    }

    /**
     * Show the form for creating a new wc_result.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_results.create');
    }

    /**
     * Store a newly created wc_result in storage.
     *
     * @param Createwc_resultRequest $request
     *
     * @return Response
     */
    public function store(Createwc_resultRequest $request)
    {
        $input = $request->all();

        $wcResult = $this->wcResultRepository->create($input);

        Flash::success('Wc Result saved successfully.');

        return redirect(route('wcResults.index'));
    }

    /**
     * Display the specified wc_result.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        return view('wc_results.show')->with('wcResult', $wcResult);
    }

    /**
     * Show the form for editing the specified wc_result.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        return view('wc_results.edit')->with('wcResult', $wcResult);
    }

    /**
     * Update the specified wc_result in storage.
     *
     * @param int $id
     * @param Updatewc_resultRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_resultRequest $request)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        $wcResult = $this->wcResultRepository->update($request->all(), $id);

        Flash::success('Wc Result updated successfully.');

        return redirect(route('wcResults.index'));
    }

    /**
     * Remove the specified wc_result from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        $this->wcResultRepository->delete($id);

        Flash::success('Wc Result deleted successfully.');

        return redirect(route('wcResults.index'));
    }

    public function tournamentId2Teams(Request $request)
    {
        switch ($request->input('get')) {
            case 'teams':
                //トーナメントIDから参加したチーム一覧を取得する
                $search_option["tournament_id"]=$request->input('tournament_id');

                $wcResults = wc_result::select("team_id0", "wc_team0.name as wc_team0_name", "team_id1", "wc_team1.name as wc_team1_name")
                    ->join('wc_match', 'wc_match.id', '=', 'wc_result.match_id')
                    ->join('wc_round', 'wc_round.id', '=', 'wc_match.round_id')
                    ->join('wc_tournament', 'wc_tournament.id', '=', 'wc_round.tournament_id')
                    ->join('wc_team as wc_team0', 'wc_team0.id', '=', 'wc_result.team_id0')
                    ->join('wc_team as wc_team1', 'wc_team1.id', '=', 'wc_result.team_id1');
                if (!is_null($search_option["tournament_id"])) {
                    $wcResults->where('tournament_id', $search_option["tournament_id"]);
                }

                $wcResults =$wcResults->get();

                $output=[];
                foreach ($wcResults as $result) {
                    $output[$result->team_id0]=$result->wc_team0_name;
                    $output[$result->team_id1]=$result->wc_team1_name;
                }
                
                return view('wc_results.api')
                    ->with('wcResults', json_encode($output));
            case "groups":
                $search_option["tournament_id"]=$request->input('tournament_id');

                $wcResults = wc_group::select("wc_group.id as wc_group_id", "wc_group.name as wc_group_name")
                ->join('wc_match', 'wc_match.group_id', '=', 'wc_group.id')
                ->join('wc_round', 'wc_round.id', '=', 'wc_match.round_id')
                ->join('wc_tournament', 'wc_tournament.id', '=', 'wc_round.tournament_id');
                if (!is_null($search_option["tournament_id"])) {
                    $wcResults->where('tournament_id', $search_option["tournament_id"]);
                }
                $wcResults =$wcResults->get();

                $output=[];
                foreach ($wcResults as $result) {
                    $output[$result->wc_group_id]=$result->wc_group_name;
                }
                return view('wc_results.api')
                ->with('wcResults', json_encode($output, JSON_UNESCAPED_UNICODE));
            default:
                return view('wc_results.api')->with('wcResults', "NULL");

                
                break;
        }


        /**<?php foreach ($wcResults as $key=>$value):?>
    <?=$key.":".$value?>
<?php endforeach;?> */
    }
}
