<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_teamRequest;
use App\Http\Requests\Updatewc_teamRequest;
use App\Repositories\wc_teamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class wc_teamController extends AppBaseController
{
    /** @var  wc_teamRepository */
    private $wcTeamRepository;

    public function __construct(wc_teamRepository $wcTeamRepo)
    {
        $this->wcTeamRepository = $wcTeamRepo;
    }

    /**
     * Display a listing of the wc_team.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wcTeams = $this->wcTeamRepository->all();

        return view('wc_teams.index')
            ->with('wcTeams', $wcTeams);
    }

    /**
     * Show the form for creating a new wc_team.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_teams.create');
    }

    /**
     * Store a newly created wc_team in storage.
     *
     * @param Createwc_teamRequest $request
     *
     * @return Response
     */
    public function store(Createwc_teamRequest $request)
    {
        $input = $request->all();

        $wcTeam = $this->wcTeamRepository->create($input);

        Flash::success('Wc Team saved successfully.');

        return redirect(route('wcTeams.index'));
    }

    /**
     * Display the specified wc_team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcTeam = $this->wcTeamRepository->find($id);

        if (empty($wcTeam)) {
            Flash::error('Wc Team not found');

            return redirect(route('wcTeams.index'));
        }

        return view('wc_teams.show')->with('wcTeam', $wcTeam);
    }

    /**
     * Show the form for editing the specified wc_team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcTeam = $this->wcTeamRepository->find($id);

        if (empty($wcTeam)) {
            Flash::error('Wc Team not found');

            return redirect(route('wcTeams.index'));
        }

        return view('wc_teams.edit')->with('wcTeam', $wcTeam);
    }

    /**
     * Update the specified wc_team in storage.
     *
     * @param int $id
     * @param Updatewc_teamRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_teamRequest $request)
    {
        $wcTeam = $this->wcTeamRepository->find($id);

        if (empty($wcTeam)) {
            Flash::error('Wc Team not found');

            return redirect(route('wcTeams.index'));
        }

        $wcTeam = $this->wcTeamRepository->update($request->all(), $id);

        Flash::success('Wc Team updated successfully.');

        return redirect(route('wcTeams.index'));
    }

    /**
     * Remove the specified wc_team from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcTeam = $this->wcTeamRepository->find($id);

        if (empty($wcTeam)) {
            Flash::error('Wc Team not found');

            return redirect(route('wcTeams.index'));
        }

        $this->wcTeamRepository->delete($id);

        Flash::success('Wc Team deleted successfully.');

        return redirect(route('wcTeams.index'));
    }
}
