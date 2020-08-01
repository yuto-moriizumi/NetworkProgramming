<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_roundRequest;
use App\Http\Requests\Updatewc_roundRequest;
use App\Repositories\wc_roundRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class wc_roundController extends AppBaseController
{
    /** @var  wc_roundRepository */
    private $wcRoundRepository;

    public function __construct(wc_roundRepository $wcRoundRepo)
    {
        $this->wcRoundRepository = $wcRoundRepo;
    }

    /**
     * Display a listing of the wc_round.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wcRounds = $this->wcRoundRepository->all();

        return view('wc_rounds.index')
            ->with('wcRounds', $wcRounds);
    }

    /**
     * Show the form for creating a new wc_round.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_rounds.create');
    }

    /**
     * Store a newly created wc_round in storage.
     *
     * @param Createwc_roundRequest $request
     *
     * @return Response
     */
    public function store(Createwc_roundRequest $request)
    {
        $input = $request->all();

        $wcRound = $this->wcRoundRepository->create($input);

        Flash::success('Wc Round saved successfully.');

        return redirect(route('wcRounds.index'));
    }

    /**
     * Display the specified wc_round.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcRound = $this->wcRoundRepository->find($id);

        if (empty($wcRound)) {
            Flash::error('Wc Round not found');

            return redirect(route('wcRounds.index'));
        }

        return view('wc_rounds.show')->with('wcRound', $wcRound);
    }

    /**
     * Show the form for editing the specified wc_round.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcRound = $this->wcRoundRepository->find($id);

        if (empty($wcRound)) {
            Flash::error('Wc Round not found');

            return redirect(route('wcRounds.index'));
        }

        return view('wc_rounds.edit')->with('wcRound', $wcRound);
    }

    /**
     * Update the specified wc_round in storage.
     *
     * @param int $id
     * @param Updatewc_roundRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_roundRequest $request)
    {
        $wcRound = $this->wcRoundRepository->find($id);

        if (empty($wcRound)) {
            Flash::error('Wc Round not found');

            return redirect(route('wcRounds.index'));
        }

        $wcRound = $this->wcRoundRepository->update($request->all(), $id);

        Flash::success('Wc Round updated successfully.');

        return redirect(route('wcRounds.index'));
    }

    /**
     * Remove the specified wc_round from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcRound = $this->wcRoundRepository->find($id);

        if (empty($wcRound)) {
            Flash::error('Wc Round not found');

            return redirect(route('wcRounds.index'));
        }

        $this->wcRoundRepository->delete($id);

        Flash::success('Wc Round deleted successfully.');

        return redirect(route('wcRounds.index'));
    }
}
