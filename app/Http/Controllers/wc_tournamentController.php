<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_tournamentRequest;
use App\Http\Requests\Updatewc_tournamentRequest;
use App\Repositories\wc_tournamentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class wc_tournamentController extends AppBaseController
{
    /** @var  wc_tournamentRepository */
    private $wcTournamentRepository;

    public function __construct(wc_tournamentRepository $wcTournamentRepo)
    {
        $this->wcTournamentRepository = $wcTournamentRepo;
    }

    /**
     * Display a listing of the wc_tournament.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wcTournaments = $this->wcTournamentRepository->all();

        return view('wc_tournaments.index')
            ->with('wcTournaments', $wcTournaments);
    }

    /**
     * Show the form for creating a new wc_tournament.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_tournaments.create');
    }

    /**
     * Store a newly created wc_tournament in storage.
     *
     * @param Createwc_tournamentRequest $request
     *
     * @return Response
     */
    public function store(Createwc_tournamentRequest $request)
    {
        $input = $request->all();

        $wcTournament = $this->wcTournamentRepository->create($input);

        Flash::success('Wc Tournament saved successfully.');

        return redirect(route('wcTournaments.index'));
    }

    /**
     * Display the specified wc_tournament.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcTournament = $this->wcTournamentRepository->find($id);

        if (empty($wcTournament)) {
            Flash::error('Wc Tournament not found');

            return redirect(route('wcTournaments.index'));
        }

        return view('wc_tournaments.show')->with('wcTournament', $wcTournament);
    }

    /**
     * Show the form for editing the specified wc_tournament.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcTournament = $this->wcTournamentRepository->find($id);

        if (empty($wcTournament)) {
            Flash::error('Wc Tournament not found');

            return redirect(route('wcTournaments.index'));
        }

        return view('wc_tournaments.edit')->with('wcTournament', $wcTournament);
    }

    /**
     * Update the specified wc_tournament in storage.
     *
     * @param int $id
     * @param Updatewc_tournamentRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_tournamentRequest $request)
    {
        $wcTournament = $this->wcTournamentRepository->find($id);

        if (empty($wcTournament)) {
            Flash::error('Wc Tournament not found');

            return redirect(route('wcTournaments.index'));
        }

        $wcTournament = $this->wcTournamentRepository->update($request->all(), $id);

        Flash::success('Wc Tournament updated successfully.');

        return redirect(route('wcTournaments.index'));
    }

    /**
     * Remove the specified wc_tournament from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcTournament = $this->wcTournamentRepository->find($id);

        if (empty($wcTournament)) {
            Flash::error('Wc Tournament not found');

            return redirect(route('wcTournaments.index'));
        }

        $this->wcTournamentRepository->delete($id);

        Flash::success('Wc Tournament deleted successfully.');

        return redirect(route('wcTournaments.index'));
    }
}
